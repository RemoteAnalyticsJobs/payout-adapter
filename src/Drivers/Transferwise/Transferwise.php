<?php namespace PayoutAdapter\Drivers\Transferwise;

use PayoutAdapter\Utils\CurrencyBankInfo;
use PayoutAdapter\Contracts\DriverContract;

class Transferwise extends TransferwiseAbstract implements DriverContract {

    /**
     * @param $sourceCurrency
     * @param $amount
     * @param $recipientCountry
     * @return mixed
     */
    public function getQuote(string $sourceCurrency, int $amount, string $recipientCountry)
    {
        $recipientCurrency = CurrencyBankInfo::getCountryCurrency($recipientCountry);
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
        $data = [
            'currency'  => $currency,
            'profile'   => $this->getProfileId(),
            'ownedByCustomer' => true,
        ];
        $data = array_merge($data, $details);

        return $this->post('accounts', $data);
        /**
         "currency": "GBP",
        "type": "sort_code",
        "profile": <your profile id>,
        "ownedByCustomer": true,
        "accountHolderName": "Ann Johnson",
        "details": {
            "legalType": "PRIVATE",
            "sortCode": "231470",
            "accountNumber": "28821822"
        }
         */
    }
}
