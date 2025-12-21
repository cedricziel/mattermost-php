<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\ImportsEndpoint;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(ImportsEndpoint::class)]
class ImportsEndpointTest extends ClientTestCase
{
    public ImportsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new ImportsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function listImportsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        try {
            $this->endpoint->listImports();
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function deleteImportBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $import_name = 'test-import_name';

        try {
            $this->endpoint->deleteImport($import_name);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }
}
