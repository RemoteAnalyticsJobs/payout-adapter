<?php namespace PayoutAdapter\Contracts;

interface DriverContract {

    /**
     * @param $sourceCurrency
     * @param $amount
     * @param $recipientCurrency
     * @return mixed
     */
    public function getQuote(string $sourceCurrency, int $amount, string $recipientCurrency);


}
