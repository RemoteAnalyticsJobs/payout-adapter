<?php namespace PayoutAdapter;


use PayoutAdapter\Contracts\PayoutContract;
use PayoutAdapter\Drivers\Transferwise\Transferwise;
use PayoutAdapter\Drivers\TransPay\TransPay;

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
}
