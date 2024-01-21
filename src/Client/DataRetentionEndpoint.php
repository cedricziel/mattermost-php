<?php

namespace CedricZiel\MattermostPhp\Client;

class DataRetentionEndpoint
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
     * Get the policies which are applied to a user's teams
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
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Get the policies which are applied to a user's channels
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
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Get the global data retention policy
     */
    public function getDataRetentionPolicy(): array
    {
        $path = '/api/v4/data_retention/policy';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get the number of granular data retention policies
     */
    public function getDataRetentionPoliciesCount(): array
    {
        $path = '/api/v4/data_retention/policies_count';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get the granular data retention policies
     */
    public function getDataRetentionPolicies(
        /** The page to select. */
        ?int $page = 0,
        /** The number of policies per page. There is a maximum limit of 200 per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/data_retention/policies';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Create a new granular data retention policy
     */
    public function createDataRetentionPolicy(): array
    {
        $path = '/api/v4/data_retention/policies';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get a granular data retention policy
     */
    public function getDataRetentionPolicyByID(
        /** The ID of the granular retention policy. */
        string $policy_id,
    ): array
    {
        $path = '/api/v4/data_retention/policies/{policy_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['policy_id'] = $policy_id;
        return [];
    }

    /**
     * Patch a granular data retention policy
     */
    public function patchDataRetentionPolicy(
        /** The ID of the granular retention policy. */
        string $policy_id,
    ): array
    {
        $path = '/api/v4/data_retention/policies/{policy_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['policy_id'] = $policy_id;
        return [];
    }

    /**
     * Delete a granular data retention policy
     */
    public function deleteDataRetentionPolicy(
        /** The ID of the granular retention policy. */
        string $policy_id,
    ): array
    {
        $path = '/api/v4/data_retention/policies/{policy_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['policy_id'] = $policy_id;
        return [];
    }

    /**
     * Get the teams for a granular data retention policy
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
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['policy_id'] = $policy_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Add teams to a granular data retention policy
     */
    public function addTeamsToRetentionPolicy(
        /** The ID of the granular retention policy. */
        string $policy_id,
    ): array
    {
        $path = '/api/v4/data_retention/policies/{policy_id}/teams';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['policy_id'] = $policy_id;
        return [];
    }

    /**
     * Delete teams from a granular data retention policy
     */
    public function removeTeamsFromRetentionPolicy(
        /** The ID of the granular retention policy. */
        string $policy_id,
    ): array
    {
        $path = '/api/v4/data_retention/policies/{policy_id}/teams';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['policy_id'] = $policy_id;
        return [];
    }

    /**
     * Search for the teams in a granular data retention policy
     */
    public function searchTeamsForRetentionPolicy(
        /** The ID of the granular retention policy. */
        string $policy_id,
    ): array
    {
        $path = '/api/v4/data_retention/policies/{policy_id}/teams/search';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['policy_id'] = $policy_id;
        return [];
    }

    /**
     * Get the channels for a granular data retention policy
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
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['policy_id'] = $policy_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Add channels to a granular data retention policy
     */
    public function addChannelsToRetentionPolicy(
        /** The ID of the granular retention policy. */
        string $policy_id,
    ): array
    {
        $path = '/api/v4/data_retention/policies/{policy_id}/channels';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['policy_id'] = $policy_id;
        return [];
    }

    /**
     * Delete channels from a granular data retention policy
     */
    public function removeChannelsFromRetentionPolicy(
        /** The ID of the granular retention policy. */
        string $policy_id,
    ): array
    {
        $path = '/api/v4/data_retention/policies/{policy_id}/channels';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['policy_id'] = $policy_id;
        return [];
    }

    /**
     * Search for the channels in a granular data retention policy
     */
    public function searchChannelsForRetentionPolicy(
        /** The ID of the granular retention policy. */
        string $policy_id,
    ): array
    {
        $path = '/api/v4/data_retention/policies/{policy_id}/channels/search';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['policy_id'] = $policy_id;
        return [];
    }
}
;