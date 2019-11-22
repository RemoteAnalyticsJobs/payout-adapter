<?php

namespace PayoutAdapter\Drivers\TransPay;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use PayoutAdapter\Contracts\DriverContract;

abstract class TransPayAbstract
{
    /** @var Client */
    public $_httpClient;

    /** @var string */
    public $_apiKey;

    /** @var string  */
    public static $LIVE_URL = 'https://send.transfast.ws';

    /** @var string  */
    public static $SANDBOX_URL = 'https://demo-api.transfast.net/';

    /** @var User */
    public $user;

    /**
     * TransPayAbstract constructor.
     * @param null $client
     */
    public function __construct($user, $client = null)
    {
        $apiToken = $this->_getApiKey();
        $this->_setApiKey($apiToken);
        $this->_setHttpClient($client);
        $this->user = $user;
    }

    /**
     * @param $client
     * @return TransPayAbstract
     */
    public function _setHttpClient($client) : TransPayAbstract
    {
        if (is_null($client)) {
            $this->_httpClient = new Client([
                'base_uri' => self::_getBaseUrl(),
                'headers' => [
                    'Authorization' => 'Credentials ' . $this->_apiKey,
                    'Content-Type' => 'application/json'
                ]
            ]);
            return $this;
        }
        $this->_httpClient = $client;
        return $this;
    }

    /**
     * @param string $apiKey
     * @return TransPayAbstract
     */
    public function _setApiKey(string $apiKey) : TransPayAbstract
    {
        $this->_apiKey = $apiKey;
        return $this;
    }

    /**
     * @return string
     */
    public static function _getBaseUrl()
    {
        if (app()->environment() == 'testing' || app()->environment() == 'local') {
            return self::$SANDBOX_URL;
        }

        return self::$LIVE_URL;
    }

    /**
     * It will return token according to environment
     * @return \Illuminate\Config\Repository|mixed
     */
    public function _getApiKey()
    {
        if (app()->environment() == 'testing' || app()->environment() == 'local') {
            return config('payout_adapter.transpay.SANDBOX_TOKEN');
        }
        return config('payout_adapter.transpay.LIVE_TOKEN');
    }

    /**
     * @param string $uri
     * @param array $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post(string $uri, array $data = [])
    {
        try {
            return json_decode($this->_httpClient->post($uri, ['json' => $data])->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return $e->getResponse()->getBody()->getContents();
        }
    }

    /**
     * @param string $uri
     * @param array $payload
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get(string $uri, array $payload = [])
    {
        try {
            return json_decode($this->_httpClient->get($uri, [
                'json' => $payload
            ])->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody()->getContents(), true);
        }
    }
}
