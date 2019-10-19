<?php namespace PayoutAdapter;


use PayoutAdapter\Contracts\PayoutContract;
use PayoutAdapter\Drivers\Transferwise\Transferwise;
use TransPay\TransPay;

class Payout implements PayoutContract
{

    public static function driver($driver = null)
    {
        return (new static)->getPayoutDriver($driver);
    }

    public function getPayoutDriver($driverName = null)
    {
        if (is_null($driverName)) {
            $driverName = $this->getDefaultPayoutDriverName();
        }
        $driver = $this->resolveDriver($driverName);
    }

    public function resolveDriver($driverName)
    {
        $user = auth('api')->user();

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
        return env('PAYOUT_DRIVER');
    }
}
