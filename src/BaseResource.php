<?php

namespace Brainfab\MoyGrafik;

abstract class BaseResource
{
    /**
     * @var ViRocket
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
    public function getAuthorizationHeader()
    {
        $token = $this->client->getAccessToken();
        $authToken = isset($token['access_token']) ? $token['access_token'] : null;

        return sprintf('Bearer %s', $authToken);
    }
}