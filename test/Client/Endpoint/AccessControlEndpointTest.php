<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\AccessControlEndpoint;
use CedricZiel\MattermostPhp\Client\Model\AccessControlFieldsAutocompleteResponse;
use CedricZiel\MattermostPhp\Client\Model\AccessControlPolicy;
use CedricZiel\MattermostPhp\Client\Model\ChannelsWithCount;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(AccessControlEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(AccessControlFieldsAutocompleteResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(AccessControlPolicy::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(ChannelsWithCount::class)]
class AccessControlEndpointTest extends ClientTestCase
{
    public AccessControlEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new AccessControlEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getAccessControlPolicyAutocompleteFieldsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['fields' => []]);

        $limit = 1;
        $after = 'test-after';

        $result = $this->endpoint->getAccessControlPolicyAutocompleteFields($limit, $after);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\AccessControlFieldsAutocompleteResponse::class, $result);
    }

    #[Test]
    public function getAccessControlPolicyBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'name' => 'test-name', 'display_name' => 'test-display_name', 'description' => 'test-description', 'expression' => 'test-expression', 'is_active' => true, 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890]);

        $policy_id = 'test-policy_id';

        $result = $this->endpoint->getAccessControlPolicy($policy_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\AccessControlPolicy::class, $result);
    }

    #[Test]
    public function deleteAccessControlPolicyBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $policy_id = 'test-policy_id';

        $result = $this->endpoint->deleteAccessControlPolicy($policy_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function updateAccessControlPolicyActiveStatusBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $policy_id = 'test-policy_id';
        $active = true;

        $result = $this->endpoint->updateAccessControlPolicyActiveStatus($policy_id, $active);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getChannelsForAccessControlPolicyBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['channels' => 'test-channels', 'total_count' => 1234567890]);

        $policy_id = 'test-policy_id';
        $limit = 1;
        $after = 'test-after';

        $result = $this->endpoint->getChannelsForAccessControlPolicy($policy_id, $limit, $after);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ChannelsWithCount::class, $result);
    }
}
