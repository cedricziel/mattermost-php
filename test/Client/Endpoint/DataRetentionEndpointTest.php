<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\DataRetentionEndpoint;
use CedricZiel\MattermostPhp\Client\Model\AddChannelsToRetentionPolicyRequest;
use CedricZiel\MattermostPhp\Client\Model\AddTeamsToRetentionPolicyRequest;
use CedricZiel\MattermostPhp\Client\Model\ChannelListWithTeamData;
use CedricZiel\MattermostPhp\Client\Model\DataRetentionPolicyWithTeamAndChannelCounts;
use CedricZiel\MattermostPhp\Client\Model\GetDataRetentionPoliciesCountResponse;
use CedricZiel\MattermostPhp\Client\Model\GlobalDataRetentionPolicy;
use CedricZiel\MattermostPhp\Client\Model\RemoveChannelsFromRetentionPolicyRequest;
use CedricZiel\MattermostPhp\Client\Model\RemoveTeamsFromRetentionPolicyRequest;
use CedricZiel\MattermostPhp\Client\Model\RetentionPolicyForChannelList;
use CedricZiel\MattermostPhp\Client\Model\RetentionPolicyForTeamList;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Client\Model\Team;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(DataRetentionEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(RetentionPolicyForTeamList::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(RetentionPolicyForChannelList::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(GlobalDataRetentionPolicy::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(GetDataRetentionPoliciesCountResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(DataRetentionPolicyWithTeamAndChannelCounts::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Team::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(ChannelListWithTeamData::class)]
class DataRetentionEndpointTest extends ClientTestCase
{
    public DataRetentionEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new DataRetentionEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getTeamPoliciesForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['policies' => [], 'total_count' => 1234567890]);

        $user_id = 'test-user_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getTeamPoliciesForUser($user_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/data_retention/team_policies');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\RetentionPolicyForTeamList::class, $result);
    }

    #[Test]
    public function getChannelPoliciesForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['policies' => [], 'total_count' => 1234567890]);

        $user_id = 'test-user_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getChannelPoliciesForUser($user_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/data_retention/channel_policies');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\RetentionPolicyForChannelList::class, $result);
    }

    #[Test]
    public function getDataRetentionPolicyBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['message_deletion_enabled' => true, 'file_deletion_enabled' => true, 'message_retention_cutoff' => 1234567890, 'file_retention_cutoff' => 1234567890]);

        $result = $this->endpoint->getDataRetentionPolicy();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/data_retention/policy');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\GlobalDataRetentionPolicy::class, $result);
    }

    #[Test]
    public function getDataRetentionPoliciesCountBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['total_count' => 1234567890]);

        $result = $this->endpoint->getDataRetentionPoliciesCount();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/data_retention/policies_count');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\GetDataRetentionPoliciesCountResponse::class, $result);
    }

    #[Test]
    public function getDataRetentionPoliciesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['display_name' => 'test-display_name', 'post_duration' => 1234567890, 'id' => 'test-id', 'team_count' => 1234567890, 'channel_count' => 1234567890]]);

        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getDataRetentionPolicies($page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/data_retention/policies');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\DataRetentionPolicyWithTeamAndChannelCounts::class, $result[0]);
    }

    #[Test]
    public function getDataRetentionPolicyByIDBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['display_name' => 'test-display_name', 'post_duration' => 1234567890, 'id' => 'test-id', 'team_count' => 1234567890, 'channel_count' => 1234567890]);

        $policy_id = 'test-policy_id';

        $result = $this->endpoint->getDataRetentionPolicyByID($policy_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/data_retention/policies/test-policy_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\DataRetentionPolicyWithTeamAndChannelCounts::class, $result);
    }

    #[Test]
    public function deleteDataRetentionPolicyBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $policy_id = 'test-policy_id';

        $result = $this->endpoint->deleteDataRetentionPolicy($policy_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/data_retention/policies/test-policy_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getTeamsForRetentionPolicyBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'display_name' => 'test-display_name', 'name' => 'test-name', 'description' => 'test-description', 'email' => 'test-email', 'type' => 'test-type', 'allowed_domains' => 'test-allowed_domains', 'invite_id' => 'test-invite_id', 'allow_open_invite' => true, 'policy_id' => 'test-policy_id']]);

        $policy_id = 'test-policy_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getTeamsForRetentionPolicy($policy_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/data_retention/policies/test-policy_id/teams');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Team::class, $result[0]);
    }

    #[Test]
    public function addTeamsToRetentionPolicyBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $policy_id = 'test-policy_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\AddTeamsToRetentionPolicyRequest(items: []);

        $result = $this->endpoint->addTeamsToRetentionPolicy($policy_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/data_retention/policies/test-policy_id/teams');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function removeTeamsFromRetentionPolicyBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $policy_id = 'test-policy_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\RemoveTeamsFromRetentionPolicyRequest(items: []);

        $result = $this->endpoint->removeTeamsFromRetentionPolicy($policy_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/data_retention/policies/test-policy_id/teams');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getChannelsForRetentionPolicyBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['items' => []]);

        $policy_id = 'test-policy_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getChannelsForRetentionPolicy($policy_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/data_retention/policies/test-policy_id/channels');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ChannelListWithTeamData::class, $result);
    }

    #[Test]
    public function addChannelsToRetentionPolicyBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $policy_id = 'test-policy_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\AddChannelsToRetentionPolicyRequest(items: []);

        $result = $this->endpoint->addChannelsToRetentionPolicy($policy_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/data_retention/policies/test-policy_id/channels');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function removeChannelsFromRetentionPolicyBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $policy_id = 'test-policy_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\RemoveChannelsFromRetentionPolicyRequest(items: []);

        $result = $this->endpoint->removeChannelsFromRetentionPolicy($policy_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/data_retention/policies/test-policy_id/channels');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }
}
