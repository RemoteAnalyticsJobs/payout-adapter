<?php
namespace PayoutAdapter\Test\Drivers\Transferwise;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use PayoutAdapter\Drivers\Transferwise\Transferwise;
use Tests\TestCase;

class TransferWiseTest extends TestCase
{
    use WithFaker, DatabaseMigrations;

    protected function setUp() : void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
    }

    public function test_if_quote_for_an_amount_can_be_received()
    {
        $driver = new Transferwise;
        $quote = $driver->getQuote('USD', 100, 'chile');
        $this->assertNotNull($quote['id']);
    }

    public function test_if_recipient_can_be_created()
    {
        $country = 'india';
        $driver = new Transferwise();

        $values = [
            'ifscCode' => 'KKBK0000628',
            'accountNumber' => '1234567890',
            'legalType' => 'PRIVATE'
        ];
        $data = [
            'type' => 'indian',
            'accountHolderName' => 'Sharik Shaiikh',
            'bankDetails' => $values
        ];

        $recipient = $driver->createRecipient($country, $data);
        $this->assertNotNull($recipient['id']);
    }

    public function test_if_transaction_gets_created() {
        $user_id = 1;
        $quote = $this->getQuote('USD', 100, 'india');
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
        $response = (new Transferwise())->createTransaction(100, $data);
        $this->assertNotNull($response['id']);
    }

    public function test_If_userProfileExists_returns_false_When_there_is_no_a_profile()
    {
        $driver = new Transferwise();
        $this->assertFalse($driver->userProfileExists(1));
    }

    public function test_if_userProfileExists_returns_true_when_there_is_a_profile()
    {
        $driver = new Transferwise();
        DB::table('payout_adapter_bank_accounts')->insert(['user_id' => 1, 'profile_id' => 1 ]);
        $this->assertTrue($driver->userProfileExists(1));
    }

    public function test_if_getRecipientProfileId_is_returning_information_when_available()
    {
        $user_id = 1;
        $driver = new Transferwise();
        DB::table('payout_adapter_bank_accounts')->insert(['user_id' => $user_id, 'profile_id' => 123 ]);
        $this->assertEquals(123, $driver->getRecipientProfileId($user_id));
    }

    public function test_if_getRecipientProfileId_is_returning_null_because_recipient_profile_id_doesnt_exists()
    {
        $user_id = 1;
        $driver = new Transferwise();
        $this->assertNull($driver->getRecipientProfileId($user_id));
    }

    public function getQuote($source, $amount, $targetCountry) {
        return (new Transferwise())->getQuote($source, $amount, $targetCountry);
    }
}
