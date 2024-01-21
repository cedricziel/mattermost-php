<?php

namespace CedricZiel\MattermostPhp\Client;

class JobsEndpoint
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
     * Get the jobs.
     */
    public function getJobs(
        /** The page to select. */
        ?int $page = 0,
        /** The number of jobs per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/jobs';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Create a new job.
     */
    public function createJob(): array
    {
        $path = '/api/v4/jobs';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get a job.
     */
    public function getJob(
        /** Job GUID */
        string $job_id,
    ): array
    {
        $path = '/api/v4/jobs/{job_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['job_id'] = $job_id;
        return [];
    }

    /**
     * Download the results of a job.
     */
    public function downloadJob(
        /** Job GUID */
        string $job_id,
    ): array
    {
        $path = '/api/v4/jobs/{job_id}/download';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['job_id'] = $job_id;
        return [];
    }

    /**
     * Cancel a job.
     */
    public function cancelJob(
        /** Job GUID */
        string $job_id,
    ): array
    {
        $path = '/api/v4/jobs/{job_id}/cancel';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['job_id'] = $job_id;
        return [];
    }

    /**
     * Get the jobs of the given type.
     */
    public function getJobsByType(
        /** Job type */
        string $type,
        /** The page to select. */
        ?int $page = 0,
        /** The number of jobs per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/jobs/type/{type}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['type'] = $type;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }
}
;