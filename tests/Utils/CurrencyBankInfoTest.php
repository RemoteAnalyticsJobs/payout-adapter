<?php
namespace PayoutAdapter\Test\Utils;

use Tests\TestCase;
use TransferWise\CurrencyBankInfo;

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
}
