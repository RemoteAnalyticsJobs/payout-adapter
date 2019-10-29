<?php namespace PayoutAdapter\Test;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use PayoutAdapter\Contracts\DriverContract;
use PayoutAdapter\Drivers\Transferwise\Transferwise;
use PayoutAdapter\Drivers\TransPay\TransPay;
use PayoutAdapter\Payout;
use Tests\TestCase;

class PayoutTest extends TestCase
{
    use DatabaseMigrations, WithFaker;

    /** @test */
    public function it_tests_if_payout_class_is_instantiable()
    {
        $this->assertInstanceOf(Payout::Class, new Payout('some driver'));
    }

    public function test_if_it_returns_driver()
    {
        $driver = Payout::driver();
        $this->assertInstanceOf(DriverContract::class, $driver);
    }

    public function test_if_when_said_transferwise_it_returns_transferwise_driver()
    {
        $this->assertInstanceOf(Transferwise::class, Payout::driver('transferwise'));
    }

    public function test_if_when_said_transpay_it_returns_transpay_driver()
    {
        $this->assertInstanceOf(TransPay::class, Payout::driver('transpay'));
    }

    public function test_get_quote() {
        $sourceCurrency = 'USD';
        $amount = 100;
        $recipientCountry = 'india';

        $quote = Payout::driver()->getQuote($sourceCurrency, $amount, $recipientCountry);
        $this->assertNotNull($quote['id']);
    }

    public function test_transferwise_Driver_quote_Generation() {
        $sourceCurrency = 'USD';
        $amount = 100;
        $recipientCountry = 'india';

        $quote = Payout::driver('transferwise')->getQuote($sourceCurrency, $amount, $recipientCountry);
        $this->assertNotNull($quote['rate']);
    }

    public function test_transpay_driver_quote_generation() {
        $sourceCurrency = 'USD';
        $amount = 100;
        $recipientCountry = 'india';

        $quote = Payout::driver('transpay')->getQuote($sourceCurrency, $amount, $recipientCountry);
        $this->assertNotNull($quote['rate']);
    }

    public function test_if_default_driver_works() {
        $sourceCurrency = 'USD';
        $amount = 100;
        $recipientCountry = 'india';

        $quote = Payout::driver()->getQuote($sourceCurrency, $amount, $recipientCountry);
        $this->assertNotNull($quote['rate']);
    }

    public function test_if_transaction_can_be_created_using_Transferwise_driver() {
        $user_id = 1;
        $quote = Payout::driver('transferwise')->getQuote('USD', 100, 'india');
        $values = [
            'ifscCode' => 'KKBK0000628',
            'accountNumber' => '1234567890',
            'legalType' => 'PRIVATE'
        ];
        $data = [
            'quote_id' => $quote['id'],
            'user_id' => $user_id,
            'customerTransactionId' => $this->faker->uuid,
            'reference' => 'ABCD job',
            'phone' => '1234668',
            'legalType' => 'PRIVATE',
            'currency' => 'INR',
            'sourceCurrency' => 'USD',
            'countryIsoCode' => 'IN',
            'type' => 'indian',
            'accountHolderName' => 'Sharik Shaiikh',
            'country' => 'india',
            'amount' => 100,
            'bankDetails' => $values
        ];
        $transaction = Payout::driver('transferwise')->createTransaction(100, $data);
        $this->assertNotNull($transaction['id']);
    }

    public function test_if_transaction_can_be_created_using_TranPay_driver() {
        $user_id = 1;
        $values = [
            'ifscCode' => 'KKBK0000628',
            'accountNumber' => '1234567890',
            'legalType' => 'PRIVATE'
        ];
        $data = [
            'quote_id' => null,
            'user_id' => $user_id,
            'customerTransactionId' => $this->faker->uuid,
            'reference' => 'ABCD job',
            'phone' => '1234668',
            'legalType' => 'PRIVATE',
            'currency' => 'INR',
            'sourceCurrency' => 'USD',
            'countryIsoCode' => 'IN',
            'type' => 'indian',
            'accountHolderName' => 'Sharik Shaiikh',
            'country' => 'india',
            'amount' => 100,
            'bankDetails' => $values
        ];
        $transaction = Payout::driver('transpay')->createTransaction(100, $data);
        $this->assertEquals('PENDING RELEASE', $transaction['StatusName']);
    }

}
