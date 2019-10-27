<?php
namespace PayoutAdapter\Test\Drivers\Transferwise;

use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use PayoutAdapter\Drivers\Transferwise\Transferwise;
use PayoutAdapter\Utils\CurrencyBankInfo;
use Tests\TestCase;

class TransferWiseTest extends TestCase
{
    use WithFaker;
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
            'details' => $values
        ];

        $recipient = $driver->createRecipient($country, $data);

        dd($recipient);
    }







    /**
     *
     *
     *
     *
     *
     * RAJ -> send -> $100 -> from -> michael -> to -> jackson
     * central banking [------------------------] -> what is the default driver for raj ? driver ->  normalize
     * transferwise [first name | last name] | transpay [fullName]
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     */







}
