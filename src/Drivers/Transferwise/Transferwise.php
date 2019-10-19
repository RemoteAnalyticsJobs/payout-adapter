<?php namespace PayoutAdapter\Drivers\Transferwise;

use PayoutAdapter\Contracts\DriverContract;

class Transferwise extends TransferwiseAbstract implements DriverContract {

    /**
     * @param $sourceCurrency
     * @param $amount
     * @param $recipientCurrency
     * @return mixed
     */
    public function getQuote(string $sourceCurrency, int $amount, string $recipientCurrency)
    {
        return $this->post('quotes', [
            'profile' => $this->getProfileId(),
            'source' => $sourceCurrency,
            'target' => $recipientCurrency,
            'rateType' => 'FIXED',
            'targetAmount' => $amount,
            'type' => 'BALANCE_PAYOUT'
        ]);
    }
}
