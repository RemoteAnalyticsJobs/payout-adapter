<?php
namespace PayoutAdapter\Test\Drivers\Transferwise;


use App\User;
use GuzzleHttp\Client;
use PayoutAdapter\Drivers\Transferwise\TransferwiseAbstract;
use Tests\TestCase;

class TransferWiseAbstractTest extends TestCase
{

    protected $instance;

    protected function setUp() : void
    {
        parent::setUp();
        $this->instance = $this->getMockForAbstractClass(TransferwiseAbstract::class);
    }

    public function test_if_class_sets_user()
    {
        $user = new User;
        $user->id = '123';
        $this->instance->setUser($user);
        $this->assertEquals($this->instance->user->id, '123');
    }

    public function test_when_mock_provided_mock_is_set()
    {
        $mock = new User;
        $mock->id = 2222;
        $instance = $this->getMockForAbstractClass(TransferwiseAbstract::class, [$mock]);
        $this->assertEquals(2222, $instance->httpClient->id);
    }

    public function test_when_not_provided_mock_guzzle_http_is_set()
    {
        $instance = $this->getMockForAbstractClass(TransferwiseAbstract::class);
        $this->assertInstanceOf(Client::class, $instance->httpClient);
    }

    public function test_base_uri_is_set_for_testing_env()
    {
        $this->assertContains('sandbox', $this->instance->getBaseUri());
    }

}
