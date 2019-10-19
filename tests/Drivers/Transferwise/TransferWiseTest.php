<?php
namespace PayoutAdapter\Test\Drivers\Transferwise;


use PayoutAdapter\Drivers\Transferwise\Transferwise;
use Tests\TestCase;

class TransferWiseTest extends TestCase
{

    public function test_if_quote_for_an_amount_can_be_received()
    {
        $driver = new Transferwise;
        $quote = $driver->getQuote('USD', 100, 'CLP');
        dd($quote);
        $this->assertNotNull($quote['id']);


        Payout::driver()->getQuote();
    }


}
