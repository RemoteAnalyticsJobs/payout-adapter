<?php
namespace PayoutAdapter\Test\Utils;

use PayoutAdapter\Utils\CurrencyBankInfo;
use Tests\TestCase;

class CurrencyBankInfoTest extends TestCase
{
    public function test_if_countrys_currency_can_be_found()
    {
        $country = 'india';
        $this->assertEquals('INR', CurrencyBankInfo::getCountryCurrency($country));
    }

    public function test_if_country_bank_data_is_returned()
    {
        $country  = 'india';
        $this->assertNotNull(CurrencyBankInfo::get($country));
    }

    public function test_if_fields_can_be_retrieved_from_country_iso_code()
    {
        $sCountryIsoCode = 'IN';
        $this->assertEquals('indian', CurrencyBankInfo::getCountryIsoData($sCountryIsoCode)['type']);
    }
}
