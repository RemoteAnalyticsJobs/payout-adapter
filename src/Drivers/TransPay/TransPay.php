<?php

namespace PayoutAdapter\Drivers\TransPay;

use PayoutAdapter\Contracts\DriverContract;
use PayoutAdapter\Utils\CurrencyBankInfo;

class TransPay extends TransPayAbstract implements DriverContract
{

    /**
     * @param string $sourceCurrency
     * @param int $amount
     * @param string $recipientCountry
     * @return mixed
     * @throws \Exception
     */
    public function getQuote(string $sourceCurrency, int $amount, string $recipientCountry)
    {
        $quote = [];
        $countryISO = CurrencyBankInfo::getCountryISO($recipientCountry);
        $uri = '/api/rates/countryrates?sourcecurrencyisocode='.$sourceCurrency.'&ReceiveCountryIsoCode='.$countryISO;
        $exchangeRates = $this->normalizeExchangeRates($this->get($uri));
        $quote['rate'] = $exchangeRates;
        return $quote;
    }

    /**
     * @param array $exchangeRates
     * @return mixed
     * @throws \Exception
     */
    public function normalizeExchangeRates(array $exchangeRates)
    {
        foreach ($exchangeRates['Rates'] as $rate) {
            if ($rate['PayerName'] == 'TRANSFAST' && $rate['ModeOfPaymentName'] == 'BANK DEPOSIT') {
                return $rate['StartRate'];
            }
        }
        throw new \Exception('Unable to fetch exchange rates.');
    }
}
