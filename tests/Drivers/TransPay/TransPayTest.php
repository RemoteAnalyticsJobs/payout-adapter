<?php
namespace PayoutAdapter\Test\Drivers\TransPay;


use App\User;
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
        $quote = $this->driver->getQuote('USD', 100, 'INR');
        dd($quote);
    }


}
