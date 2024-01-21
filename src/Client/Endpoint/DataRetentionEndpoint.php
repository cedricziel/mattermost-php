<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class DataRetentionEndpoint
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
     * Get the policies which are applied to a user's teams
     * Gets the policies which are applied to the all of the teams to which a user belongs.
     *
     * __Minimum server version__: 5.35
     *
     * ##### Permissions
     * Must be logged in as the user or have the `manage_system` permission.
     *
     * ##### License
     * Requires an E20 license.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getTeamPoliciesForUser(
        /** The ID of the user. This can also be "me" which will point to the current user. */
        string $user_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of policies per page. There is a maximum limit of 200 per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/users/{user_id}/data_retention/team_policies';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetTeamPoliciesForUserResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get the policies which are applied to a user's channels
     * Gets the policies which are applied to the all of the channels to which a user belongs.
     *
     * __Minimum server version__: 5.35
     *
     * ##### Permissions
     * Must be logged in as the user or have the `manage_system` permission.
     *
     * ##### License
     * Requires an E20 license.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannelPoliciesForUser(
        /** The ID of the user. This can also be "me" which will point to the current user. */
        string $user_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of policies per page. There is a maximum limit of 200 per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/users/{user_id}/data_retention/channel_policies';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetChannelPoliciesForUserResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get the global data retention policy
     * Gets the current global data retention policy details from the server,
     * including what data should be purged and the cutoff times for each data
     * type that should be purged.
     *
     * __Minimum server version__: 4.3
     *
     * ##### Permissions
     * Requires an active session but no other permissions.
     *
     * ##### License
     * Requires an E20 license.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getDataRetentionPolicy(): array
    {
        $path = '/api/v4/data_retention/policy';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetDataRetentionPolicyResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get the number of granular data retention policies
     * Gets the number of granular (i.e. team or channel-specific) data retention
     * policies from the server.
     *
     * __Minimum server version__: 5.35
     *
     * ##### Permissions
     * Must have the `sysconsole_read_compliance_data_retention` permission.
     *
     * ##### License
     * Requires an E20 license.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getDataRetentionPoliciesCount(): array
    {
        $path = '/api/v4/data_retention/policies_count';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetDataRetentionPoliciesCountResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get the granular data retention policies
     * Gets details about the granular (i.e. team or channel-specific) data retention
     * policies from the server.
     *
     * __Minimum server version__: 5.35
     *
     * ##### Permissions
     * Must have the `sysconsole_read_compliance_data_retention` permission.
     *
     * ##### License
     * Requires an E20 license.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getDataRetentionPolicies(
        /** The page to select. */
        ?int $page = 0,
        /** The number of policies per page. There is a maximum limit of 200 per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/data_retention/policies';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetDataRetentionPoliciesResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Create a new granular data retention policy
     * Creates a new granular data retention policy with the specified display
     * name and post duration.
     *
     * __Minimum server version__: 5.35
     *
     * ##### Permissions
     * Must have the `sysconsole_write_compliance_data_retention` permission.
     *
     * ##### License
     * Requires an E20 license.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createDataRetentionPolicy(
        \CedricZiel\MattermostPhp\Client\Model\CreateDataRetentionPolicyRequest $requestBody,
    ): array
    {
        $path = '/api/v4/data_retention/policies';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\CreateDataRetentionPolicyResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get a granular data retention policy
     * Gets details about a granular data retention policies by ID.
     *
     * __Minimum server version__: 5.35
     *
     * ##### Permissions
     * Must have the `sysconsole_read_compliance_data_retention` permission.
     *
     * ##### License
     * Requires an E20 license.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getDataRetentionPolicyByID(
        /** The ID of the granular retention policy. */
        string $policy_id,
    ): array
    {
        $path = '/api/v4/data_retention/policies/{policy_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['policy_id'] = $policy_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetDataRetentionPolicyByIDResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Patch a granular data retention policy
     * Patches (i.e. replaces the fields of) a granular data retention policy.
     * If any fields are omitted, they will not be changed.
     *
     * __Minimum server version__: 5.35
     *
     * ##### Permissions
     * Must have the `sysconsole_write_compliance_data_retention` permission.
     *
     * ##### License
     * Requires an E20 license.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function patchDataRetentionPolicy(
        /** The ID of the granular retention policy. */
        string $policy_id,
        \CedricZiel\MattermostPhp\Client\Model\PatchDataRetentionPolicyRequest $requestBody,
    ): array
    {
        $path = '/api/v4/data_retention/policies/{policy_id}';
        $method = 'patch';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['policy_id'] = $policy_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PatchDataRetentionPolicyResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Delete a granular data retention policy
     * Deletes a granular data retention policy.
     *
     * __Minimum server version__: 5.35
     *
     * ##### Permissions
     * Must have the `sysconsole_write_compliance_data_retention` permission.
     *
     * ##### License
     * Requires an E20 license.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteDataRetentionPolicy(
        /** The ID of the granular retention policy. */
        string $policy_id,
    ): array
    {
        $path = '/api/v4/data_retention/policies/{policy_id}';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['policy_id'] = $policy_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\DeleteDataRetentionPolicyResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get the teams for a granular data retention policy
     * Gets the teams to which a granular data retention policy is applied.
     *
     * __Minimum server version__: 5.35
     *
     * ##### Permissions
     * Must have the `sysconsole_read_compliance_data_retention` permission.
     *
     * ##### License
     * Requires an E20 license.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getTeamsForRetentionPolicy(
        /** The ID of the granular retention policy. */
        string $policy_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of teams per page. There is a maximum limit of 200 per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/data_retention/policies/{policy_id}/teams';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['policy_id'] = $policy_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetTeamsForRetentionPolicyResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Add teams to a granular data retention policy
     * Adds teams to a granular data retention policy.
     *
     *  __Minimum server version__: 5.35
     *
     * ##### Permissions
     * Must have the `sysconsole_write_compliance_data_retention` permission.
     *
     * ##### License
     * Requires an E20 license.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function addTeamsToRetentionPolicy(
        /** The ID of the granular retention policy. */
        string $policy_id,
        \CedricZiel\MattermostPhp\Client\Model\AddTeamsToRetentionPolicyRequest $requestBody,
    ): array
    {
        $path = '/api/v4/data_retention/policies/{policy_id}/teams';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['policy_id'] = $policy_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\AddTeamsToRetentionPolicyResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Delete teams from a granular data retention policy
     * Delete teams from a granular data retention policy.
     *
     *  __Minimum server version__: 5.35
     *
     * ##### Permissions
     * Must have the `sysconsole_write_compliance_data_retention` permission.
     *
     * ##### License
     * Requires an E20 license.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function removeTeamsFromRetentionPolicy(
        /** The ID of the granular retention policy. */
        string $policy_id,
        \CedricZiel\MattermostPhp\Client\Model\RemoveTeamsFromRetentionPolicyRequest $requestBody,
    ): array
    {
        $path = '/api/v4/data_retention/policies/{policy_id}/teams';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['policy_id'] = $policy_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\RemoveTeamsFromRetentionPolicyResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Search for the teams in a granular data retention policy
     * Searches for the teams to which a granular data retention policy is applied.
     *
     * __Minimum server version__: 5.35
     *
     * ##### Permissions
     * Must have the `sysconsole_read_compliance_data_retention` permission.
     *
     * ##### License
     * Requires an E20 license.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function searchTeamsForRetentionPolicy(
        /** The ID of the granular retention policy. */
        string $policy_id,
        \CedricZiel\MattermostPhp\Client\Model\SearchTeamsForRetentionPolicyRequest $requestBody,
    ): array
    {
        $path = '/api/v4/data_retention/policies/{policy_id}/teams/search';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['policy_id'] = $policy_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\SearchTeamsForRetentionPolicyResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get the channels for a granular data retention policy
     * Gets the channels to which a granular data retention policy is applied.
     *
     * __Minimum server version__: 5.35
     *
     * ##### Permissions
     * Must have the `sysconsole_read_compliance_data_retention` permission.
     *
     * ##### License
     * Requires an E20 license.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannelsForRetentionPolicy(
        /** The ID of the granular retention policy. */
        string $policy_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of channels per page. There is a maximum limit of 200 per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/data_retention/policies/{policy_id}/channels';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['policy_id'] = $policy_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetChannelsForRetentionPolicyResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Add channels to a granular data retention policy
     * Adds channels to a granular data retention policy.
     *
     *  __Minimum server version__: 5.35
     *
     * ##### Permissions
     * Must have the `sysconsole_write_compliance_data_retention` permission.
     *
     * ##### License
     * Requires an E20 license.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function addChannelsToRetentionPolicy(
        /** The ID of the granular retention policy. */
        string $policy_id,
        \CedricZiel\MattermostPhp\Client\Model\AddChannelsToRetentionPolicyRequest $requestBody,
    ): array
    {
        $path = '/api/v4/data_retention/policies/{policy_id}/channels';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['policy_id'] = $policy_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\AddChannelsToRetentionPolicyResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Delete channels from a granular data retention policy
     * Delete channels from a granular data retention policy.
     *
     *  __Minimum server version__: 5.35
     *
     * ##### Permissions
     * Must have the `sysconsole_write_compliance_data_retention` permission.
     *
     * ##### License
     * Requires an E20 license.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function removeChannelsFromRetentionPolicy(
        /** The ID of the granular retention policy. */
        string $policy_id,
        \CedricZiel\MattermostPhp\Client\Model\RemoveChannelsFromRetentionPolicyRequest $requestBody,
    ): array
    {
        $path = '/api/v4/data_retention/policies/{policy_id}/channels';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['policy_id'] = $policy_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\RemoveChannelsFromRetentionPolicyResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Search for the channels in a granular data retention policy
     * Searches for the channels to which a granular data retention policy is applied.
     *
     * __Minimum server version__: 5.35
     *
     * ##### Permissions
     * Must have the `sysconsole_read_compliance_data_retention` permission.
     *
     * ##### License
     * Requires an E20 license.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function searchChannelsForRetentionPolicy(
        /** The ID of the granular retention policy. */
        string $policy_id,
        \CedricZiel\MattermostPhp\Client\Model\SearchChannelsForRetentionPolicyRequest $requestBody,
    ): array
    {
        $path = '/api/v4/data_retention/policies/{policy_id}/channels/search';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['policy_id'] = $policy_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\SearchChannelsForRetentionPolicyResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }
}
