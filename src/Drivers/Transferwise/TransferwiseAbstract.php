<?php
namespace PayoutAdapter\Drivers\Transferwise;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

abstract class TransferwiseAbstract {
    /** @var mixed */
    public $httpClient;

    /** @var Object */
    public $user;

    /** @var string  */
    const SANDBOX_URI   = 'https://api.sandbox.transferwise.tech/v1/';

    /** @var string  */
    const LIVE_URI      = 'https://api.sandbox.transferwise.tech/v1/';

    /**
     * HttpClient constructor.
     * @param null $http
     */
    public function __construct($http = null)
    {
        $baseUri    = $this->getBaseUri();
        $apiToken   = $this->getAPIToken();
        $options    = [
            'base_uri' => $baseUri,
            'headers' => [
                'Authorization' => 'Bearer '. $apiToken,
                'Accept'     => 'application/json'
            ]
        ];
        $this->setHttpClient($http, $options);
    }

    /**
     * @return string
     */
    public function getProfileId()
    {
        if (app()->environment() == 'testing' || app()->environment() == 'local') {
            return config('payout_adapter.transferwise.SANDBOX_PROFILE_ID');
        }
        return config('payout_adapter.transferwise.LIVE_PROFILE_ID');
    }

    /**
     * @return \Illuminate\Config\Repository|mixed
     */
    private function getAPIToken()
    {
        if (app()->environment() == 'testing' || app()->environment() == 'local') {
            return config('payout_adapter.transferwise.SANDBOX_TOKEN');
        }
        return config('payout_adapter.transferwise.LIVE_TOKEN');
    }

    /**
     * @param $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @param null $http
     * @param array $options
     */
    private function setHttpClient($http = null, array $options = [])
    {
        if (is_null($http)) {
            $this->httpClient = new Client($options);
            return;
        }
        $this->httpClient = $http;
    }

    /**
     * It will return base uri
     * @return string
     */
    public function getBaseUri()
    {
        if(app()->environment() == 'testing' || app()->environment() == 'local') {
            return self::SANDBOX_URI;
        }
        return self::LIVE_URI;
    }

    /**
     * @param string $uri
     * @param array $data
     * @return mixed
     */
    public function post(string $uri, array $data)
    {
        try {
            return json_decode($this->httpClient->post($uri, [
                'json' => $data
            ])->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody()->getContents(), true);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
