<?php

namespace Brainfab\MoyGrafik;

abstract class BaseResource
{
    protected $client;

    public function __construct(MoyGrafik $client)
    {
        $this->client = $client;
    }

    protected function getAuthorizationHeader(): string
    {
        $token = $this->client->getAccessToken();
        $authToken = isset($token['access_token']) ? $token['access_token'] : null;

        return sprintf('Bearer %s', $authToken);
    }
}
