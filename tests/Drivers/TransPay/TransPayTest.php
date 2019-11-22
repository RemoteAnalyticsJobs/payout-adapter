<?php
namespace PayoutAdapter\Test\Drivers\TransPay;


use App\User;
use PayoutAdapter\Payout;
use PayoutAdapter\Drivers\TransPay\TransPay;
use Tests\TestCase;

class TransPayTest extends TestCase
{
    protected $driver;

    protected function setUp() : void
    {
        parent::setUp();
        $this->driver = new TransPay(new User);
    }

    public function test_get_quote()
    {
        $quote = $this->driver->getQuote('USD', 100, 'india');
        dd($quote);
        $this->assertNotNull($quote['rate']);
    }

    public function test_if_transaction_can_be_created()
    {
        $user = new User();
        $values = [
            'ifscCode' => 'KKBK0000628',
            'accountNumber' => '1234567890',
            'legalType' => 'PRIVATE'
        ];
        // kotak mahindra bank
        $data = [
            'phone' => '1234668',
            'legalType' => 'PRIVATE',
            'currency' => 'INR',
            'sourceCurrency' => 'USD',
            'countryIsoCode' => 'IN',
            'type' => 'indian',
            'accountHolderName' => 'Sharik Shaiikh',
            'bankDetails' => $values
        ];
        $response = $this->driver->createTransaction(100, $data);
        $this->assertEquals('PENDING RELEASE', $response['StatusName']);
    }

    public function test_if_full_name_gets_separated_to_First_and_last_name()
    {
        $fullName = 'Sharik Shaikh';
        $name = $this->driver->separateFirstAndLastName($fullName);
        $this->assertEquals('Sharik', $name[0]);
        $this->assertEquals('Shaikh', $name[1]);
    }

    public function test_getSupportedBanks()
    {
        $countryIsoCode = 'IN';
        $response = $this->driver->getSupportedBanks($countryIsoCode);
        $this->assertIsInt($response['TotalCount']);
    }

}
