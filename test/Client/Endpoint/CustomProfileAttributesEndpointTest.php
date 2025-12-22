<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\CustomProfileAttributesEndpoint;
use CedricZiel\MattermostPhp\Client\Model\CreateCPAFieldRequest;
use CedricZiel\MattermostPhp\Client\Model\GetCPAGroupResponse;
use CedricZiel\MattermostPhp\Client\Model\PropertyField;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(CustomProfileAttributesEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PropertyField::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(GetCPAGroupResponse::class)]
class CustomProfileAttributesEndpointTest extends ClientTestCase
{
    public CustomProfileAttributesEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new CustomProfileAttributesEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function createCPAFieldBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'type' => 'test-type', 'name' => 'test-name', 'description' => 'test-description', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreateCPAFieldRequest(name: 'test-name', type: 'test-type');

        $result = $this->endpoint->createCPAField($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/custom_profile_attributes/fields');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PropertyField::class, $result);
    }

    #[Test]
    public function deleteCPAFieldBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $field_id = 'test-field_id';

        $result = $this->endpoint->deleteCPAField($field_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/custom_profile_attributes/fields/test-field_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getCPAGroupBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id']);

        $result = $this->endpoint->getCPAGroup();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/custom_profile_attributes/group');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\GetCPAGroupResponse::class, $result);
    }
}
