<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client;

use GuzzleHttp\Psr7\Response;
use Http\Mock\Client as MockClient;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Base test case for client tests with HTTP mocking helpers.
 *
 * Provides mock HTTP client setup via php-http/mock-client,
 * response mocking helpers, and request assertion methods.
 */
abstract class ClientTestCase extends TestCase
{
    protected MockClient $mockClient;
    protected StreamFactoryInterface $streamFactory;
    protected string $baseUrl = 'https://mattermost.example.com';
    protected string $token = 'test-token-12345';

    protected function setUp(): void
    {
        parent::setUp();
        $this->mockClient = new MockClient();
        $this->streamFactory = new \GuzzleHttp\Psr7\HttpFactory();
    }

    /**
     * Add a mock response to the client.
     *
     * @param int $statusCode HTTP status code
     * @param array|string $body Response body (array will be JSON-encoded)
     * @param array<string, string|string[]> $headers Response headers
     */
    protected function mockResponse(
        int $statusCode,
        array|string $body = '',
        array $headers = []
    ): void {
        if (is_array($body)) {
            $body = json_encode($body);
            if (!isset($headers['Content-Type'])) {
                $headers['Content-Type'] = 'application/json';
            }
        }

        $this->mockClient->addResponse(
            new Response($statusCode, $headers, $body)
        );
    }

    /**
     * Add a mock JSON response.
     */
    protected function mockJsonResponse(int $statusCode, array $body): void
    {
        $this->mockResponse($statusCode, $body, ['Content-Type' => 'application/json']);
    }

    /**
     * Add a mock binary response.
     */
    protected function mockBinaryResponse(
        int $statusCode,
        string $content,
        string $contentType = 'application/octet-stream',
        array $headers = []
    ): void {
        $headers['Content-Type'] = $contentType;
        $this->mockResponse($statusCode, $content, $headers);
    }

    /**
     * Add a mock text response.
     */
    protected function mockTextResponse(
        int $statusCode,
        string $content,
        string $contentType = 'text/plain',
        array $headers = []
    ): void {
        $headers['Content-Type'] = $contentType;
        $this->mockResponse($statusCode, $content, $headers);
    }

    /**
     * Add a mock image response.
     */
    protected function mockImageResponse(
        int $statusCode,
        string $content,
        string $imageType = 'image/png',
        array $headers = []
    ): void {
        $this->mockBinaryResponse($statusCode, $content, $imageType, $headers);
    }

    /**
     * Get the last request that was sent.
     */
    protected function getLastRequest(): ?RequestInterface
    {
        return $this->mockClient->getLastRequest();
    }

    /**
     * Assert that the last request used the expected HTTP method.
     */
    protected function assertRequestMethod(string $expected): void
    {
        $request = $this->getLastRequest();
        $this->assertNotNull($request, 'No request was made');
        $this->assertSame($expected, $request->getMethod());
    }

    /**
     * Assert that the last request was sent to the expected path.
     *
     * @param string $expectedPath The expected path (without query string)
     */
    protected function assertRequestPath(string $expectedPath): void
    {
        $request = $this->getLastRequest();
        $this->assertNotNull($request, 'No request was made');
        $this->assertSame($expectedPath, $request->getUri()->getPath());
    }

    /**
     * Assert that the last request URI contains the expected full path with query params.
     */
    protected function assertRequestUri(string $expectedUri): void
    {
        $request = $this->getLastRequest();
        $this->assertNotNull($request, 'No request was made');
        $this->assertSame($expectedUri, (string) $request->getUri());
    }

    /**
     * Assert that the last request has the authorization header.
     */
    protected function assertRequestHasAuthHeader(): void
    {
        $request = $this->getLastRequest();
        $this->assertNotNull($request, 'No request was made');
        $this->assertTrue(
            $request->hasHeader('Authorization'),
            'Request does not have Authorization header'
        );
        $this->assertSame(
            'Bearer ' . $this->token,
            $request->getHeaderLine('Authorization')
        );
    }

    /**
     * Assert that the last request does not have an authorization header.
     */
    protected function assertRequestHasNoAuthHeader(): void
    {
        $request = $this->getLastRequest();
        $this->assertNotNull($request, 'No request was made');
        $this->assertFalse(
            $request->hasHeader('Authorization'),
            'Request unexpectedly has Authorization header'
        );
    }

    /**
     * Assert that the last request has the expected header value.
     */
    protected function assertRequestHeader(string $name, string $expected): void
    {
        $request = $this->getLastRequest();
        $this->assertNotNull($request, 'No request was made');
        $this->assertTrue(
            $request->hasHeader($name),
            sprintf('Request does not have header: %s', $name)
        );
        $this->assertSame($expected, $request->getHeaderLine($name));
    }

    /**
     * Assert that the last request has the expected Content-Type header.
     */
    protected function assertRequestContentType(string $expected): void
    {
        $this->assertRequestHeader('Content-Type', $expected);
    }

    /**
     * Assert that the last request body contains the expected JSON data.
     */
    protected function assertRequestBodyJson(array $expected): void
    {
        $request = $this->getLastRequest();
        $this->assertNotNull($request, 'No request was made');

        $body = (string) $request->getBody();
        $actual = json_decode($body, true);

        $this->assertSame($expected, $actual);
    }

    /**
     * Assert that the request body contains the expected substring.
     */
    protected function assertRequestBodyContains(string $expected): void
    {
        $request = $this->getLastRequest();
        $this->assertNotNull($request, 'No request was made');

        $body = (string) $request->getBody();
        $this->assertStringContainsString($expected, $body);
    }

    /**
     * Get the request body as a string.
     */
    protected function getRequestBody(): string
    {
        $request = $this->getLastRequest();
        $this->assertNotNull($request, 'No request was made');

        return (string) $request->getBody();
    }

    /**
     * Get the request query parameters as an array.
     */
    protected function getRequestQueryParams(): array
    {
        $request = $this->getLastRequest();
        $this->assertNotNull($request, 'No request was made');

        parse_str($request->getUri()->getQuery(), $params);

        return $params;
    }

    /**
     * Assert that the request has specific query parameters.
     */
    protected function assertRequestQueryParams(array $expected): void
    {
        $actual = $this->getRequestQueryParams();
        foreach ($expected as $key => $value) {
            $this->assertArrayHasKey($key, $actual);
            $this->assertSame($value, $actual[$key]);
        }
    }

    /**
     * Create a PSR-7 stream from a string.
     */
    protected function createStream(string $content): StreamInterface
    {
        return $this->streamFactory->createStream($content);
    }
}
