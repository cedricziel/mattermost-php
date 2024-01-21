<?php

namespace CedricZiel\MattermostPhp\Client;

class ComplianceEndpoint
{
    public function __construct(
        protected string $baseUrl,
        protected \Psr\Http\Client\ClientInterface $httpClient,
    ) {
    }

    public function setBaseUrl(string $baseUrl): static
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * Create report
     */
    public function createComplianceReport(): array
    {
        $path = '/api/v4/compliance/reports';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get reports
     */
    public function getComplianceReports(
        /** The page to select. */
        ?int $page = 0,
        /** The number of reports per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/compliance/reports';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Get a report
     */
    public function getComplianceReport(
        /** Compliance report GUID */
        string $report_id,
    ): array
    {
        $path = '/api/v4/compliance/reports/{report_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['report_id'] = $report_id;
        return [];
    }

    /**
     * Download a report
     */
    public function downloadComplianceReport(
        /** Compliance report GUID */
        string $report_id,
    ): array
    {
        $path = '/api/v4/compliance/reports/{report_id}/download';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['report_id'] = $report_id;
        return [];
    }
}
;