<?php namespace PayoutAdapter\Test;

use PayoutAdapter\Contracts\DriverContract;
use PayoutAdapter\Drivers\Transferwise\Transferwise;
use PayoutAdapter\Drivers\TransPay\TransPay;
use PayoutAdapter\Payout;
use Tests\TestCase;

class PayoutTest extends TestCase
{

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
        dd($quote);
    }
}
