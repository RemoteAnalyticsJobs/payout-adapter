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
    public function getQuote(string $sourceCurrency, int $amount, string $recipientCountry, string $paymentMode = 'C')
    {
        $countryISO = CurrencyBankInfo::getCountryISO($recipientCountry);
        $currency   = CurrencyBankInfo::getCountryCurrency($recipientCountry);

        $payload = [
            'ReceiverCountryIsoCode'    => $countryISO,
            'PaymentModeId'             => $paymentMode,
            'ReceiveCurrencyIsoCode'    => $currency,
            'SourceCurrencyIsoCode'     => $sourceCurrency,
            'SentAmount'                => $amount,
            'BankId'                    => 'Kotak Mahindra Bank'
        ];

        $quote = $this->get('api/transaction/transactioninfo?'.http_build_query($payload));

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

    /**
     * @param string $country
     * @param array $data
     * @return mixed
     */
    public function createRecipient(string $country, array $data)
    {
        $payload = [];
        $payload['FirstName'] = array_splice($data['accountHolderName'], array_search(' ', $data['accountHolderName']))[0];
//        "Receiver": {
//            "FirstName": "Steve",
//            "LastName": "Schulte",
//            "MobilePhone": "123",
//            "CountryIsoCode": "IN",
//            "IsIndividual": "true"
//        },
//        "TransactionInfo": {
//            "PaymentModeId": "C",
//            "ReceiveCurrencyIsoCode": "INR",
//            "SourceCurrencyIsoCode": "USD",
//            "SentAmount": 50,
//            "BankId":"IND10",
//            "Account":"123456789",
//            "BankRoutingNumber":"TESTRouting",
//            "ReferenceNumber":"Internal7",
//            “SourceOfFundsId":"5"
//        }
    }

    public function createTransaction(float $amount, array $data) {
        $userName = $this->separateFirstAndLastName($data['accountHolderName']);
        $transactionDetails = [];
        $transactionDetails['Receiver'] = [];
        $transactionDetails['Receiver']['FirstName'] = $userName[0];
        $transactionDetails['Receiver']['LastName'] = $userName[1];
        $transactionDetails['Receiver']['MobilePhone'] = $data['phone'];
        $transactionDetails['Receiver']['CountryIsoCode'] = $data['countryIsoCode'];
        $transactionDetails['Receiver']['IsIndividual'] = $data['legalType'] == 'PRIVATE';
        $transactionDetails['TransactionInfo'] = [];
        $transactionDetails['TransactionInfo']['PaymentModeId'] = 'C';
        $transactionDetails['TransactionInfo']['ReceiveCurrencyIsoCode'] = $data['currency'];
        $transactionDetails['TransactionInfo']['SourceCurrencyIsoCode'] = $data['sourceCurrency'];
        $transactionDetails['TransactionInfo']['SentAmount'] = $amount;
        $transactionDetails['TransactionInfo']['Account'] = $data['bankDetails']['accountNumber'];
        $transactionDetails['TransactionInfo']['BankRoutingNumber'] = $this->getRoutingNumber($data['bankDetails']);
        $transactionDetails['TransactionInfo']['PurposeOfRemittanceId'] = 1;
        return $this->post('/api/transaction/invoice', $transactionDetails);
    }

    public function getRoutingNumber(array $details) {
        if (isset($details['ifscCode'])) {
            return $details['ifscCode'];
        }
        if (isset($details['bankCode'])) {
            return $details['bankCode'];
        }
        if (isset($details['routingNumber'])) {
            return $details['routingNumber'];
        }
        if (isset($details['abartn'])) {
            return $details['abartn'];
        }
    }

    public function separateFirstAndLastName(string $fullName) {
        return explode(' ', $fullName);
    }

    /**
     * @param string $countryISOCode
     * @return array
     */
    public function getSupportedBanks(string $countryISOCode) {
        $uri = 'api/catalogs/banks?CountryISOCode='.$countryISOCode;
        return $this->get($uri);
    }    
}
