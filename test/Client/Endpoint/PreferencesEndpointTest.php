<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\PreferencesEndpoint;
use CedricZiel\MattermostPhp\Client\Model\DeletePreferencesRequest;
use CedricZiel\MattermostPhp\Client\Model\Preference;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Client\Model\UpdatePreferencesRequest;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(PreferencesEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Preference::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
class PreferencesEndpointTest extends ClientTestCase
{
    public PreferencesEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new PreferencesEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getPreferencesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['user_id' => 'test-user_id', 'category' => 'test-category', 'name' => 'test-name', 'value' => 'test-value']]);

        $user_id = 'test-user_id';

        $result = $this->endpoint->getPreferences($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/preferences');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Preference::class, $result[0]);
    }

    #[Test]
    public function updatePreferencesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdatePreferencesRequest(items: []);

        $result = $this->endpoint->updatePreferences($user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/users/test-user_id/preferences');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function deletePreferencesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\DeletePreferencesRequest(items: []);

        $result = $this->endpoint->deletePreferences($user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/test-user_id/preferences/delete');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getPreferencesByCategoryBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['user_id' => 'test-user_id', 'category' => 'test-category', 'name' => 'test-name', 'value' => 'test-value']]);

        $user_id = 'test-user_id';
        $category = 'test-category';

        $result = $this->endpoint->getPreferencesByCategory($user_id, $category);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/preferences/test-category');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Preference::class, $result[0]);
    }

    #[Test]
    public function getPreferencesByCategoryByNameBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['user_id' => 'test-user_id', 'category' => 'test-category', 'name' => 'test-name', 'value' => 'test-value']);

        $user_id = 'test-user_id';
        $category = 'test-category';
        $preference_name = 'test-preference_name';

        $result = $this->endpoint->getPreferencesByCategoryByName($user_id, $category, $preference_name);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/preferences/test-category/name/test-preference_name');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Preference::class, $result);
    }
}
