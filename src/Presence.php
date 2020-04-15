<?php

namespace Brainfab\MoyGrafik;

use Brainfab\MoyGrafik\Entity\AbstractPresenceTrack;
use GuzzleHttp\RequestOptions;

class Presence extends BaseResource
{
    private const API_PATH = '/api/external/v1/track/{company_id}/{type}';

    public const TRACK_TYPE_MANUAL = 'manual';
    public const TRACK_TYPE_ROUTER = 'router';
    public const TRACK_TYPE_DESKTOP = 'desktop';
    public const TRACK_TYPE_MOBILE = 'mobile';
    public const TRACK_TYPE_FACE_DETECT = 'face_detect';

    public const TRACK_ACTION_START = 'start';
    public const TRACK_ACTION_STOP = 'stop';
    public const TRACK_ACTION_TOGGLE = 'toggle';

    /**
     * Track employee presence.
     */
    public function track(int $companyId, AbstractPresenceTrack $track): AbstractPresenceTrack
    {
        $httpClient = $this->client->getHttpClient();
        $data = $httpClient->encodeRequestData($track);
        $url = $httpClient->url(
            self::API_PATH,
            [
                'company_id' => $companyId,
                'type'       => $track->getType()
            ]
        );

        $res = $this->client->getHttpClient()->post($url, [
            RequestOptions::BODY => $data,
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => $this->getAuthorizationHeader()
            ]
        ]);

        return $this->client->getHttpClient()->decodeResponse($res, get_class($track));
    }
}
