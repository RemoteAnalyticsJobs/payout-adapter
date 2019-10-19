<?php
namespace PayoutAdapter\Drivers\Transferwise;


use GuzzleHttp\Client;

abstract class TransferwiseAbstract {
    /** @var mixed */
    public $httpClient;

    /** @var Object */
    public $user;

    const SANDBOX_URI   = 'https://api.sandbox.transferwise.tech/v1/';

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
        return config('payout_adapter.transferwise.profile_id');
    }

    /**
     * @return \Illuminate\Config\Repository|mixed
     */
    private function getAPIToken()
    {
        return config('payout_adapter.transferwise.api_token');
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
            ])->getBody(), true);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
