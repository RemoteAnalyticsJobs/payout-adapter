<?php
namespace PayoutAdapter\Test\Drivers\TransPay;


use App\User;
use PayoutAdapter\Drivers\TransPay\TransPay;
use Tests\TestCase;

class TransPayAbstractTest extends TestCase
{
    protected $driver;

    protected function setUp() : void
    {
        parent::setUp();
        $this->driver = new TransPay(new User());
    }

    public function test_base_uri_is_set_properly_for_local()
    {
        $this->assertContains('demo', TransPay::_getBaseUrl());
    }

    public function test_set_api_key()
    {
        $this->driver->_setApiKey('123');
        $this->assertEquals('123', $this->driver->_apiKey);
    }

    public function test_get_api_returns_proper_key()
    {
        $this->assertEquals(config('payout_adapter.transpay.SANDBOX_TOKEN'), $this->driver->_getApiKey());
    }


}
