<?php

namespace Brainfab\MoyGrafik;

use Brainfab\MoyGrafik\Entity\Company;
use Brainfab\MoyGrafik\Entity\CompaniesCollection;
use GuzzleHttp\RequestOptions;

/**
 * Companies.
 */
class Companies extends BaseResource
{
    /**
     * @var string
     */
    protected $apiPath = '/api/external/v1/me/companies';

    /**
     * List All Companies.
     *
     * @param array $options
     *
     * @return CompaniesCollection|Company[]
     */
    public function listCompanies(array $options = [])
    {
        $queryParams = [];
        if (!empty($options['page'])) {
            $queryParams['page'] = $options['page'];
        }

        $res = $this->client->getHttpClient()->get($this->apiPath, [
            RequestOptions::QUERY => $queryParams,
            'headers' => [
                'Authorization' => $this->getAuthorizationHeader()
            ]
        ]);

        return $this->client->getHttpClient()->decodeResponse($res, CompaniesCollection::class);
    }
}