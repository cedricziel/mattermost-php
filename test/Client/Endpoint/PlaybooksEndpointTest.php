<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\PlaybooksEndpoint;
use CedricZiel\MattermostPhp\Client\Model\Playbook;
use CedricZiel\MattermostPhp\Client\Model\PlaybookList;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(PlaybooksEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PlaybookList::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Playbook::class)]
class PlaybooksEndpointTest extends ClientTestCase
{
    public PlaybooksEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new PlaybooksEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getPlaybooksBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['total_count' => 1234567890, 'page_count' => 1234567890, 'has_more' => true, 'items' => []]);

        $team_id = 'test-team_id';
        $page = 1;
        $per_page = 1;
        $sort = 'test-sort';
        $direction = 'test-direction';
        $with_archived = true;

        $result = $this->endpoint->getPlaybooks($team_id, $page, $per_page, $sort, $direction, $with_archived);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PlaybookList::class, $result);
    }

    #[Test]
    public function getPlaybookBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'title' => 'test-title', 'description' => 'test-description', 'team_id' => 'test-team_id', 'create_public_playbook_run' => true, 'create_at' => 1234567890, 'delete_at' => 1234567890, 'num_stages' => 1234567890, 'num_steps' => 1234567890, 'checklists' => [], 'member_ids' => []]);

        $id = 'test-id';

        $result = $this->endpoint->getPlaybook($id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Playbook::class, $result);
    }

    #[Test]
    public function getPlaybookPropertyFieldsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $id = 'test-id';
        $updated_since = 1;

        $result = $this->endpoint->getPlaybookPropertyFields($id, $updated_since);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }
}
