<?php

namespace Brainfab\MoyGrafik;

abstract class BaseResource
{
    /**
     * @var MoyGrafik
     */
    protected $client;


    /**
     * Constructor.
     *
     * @param MoyGrafik $client
     */
    public function __construct(MoyGrafik $client)
    {
        $this->client = $client;
    }

    /**
     * @return string
     */
    protected function getAuthorizationHeader()
    {
        $token = $this->client->getAccessToken();
        $authToken = isset($token['access_token']) ? $token['access_token'] : null;

        return sprintf('Bearer %s', $authToken);
    }
}
