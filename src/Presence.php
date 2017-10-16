<?php

namespace Brainfab\MoyGrafik;

use Brainfab\MoyGrafik\Entity\Company;
use Brainfab\MoyGrafik\Entity\PresenceTrack;
use GuzzleHttp\RequestOptions;

/**
 * Presence.
 */
class Presence extends BaseResource
{
    const TRACK_TYPE_MANUAL = 'manual';
    const TRACK_TYPE_ROUTER = 'router';
    const TRACK_TYPE_DESKTOP = 'desktop';
    const TRACK_TYPE_MOBILE = 'mobile';
    const TRACK_TYPE_FACE_DETECT = 'face_detect';

    const TRACK_ACTION_START = 'start';
    const TRACK_ACTION_STOP = 'stop';
    const TRACK_ACTION_TOGGLE = 'toggle';

    /**
     * Track employee presence.
     *
     * @param Company|integer $company
     * @param PresenceTrack   $track
     * @param string          $type
     *
     * @return PresenceTrack
     */
    public function track($company, PresenceTrack $track)
    {
        $companyId = $this->getCompanyId($company);
        $httpClient = $this->client->getHttpClient();
        $data = $httpClient->encodeRequestData($track);
        $url = $httpClient->url(
            '/api/external/v1/track/{company_id}/{type}',
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

    /**
     * @param Company|integer $company
     * @param bool            $required
     */
    protected function getCompanyId($company, $required = true)
    {
        $companyId = (int)($company instanceof Company ? $company->id : $company);

        if ($required && empty($companyId)) {
            throw new \InvalidArgumentException('Company id is required.');
        }

        return $companyId;
    }
}
