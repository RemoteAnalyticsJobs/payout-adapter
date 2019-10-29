<?php namespace PayoutAdapter\Contracts;

interface DriverContract {

    /**
     * @param string $sourceCurrency
     * @param int $amount
     * @param string $recipientCountry
     * @return mixed
     */
    public function getQuote(string $sourceCurrency, int $amount, string $recipientCountry);

    /**
     * @param string $country
     * @param array $data
     * @return mixed
     */
    public function createRecipient(string $country, array $data);

}
