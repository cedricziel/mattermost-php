<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class JobsEndpoint
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
     * Get the jobs.
     * Get a page of jobs. Use the query parameters to modify the behaviour of this endpoint.
     * __Minimum server version: 4.1__
     * ##### Permissions
     * Must have `manage_jobs` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getJobs(
        /** The page to select. */
        ?int $page = 0,
        /** The number of jobs per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/jobs';
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
     * Create a new job.
     * Create a new job.
     * __Minimum server version: 4.1__
     * ##### Permissions
     * Must have `manage_jobs` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createJob(\CreateJobRequest $requestBody): array
    {
        $path = '/api/v4/jobs';
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
     * Get a job.
     * Gets a single job.
     * __Minimum server version: 4.1__
     * ##### Permissions
     * Must have `manage_jobs` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getJob(
        /** Job GUID */
        string $job_id,
    ): array
    {
        $path = '/api/v4/jobs/{job_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['job_id'] = $job_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Download the results of a job.
     * Download the result of a single job.
     * __Minimum server version: 5.28__
     * ##### Permissions
     * Must have `manage_jobs` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function downloadJob(
        /** Job GUID */
        string $job_id,
    ): array
    {
        $path = '/api/v4/jobs/{job_id}/download';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['job_id'] = $job_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Cancel a job.
     * Cancel a job.
     * __Minimum server version: 4.1__
     * ##### Permissions
     * Must have `manage_jobs` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function cancelJob(
        /** Job GUID */
        string $job_id,
    ): array
    {
        $path = '/api/v4/jobs/{job_id}/cancel';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['job_id'] = $job_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get the jobs of the given type.
     * Get a page of jobs of the given type. Use the query parameters to modify the behaviour of this endpoint.
     * __Minimum server version: 4.1__
     * ##### Permissions
     * Must have `manage_jobs` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
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
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['type'] = $type;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }
}
