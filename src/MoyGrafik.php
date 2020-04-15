<?php

namespace Brainfab\MoyGrafik;

use GuzzleHttp\RequestOptions;

class MoyGrafik
{
    private $companies;
    private $users;
    private $employees;
    private $presence;
    private $clientId;
    private $clientSecret;
    private $accessToken;
    private $httpClient;

    public function __construct(HttpClient $client = null)
    {
        $this->httpClient = $client ?? new HttpClient();

        $this->companies = new Companies($this);
        $this->users = new Users($this);
        $this->employees = new Employees($this);
        $this->presence = new Presence($this);
    }

    public function getHttpClient(): HttpClient
    {
        return $this->httpClient;
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function setClientId(string $clientId): void
    {
        $this->clientId = $clientId;
    }

    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    public function setClientSecret(string $clientSecret)
    {
        $this->clientSecret = $clientSecret;
    }

    public function getAccessToken(): array
    {
        return $this->accessToken;
    }

    public function setAccessToken(array $accessToken): void
    {
        $this->accessToken = $accessToken;
    }

    public function companies(): Companies
    {
        return $this->companies;
    }

    public function users(): Users
    {
        return $this->users;
    }

    public function employees(): Employees
    {
        return $this->employees;
    }

    public function presence(): Presence
    {
        return $this->presence;
    }

    public function authenticate(array $token): void
    {
        if (!empty($token['refresh_token'])) {
            $token['grant_type'] = 'refresh_token';
        } else {
            $token['grant_type'] = 'password';
        }

        $token['client_id'] = $this->getClientId();
        $token['client_secret'] = $this->getClientSecret();

        $res = $this->getHttpClient()->post(
            '/oauth/v2/token',
            [
                RequestOptions::FORM_PARAMS => $token
            ]
        );

        $this->setAccessToken(json_decode($res->getBody()->getContents(), true));
    }
}
