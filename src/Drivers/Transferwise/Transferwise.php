<?php namespace PayoutAdapter\Drivers\Transferwise;

use Illuminate\Support\Facades\DB;
use PayoutAdapter\Utils\CurrencyBankInfo;
use PayoutAdapter\Contracts\DriverContract;
use Ramsey\Uuid\Uuid;

class Transferwise extends TransferwiseAbstract implements DriverContract {

    /**
     * @param string $sourceCurrency
     * @param int $amount
     * @param string $recipientCountryIso
     * @return mixed
     */
    public function getQuote(string $sourceCurrency, int $amount, string $recipientCountryIso)
    {
        $recipientCurrency = CurrencyBankInfo::getCountryISOCurrency($recipientCountryIso);
        return $this->post('quotes', [
            'profile' => $this->getProfileId(),
            'source' => $sourceCurrency,
            'target' => $recipientCurrency,
            'rateType' => 'FIXED',
            'targetAmount' => $amount,
            'type' => 'BALANCE_PAYOUT'
        ]);
    }

    /**
     * @param string $country
     * @param array $details
     * @return mixed
     */
    public function createRecipient(string $country, array $details)
    {
        $currency = CurrencyBankInfo::getCountryCurrency($country);
        $countryIso = CurrencyBankInfo::getCountryISO($country);
        if ($countryIso) {
            $country = $countryIso;
        }
        if (isset($details['country'])) {
            $details['country'] = $country;
        }
        $data = [
            'currency'  => $currency,
            'profile'   => $this->getProfileId(),
            'ownedByCustomer' => true,
            'country' => $country
        ];
        $data = array_merge($data, $details);
        $data['details'] = $data['bankDetails'];
        unset($data['bankDetails']);
        return $this->post('accounts', $data);
    }

    public function createTransaction(float $amount, array $data) {
        $profile_id = null;

        $data = $this->normalizeData($data);
        if (!$this->userProfileExists($data['user_id'])) {
            $profile = $this->createRecipient($data['country'], $data);
            if (isset($profile['errors'])) {
                throw new \Exception('Error: '.json_encode($profile['errors']) );
            }
            $this->storeProfile($profile['id'], $data['user_id']);
            $profile_id = $profile['id'];
        } else {
            $profile_id = $this->getRecipientProfileId($data['user_id']);
        }
        $payload = [];
        $payload['targetAccount'] = $profile_id;
        $payload['quote'] = $data['quote_id'];
        $payload['customerTransactionId'] = $data['customerTransactionId'];
        $payload['profile'] = $this->getProfileId();
        $payload['amount'] = $data['amount'];
        $payload['sourceCurrency'] = $data['sourceCurrency'];
        $payload['targetCurrency'] = $data['currency'];
        $payload['details'] = [];
        $payload['details']['reference'] = $data['reference'];
        $payload['details']['transferPurpose'] = 'verification.transfers.purpose.pay.bills';
        $transaction = $this->post('transfers', $payload);
        if (isset($transaction['errors'])) {
            throw new \Exception('Error: '.json_encode($transaction['errors']));
        }
        return $transaction;
    }

    public function storeProfile(int $profile_id, int $user_id) {
        return DB::table('payout_adapter_gateway_profiles')->insert(['user_id' => $user_id, 'profile_id' => $profile_id]);
    }

    public function getRecipientProfileId(int $user_id) {
        $profile = DB::table('payout_adapter_gateway_profiles')->where('user_id', $user_id)->first();
        if (!$profile) return null;
        return $profile->profile_id;
    }

    public function userProfileExists(int $user_id) {
        return DB::table('payout_adapter_gateway_profiles')->where('user_id', $user_id)->exists();
    }

    public function normalizeData(array $data){
        if (isset($data['currency'])) {
            $data['targetCurrency'] = $data['currency'];
        }
        return $data;
    }

    public function getSupportedBanks(string $countryIsoCode) {
        throw new Exception('Not yet implemented');
    }
}
