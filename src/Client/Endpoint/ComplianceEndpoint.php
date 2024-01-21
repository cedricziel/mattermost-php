<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class ComplianceEndpoint
{
    use \CedricZiel\MattermostPhp\Client\HttpClientTrait;

    public function __construct(
        protected string $baseUrl,
        ?\Psr\Http\Client\ClientInterface $httpClient = null,
        ?\Psr\Http\Message\RequestFactoryInterface $requestFactory = null,
    ) {
    }

    public function setBaseUrl(string $baseUrl): static
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * Create report
     * Create and save a compliance report.
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createComplianceReport(): array
    {
        $path = '/api/v4/compliance/reports';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get reports
     * Get a list of compliance reports previously created by page, selected with `page` and `per_page` query parameters.
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getComplianceReports(
        /** The page to select. */
        ?int $page = 0,
        /** The number of reports per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/compliance/reports';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get a report
     * Get a compliance reports previously created.
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getComplianceReport(
        /** Compliance report GUID */
        string $report_id,
    ): array
    {
        $path = '/api/v4/compliance/reports/{report_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['report_id'] = $report_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Download a report
     * Download the full contents of a report as a file.
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function downloadComplianceReport(
        /** Compliance report GUID */
        string $report_id,
    ): array
    {
        $path = '/api/v4/compliance/reports/{report_id}/download';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['report_id'] = $report_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }
}