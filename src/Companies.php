<?php

namespace Brainfab\MoyGrafik;

use Brainfab\MoyGrafik\Entity\Company;
use Brainfab\MoyGrafik\Entity\CompaniesCollection;
use Brainfab\MoyGrafik\Entity\CompanyId;
use GuzzleHttp\RequestOptions;

class Companies extends BaseResource
{
    private const API_PATH = '/api/external/v1/me/companies';

    /**
     * @return CompaniesCollection|Company[]
     */
    public function listCompanies(array $options = []): CompaniesCollection
    {
        $queryParams = [];
        if (!empty($options['page'])) {
            $queryParams['page'] = $options['page'];
        }

        $res = $this->client->getHttpClient()->get(self::API_PATH, [
            RequestOptions::QUERY => $queryParams,
            'headers' => [
                'Authorization' => $this->getAuthorizationHeader()
            ]
        ]);

        return $this->client->getHttpClient()->decodeResponse($res, CompaniesCollection::class);
    }

    public function getCompanyIdBySlug(string $slug): CompanyId
    {
        $url = $this->client->getHttpClient()->url('/api/external/v1/company/slug/{slug}', [
            'slug' => $slug
        ]);

        $res = $this->client->getHttpClient()->get($url, [
            'headers' => [
                'Authorization' => $this->getAuthorizationHeader()
            ]
        ]);

        return $this->client->getHttpClient()->decodeResponse($res, CompanyId::class);
    }
}
