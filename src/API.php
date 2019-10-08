<?php

namespace Ultraleet\VerifyOnce;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException;
use Ultraleet\VerifyOnce\Exceptions\AuthenticationException;

class API
{
    protected $client;

    public function __construct(array $config)
    {
        $credentials = base64_encode("{$config['username']}:{$config['password']}");
        $this->client = new HttpClient([
            'base_uri' => $config['baseUrl'],
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => "Basic $credentials",
            ],
        ]);
    }

    /**
     * Post an initiate request and return the response.
     *
     * @return array
     * @throws AuthenticationException
     */
    public function initiate(): array
    {
        try {
            $response = $this->client->post('/initiate');
        } catch (ClientException $exception) {
            if (401 == $exception->getResponse()->getStatusCode()) {
                throw new AuthenticationException('Invalid username/password provided.', 401, $exception);
            }
            throw $exception;
        }
        return json_decode($response->getBody(), true);
    }
}
