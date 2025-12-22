<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client;

use CedricZiel\MattermostPhp\Client\HttpClientTrait;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse;
use CedricZiel\MattermostPhp\Client\Response\BinaryResponse;
use CedricZiel\MattermostPhp\Client\Response\TextResponse;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

#[CoversClass(HttpClientTrait::class)]
#[UsesClass(BinaryResponse::class)]
#[UsesClass(TextResponse::class)]
#[UsesClass(StatusOK::class)]
#[UsesClass(DefaultBadRequestResponse::class)]
class HttpClientTraitTest extends TestCase
{
    private HttpClientTraitTestDouble $sut;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new HttpClientTraitTestDouble('https://mattermost.example.com');
    }

    // ========================================
    // buildUri() tests
    // ========================================

    #[Test]
    public function buildUriCreatesBasicUri(): void
    {
        $uri = $this->sut->buildUri('/api/v4/users', [], []);

        $this->assertSame('https://mattermost.example.com/api/v4/users?', $uri);
    }

    #[Test]
    public function buildUriReplacesPathParameters(): void
    {
        $uri = $this->sut->buildUri('/api/v4/users/{user_id}', ['user_id' => 'abc123'], []);

        $this->assertSame('https://mattermost.example.com/api/v4/users/abc123?', $uri);
    }

    #[Test]
    public function buildUriReplacesMultiplePathParameters(): void
    {
        $uri = $this->sut->buildUri(
            '/api/v4/teams/{team_id}/channels/{channel_id}',
            ['team_id' => 'team1', 'channel_id' => 'chan1'],
            []
        );

        $this->assertSame('https://mattermost.example.com/api/v4/teams/team1/channels/chan1?', $uri);
    }

    #[Test]
    public function buildUriAddsQueryParameters(): void
    {
        $uri = $this->sut->buildUri('/api/v4/users', [], ['page' => '0', 'per_page' => '60']);

        $this->assertSame('https://mattermost.example.com/api/v4/users?page=0&per_page=60', $uri);
    }

    #[Test]
    public function buildUriCombinesPathAndQueryParameters(): void
    {
        $uri = $this->sut->buildUri(
            '/api/v4/users/{user_id}/posts',
            ['user_id' => 'user123'],
            ['page' => '1']
        );

        $this->assertSame('https://mattermost.example.com/api/v4/users/user123/posts?page=1', $uri);
    }

    #[Test]
    public function buildUriEncodesSpecialCharactersInQueryParams(): void
    {
        $uri = $this->sut->buildUri('/api/v4/search', [], ['q' => 'hello world']);

        $this->assertSame('https://mattermost.example.com/api/v4/search?q=hello+world', $uri);
    }

    // ========================================
    // parseContentType() tests
    // ========================================

    #[Test]
    public function parseContentTypeExtractsMediaType(): void
    {
        $result = $this->sut->exposeParseContentType('application/json');
        $this->assertSame('application/json', $result);
    }

    #[Test]
    public function parseContentTypeStripsCharset(): void
    {
        $result = $this->sut->exposeParseContentType('application/json; charset=utf-8');
        $this->assertSame('application/json', $result);
    }

    #[Test]
    public function parseContentTypeStripsMultipleParameters(): void
    {
        $result = $this->sut->exposeParseContentType('text/plain; charset=utf-8; boundary=something');
        $this->assertSame('text/plain', $result);
    }

    #[Test]
    public function parseContentTypeReturnsDefaultForEmptyHeader(): void
    {
        $result = $this->sut->exposeParseContentType('');
        $this->assertSame('application/octet-stream', $result);
    }

    #[Test]
    public function parseContentTypeTrimsWhitespace(): void
    {
        $result = $this->sut->exposeParseContentType('  application/json  ; charset=utf-8');
        $this->assertSame('application/json', $result);
    }

    // ========================================
    // isBinaryContentType() tests
    // ========================================

    #[Test]
    #[DataProvider('binaryContentTypeProvider')]
    public function isBinaryContentTypeDetectsBinaryTypes(string $contentType, bool $expected): void
    {
        $result = $this->sut->exposeIsBinaryContentType($contentType);
        $this->assertSame($expected, $result);
    }

    public static function binaryContentTypeProvider(): array
    {
        return [
            'octet-stream' => ['application/octet-stream', true],
            'zip' => ['application/zip', true],
            'pdf' => ['application/pdf', true],
            'gzip' => ['application/gzip', true],
            'png image' => ['image/png', true],
            'jpeg image' => ['image/jpeg', true],
            'gif image' => ['image/gif', true],
            'webp image' => ['image/webp', true],
            'audio mpeg' => ['audio/mpeg', true],
            'video mp4' => ['video/mp4', true],
            'vendor type' => ['application/vnd.ms-excel', true],
            'json is not binary' => ['application/json', false],
            'text plain is not binary' => ['text/plain', false],
            'text html is not binary' => ['text/html', false],
        ];
    }

    #[Test]
    public function isBinaryContentTypeAcceptsAdditionalTypes(): void
    {
        $result = $this->sut->exposeIsBinaryContentType('application/custom-binary', ['application/custom-binary']);
        $this->assertTrue($result);
    }

    #[Test]
    public function isBinaryContentTypeSupportsWildcardMatching(): void
    {
        $result = $this->sut->exposeIsBinaryContentType('font/woff2', ['font/*']);
        $this->assertTrue($result);
    }

    // ========================================
    // isTextContentType() tests
    // ========================================

    #[Test]
    #[DataProvider('textContentTypeProvider')]
    public function isTextContentTypeDetectsTextTypes(string $contentType, bool $expected): void
    {
        $result = $this->sut->exposeIsTextContentType($contentType);
        $this->assertSame($expected, $result);
    }

    public static function textContentTypeProvider(): array
    {
        return [
            'text/plain' => ['text/plain', true],
            'text/html' => ['text/html', true],
            'text/csv' => ['text/csv', true],
            'application/json' => ['application/json', false],
            'image/png' => ['image/png', false],
        ];
    }

    // ========================================
    // mapResponse() tests
    // ========================================

    #[Test]
    public function mapResponseHydratesModel(): void
    {
        $response = new Response(200, ['Content-Type' => 'application/json'], '{"status": "ok"}');
        $map = [200 => StatusOK::class];

        $result = $this->sut->exposeMapResponse($response, $map);

        $this->assertInstanceOf(StatusOK::class, $result);
        $this->assertSame('ok', $result->status);
    }

    #[Test]
    public function mapResponseThrowsForUnexpectedStatusCode(): void
    {
        $response = new Response(500, ['Content-Type' => 'application/json'], '{}');
        $map = [200 => StatusOK::class];

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Expected one of 200, got 500');

        $this->sut->exposeMapResponse($response, $map);
    }

    #[Test]
    public function mapResponseHandlesArrayResponse(): void
    {
        $response = new Response(
            200,
            ['Content-Type' => 'application/json'],
            '[{"status": "ok"}, {"status": "also ok"}]'
        );
        $map = [200 => StatusOK::class . '[]'];

        $result = $this->sut->exposeMapResponse($response, $map);

        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertInstanceOf(StatusOK::class, $result[0]);
        $this->assertSame('ok', $result[0]->status);
        $this->assertInstanceOf(StatusOK::class, $result[1]);
        $this->assertSame('also ok', $result[1]->status);
    }

    // ========================================
    // mapResponseWithMediaTypes() tests
    // ========================================

    #[Test]
    public function mapResponseWithMediaTypesReturnsJsonForApplicationJson(): void
    {
        $response = new Response(200, ['Content-Type' => 'application/json'], '{"status": "ok"}');
        $map = [200 => StatusOK::class];

        $result = $this->sut->exposeMapResponseWithMediaTypes($response, $map);

        $this->assertInstanceOf(StatusOK::class, $result);
        $this->assertSame('ok', $result->status);
    }

    #[Test]
    public function mapResponseWithMediaTypesReturnsBinaryForImageTypes(): void
    {
        $imageData = 'fake-png-data';
        $response = new Response(200, ['Content-Type' => 'image/png'], $imageData);
        $map = [200 => StatusOK::class];

        $result = $this->sut->exposeMapResponseWithMediaTypes($response, $map, ['image/*']);

        $this->assertInstanceOf(BinaryResponse::class, $result);
        $this->assertSame(200, $result->getStatusCode());
        $this->assertSame('image/png', $result->getContentType());
    }

    #[Test]
    public function mapResponseWithMediaTypesReturnsTextForTextPlain(): void
    {
        $textContent = "Line 1\nLine 2\nLine 3";
        $response = new Response(200, ['Content-Type' => 'text/plain'], $textContent);
        $map = [200 => StatusOK::class];

        $result = $this->sut->exposeMapResponseWithMediaTypes($response, $map);

        $this->assertInstanceOf(TextResponse::class, $result);
        $this->assertSame(200, $result->getStatusCode());
        $this->assertSame('text/plain', $result->getContentType());
        $this->assertSame($textContent, $result->getBody());
    }

    #[Test]
    public function mapResponseWithMediaTypesHandlesErrorResponsesAsJson(): void
    {
        $response = new Response(
            400,
            ['Content-Type' => 'application/json'],
            '{"id": "error.id", "message": "Bad request", "status_code": 400}'
        );
        $map = [
            200 => StatusOK::class,
            400 => DefaultBadRequestResponse::class,
        ];

        $result = $this->sut->exposeMapResponseWithMediaTypes($response, $map);

        $this->assertInstanceOf(DefaultBadRequestResponse::class, $result);
    }

    #[Test]
    public function mapResponseWithMediaTypesReturnsBinaryForOctetStream(): void
    {
        $binaryData = "\x00\x01\x02\x03";
        $response = new Response(200, ['Content-Type' => 'application/octet-stream'], $binaryData);
        $map = [200 => StatusOK::class];

        $result = $this->sut->exposeMapResponseWithMediaTypes($response, $map);

        $this->assertInstanceOf(BinaryResponse::class, $result);
    }

    #[Test]
    public function mapResponseWithMediaTypesHandlesCharsetInContentType(): void
    {
        $textContent = "Some text";
        $response = new Response(200, ['Content-Type' => 'text/plain; charset=utf-8'], $textContent);
        $map = [];

        $result = $this->sut->exposeMapResponseWithMediaTypes($response, $map);

        $this->assertInstanceOf(TextResponse::class, $result);
    }
}

/**
 * Test double that exposes protected methods for testing.
 */
class HttpClientTraitTestDouble
{
    use HttpClientTrait;

    public function __construct(protected string $baseUrl)
    {
    }

    public function exposeParseContentType(string $header): string
    {
        return $this->parseContentType($header);
    }

    public function exposeIsBinaryContentType(string $contentType, array $additionalTypes = []): bool
    {
        return $this->isBinaryContentType($contentType, $additionalTypes);
    }

    public function exposeIsTextContentType(string $contentType): bool
    {
        return $this->isTextContentType($contentType);
    }

    public function exposeMapResponse(\Psr\Http\Message\ResponseInterface $response, array $map): object|array
    {
        return $this->mapResponse($response, $map);
    }

    public function exposeMapResponseWithMediaTypes(
        \Psr\Http\Message\ResponseInterface $response,
        array $map,
        array $binaryMediaTypes = []
    ): mixed {
        return $this->mapResponseWithMediaTypes($response, $map, $binaryMediaTypes);
    }
}
