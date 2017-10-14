<?php

namespace Brainfab\MoyGrafik;

use Brainfab\MoyGrafik\Entity\User;
use GuzzleHttp\RequestOptions;

/**
 * Users.
 */
class Users extends BaseResource
{
    /**
     * @var string
     */
    protected $apiPath = '/api/external/v1/me';

    /**
     * Get authorised user data.
     *
     * @return User
     */
    public function me()
    {
        $res = $this->client->getHttpClient()->get($this->apiPath, [
            'headers' => [
                'Authorization' => $this->getAuthorizationHeader()
            ]
        ]);

        return $this->client->getHttpClient()->decodeResponse($res, User::class);
    }
}
