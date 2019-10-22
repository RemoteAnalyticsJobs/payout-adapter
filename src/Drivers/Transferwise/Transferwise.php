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
}
