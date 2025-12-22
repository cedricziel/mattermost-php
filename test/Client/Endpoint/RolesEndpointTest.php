<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\RolesEndpoint;
use CedricZiel\MattermostPhp\Client\Model\GetRolesByNamesRequest;
use CedricZiel\MattermostPhp\Client\Model\Role;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(RolesEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Role::class)]
class RolesEndpointTest extends ClientTestCase
{
    public RolesEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new RolesEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getAllRolesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'name' => 'test-name', 'display_name' => 'test-display_name', 'description' => 'test-description', 'permissions' => [], 'scheme_managed' => true]]);

        $result = $this->endpoint->getAllRoles();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/roles');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Role::class, $result[0]);
    }

    #[Test]
    public function getRoleBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'name' => 'test-name', 'display_name' => 'test-display_name', 'description' => 'test-description', 'permissions' => [], 'scheme_managed' => true]);

        $role_id = 'test-role_id';

        $result = $this->endpoint->getRole($role_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/roles/test-role_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Role::class, $result);
    }

    #[Test]
    public function getRoleByNameBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'name' => 'test-name', 'display_name' => 'test-display_name', 'description' => 'test-description', 'permissions' => [], 'scheme_managed' => true]);

        $role_name = 'test-role_name';

        $result = $this->endpoint->getRoleByName($role_name);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/roles/name/test-role_name');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Role::class, $result);
    }

    #[Test]
    public function getRolesByNamesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'name' => 'test-name', 'display_name' => 'test-display_name', 'description' => 'test-description', 'permissions' => [], 'scheme_managed' => true]]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\GetRolesByNamesRequest(items: []);

        $result = $this->endpoint->getRolesByNames($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/roles/names');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Role::class, $result[0]);
    }
}
