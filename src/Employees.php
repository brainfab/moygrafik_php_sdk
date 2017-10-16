<?php

namespace Brainfab\MoyGrafik;

use Brainfab\MoyGrafik\Entity\Company;
use Brainfab\MoyGrafik\Entity\Employee;
use Brainfab\MoyGrafik\Entity\EmployeesCollection;
use Brainfab\MoyGrafik\Entity\EmployeeSettings;
use GuzzleHttp\RequestOptions;

/**
 * Employees.
 */
class Employees extends BaseResource
{
    /**
     * @var string
     */
    protected $apiPath = '/api/external/v1/companies/{company_id}/employees';

    /**
     * List All Employees.
     *
     * @param Company|integer $company
     * @param array $options
     *
     * @return EmployeesCollection|Employee[]
     */
    public function listEmployees($company, array $options = [])
    {
        $companyId = $this->getCompanyId($company);

        $httpClient = $this->client->getHttpClient();
        $url = $httpClient->url($this->apiPath, ['company_id' => $companyId]);

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

    /**
     * Get Employee.
     *
     * @param Company|integer  $company
     * @param Employee|integer $employee
     *
     * @return Employee
     */
    public function getEmployee($company, $employee)
    {
        $companyId = $this->getCompanyId($company);
        $employeeId = $this->getEmployeeId($employee);

        $httpClient = $this->client->getHttpClient();

        $path = $this->apiPath.'/{employee_id}';
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

    /**
     * Get Employee Settings.
     *
     * @param Company|integer  $company
     * @param Employee|integer $employee
     *
     * @return Employee
     */
    public function getEmployeeSettings($company, $employee)
    {
        $companyId = $this->getCompanyId($company);
        $employeeId = $this->getEmployeeId($employee);

        $httpClient = $this->client->getHttpClient();

        $path = $this->apiPath.'/{employee_id}/settings';
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

    /**
     * Create Employee.
     *
     * @param Company|integer $company
     * @param Employee        $employee
     *
     * @return Employee
     */
    public function insert($company, Employee $employee)
    {
        $companyId = $this->getCompanyId($company);

        $httpClient = $this->client->getHttpClient();
        $url = $httpClient->url($this->apiPath, ['company_id' => $companyId]);

        $res = $httpClient->post($url, [
            RequestOptions::BODY => $httpClient->encodeRequestData($employee),
            'headers' => [
                'Authorization' => $this->getAuthorizationHeader(),
                'Content-Type'  => 'application/json'
            ]
        ]);

        return $this->client->getHttpClient()->decodeResponse($res, Employee::class);
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

    /**
     * @param Employee|integer $employee
     * @param bool             $required
     */
    protected function getEmployeeId($employee, $required = true)
    {
        $employeeId = (int)($employee instanceof Employee ? $employee->id : $employee);

        if ($required && empty($employeeId)) {
            throw new \InvalidArgumentException('Employee id is required.');
        }

        return $employeeId;
    }
}
