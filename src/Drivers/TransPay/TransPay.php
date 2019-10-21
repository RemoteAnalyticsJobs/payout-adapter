<?php

namespace PayoutAdapter\Drivers\TransPay;

use PayoutAdapter\Contracts\DriverContract;
use PayoutAdapter\CurrencyBankInfo;

class TransPay extends TransPayAbstract implements DriverContract
{

    /**
     * @param $sourceCurrency
     * @param $amount
     * @param $recipientCurrency
     * @return mixed
     */
    public function getQuote(string $sourceCurrency, int $amount, string $recipientCountry)
    {
        $currency = CurrencyBankInfo::getCurrencyByCountry($recipientCurrency);
        $uri = '/api/rates/countryrates?sourcecurrencyisocode='.$sourceCurrency.'&ReceiveCountryIsoCode='.$country;
        $exchangeRates = $this->get($uri);
        dd($exchangeRates);
    }
}
