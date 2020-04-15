<?php

namespace Brainfab\MoyGrafik;

use Brainfab\MoyGrafik\Entity\Employee;
use Brainfab\MoyGrafik\Entity\EmployeesCollection;
use Brainfab\MoyGrafik\Entity\EmployeeSettings;
use GuzzleHttp\RequestOptions;

class Employees extends BaseResource
{
    private const API_PATH = '/api/external/v1/companies/{company_id}/employees';

    /**
     * @return EmployeesCollection|Employee[]
     */
    public function listEmployees(int $companyId, array $options = []): EmployeesCollection
    {
        $httpClient = $this->client->getHttpClient();
        $url = $httpClient->url(self::API_PATH, ['company_id' => $companyId]);

        $availableQueryParams = ['status', 'archived', 'user_id'];
        $queryParams = array_filter($options, function ($optionName) use ($availableQueryParams) {
            return in_array($optionName, $availableQueryParams);
        }, ARRAY_FILTER_USE_KEY);

        $res = $httpClient->get($url, [
            RequestOptions::QUERY => $queryParams,
            'headers' => [
                'Authorization' => $this->getAuthorizationHeader()
            ]
        ]);

        return $httpClient->decodeResponse($res, EmployeesCollection::class);
    }

    public function getEmployee(int $companyId, int $employeeId): Employee
    {
        $httpClient = $this->client->getHttpClient();

        $path = self::API_PATH.'/{employee_id}';
        $url = $httpClient->url($path, [
            'company_id' => $companyId,
            'employee_id' => $employeeId,
        ]);

        $res = $httpClient->get($url, [
            'headers' => [
                'Authorization' => $this->getAuthorizationHeader()
            ]
        ]);

        return $httpClient->decodeResponse($res, Employee::class);
    }

    public function getEmployeeSettings(int $companyId, int $employeeId): EmployeeSettings
    {
        $httpClient = $this->client->getHttpClient();

        $path = self::API_PATH.'/{employee_id}/settings';
        $url = $httpClient->url($path, [
            'company_id' => $companyId,
            'employee_id' => $employeeId,
        ]);

        $res = $httpClient->get($url, [
            'headers' => [
                'Authorization' => $this->getAuthorizationHeader()
            ]
        ]);

        return $httpClient->decodeResponse($res, EmployeeSettings::class);
    }

    public function insert(int $companyId, Employee $employee): Employee
    {
        $httpClient = $this->client->getHttpClient();
        $url = $httpClient->url(self::API_PATH, ['company_id' => $companyId]);

        $res = $httpClient->post($url, [
            RequestOptions::BODY => $httpClient->encodeRequestData($employee),
            'headers' => [
                'Authorization' => $this->getAuthorizationHeader(),
                'Content-Type'  => 'application/json'
            ]
        ]);

        return $this->client->getHttpClient()->decodeResponse($res, Employee::class);
    }
}
