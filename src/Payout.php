<?php namespace PayoutAdapter;


use Illuminate\Support\Facades\DB;
use PayoutAdapter\Contracts\PayoutContract;
use PayoutAdapter\Drivers\TransPay\TransPay;
use PayoutAdapter\Drivers\Transferwise\Transferwise;

class Payout implements PayoutContract
{
    /**
     * @param null $driver
     * @param null $user
     * @return mixed|Transferwise|TransPay
     */
    public static function driver($driver = null, $user = null)
    {
        return (new static)->getPayoutDriver($driver, $user);
    }

    /**
     * @param null $driverName
     * @param $user
     * @return Transferwise|TransPay
     */
    public function getPayoutDriver($driverName = null, $user = null)
    {
        if (is_null($driverName)) {
            $driverName = $this->getDefaultPayoutDriverName();
        }
        return $this->resolveDriver($driverName, $user);
    }

    /**
     * @param $driverName
     * @param $user
     * @return Transferwise|TransPay
     */
    public function resolveDriver($driverName, $user)
    {
        switch (strtolower($driverName)) {
            case 'transferwise':
                return new TransferWise($user);
            case 'transpay':
                return new TransPay($user);
        }
    }

    /**
     * @return string
     */
    public function getDefaultPayoutDriverName() : string
    {
        return config('payout_adapter.default');
    }

    /**
    * @param array $details
    * @return bool
    */
    public static function storeBankingDetails(array $details)
    {
        $user_id        = $details['user_id'];
        $type           = $details['type'];
        $bankDetails    = $details['bankDetails'];
        if (isset($bankDetails['accountNumber'])) {
            $bankDetails['accountNumber'] = encrypt($bankDetails['accountNumber']);
        }
        $isStored = DB::table('payout_adapter_bank_accounts')->insert([
            'user_id' => $user_id,
            'type' => $type,
            'bank_details' => json_encode($bankDetails)
        ]);

        return $isStored;
    }

    public static function  getBankingDetails(int $user_id)
    {
        $details = DB::table('payout_adapter_bank_accounts')->where('user_id', $user_id)->first();
        if (!$details) {
            return [];
        }
        $details->bankDetails = json_decode($details->bank_details, true);
        $details->bankDetails['accountNumber'] = decrypt($details->bankDetails['accountNumber']);
        unset($details->bank_details);
        return (array)$details;
    }
}

