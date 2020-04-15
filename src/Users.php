<?php

namespace Brainfab\MoyGrafik;

use Brainfab\MoyGrafik\Entity\User;

class Users extends BaseResource
{
    protected $apiPath = '/api/external/v1/me';

    public function me(): User
    {
        $res = $this->client->getHttpClient()->get($this->apiPath, [
            'headers' => [
                'Authorization' => $this->getAuthorizationHeader()
            ]
        ]);

        return $this->client->getHttpClient()->decodeResponse($res, User::class);
    }
}
