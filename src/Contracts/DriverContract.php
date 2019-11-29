<?php namespace PayoutAdapter\Contracts;

interface DriverContract {

    /**
     * @param string $sourceCurrency
     * @param int $amount
     * @param string $recipientCountryIso
     * @return mixed
     */
    public function getQuote(string $sourceCurrency, int $amount, string $recipientCountryIso);

    /**
     * @param string $country
     * @param array $data
     * @return mixed
     */
    public function createRecipient(string $country, array $data);

    /**
     * @param string $countryISOCode
     * @return array
     */
    public function getSupportedBanks(string $countryISOCode);

}
