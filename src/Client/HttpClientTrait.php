<?php

namespace CedricZiel\MattermostPhp\Client;

use CedricZiel\MattermostPhp\Client\Response\BinaryResponse;
use CedricZiel\MattermostPhp\Client\Response\TextResponse;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;

trait HttpClientTrait
{
    /**
     * Common binary content types that should return BinaryResponse.
     *
     * @var string[]
     */
    private const BINARY_CONTENT_TYPES = [
        'application/octet-stream',
        'application/zip',
        'application/pdf',
        'application/gzip',
    ];

    /**
     * Content type prefixes that indicate binary content.
     *
     * @var string[]
     */
    private const BINARY_CONTENT_TYPE_PREFIXES = [
        'image/',
        'audio/',
        'video/',
        'application/vnd.',
    ];
    protected ClientInterface $httpClient;

    protected RequestFactoryInterface $requestFactory;

    protected StreamFactoryInterface $streamFactory;

    public function setHttpClient(ClientInterface $httpClient): static
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    public function setRequestFactory(RequestFactoryInterface $requestFactory): static
    {
        $this->requestFactory = $requestFactory;

        return $this;
    }

    public function setStreamFactory(StreamFactoryInterface $streamFactory): static
    {
        $this->streamFactory = $streamFactory;

        return $this;
    }

    /**
     * @param array<int, string> $map
     */
    protected function mapResponse(ResponseInterface $response, array $map): mixed
    {
        $responseCode = $response->getStatusCode();

        if (!array_key_exists($responseCode, $map)) {
            throw new \RuntimeException(sprintf(
                'Expected one of %s, got %d',
                implode(', ', array_keys($map)),
                $response->getStatusCode()
            ));
        }

        $mapValue = $map[$responseCode];
        $body = json_decode($response->getBody()->getContents(), true);

        // Handle primitive types in the map
        if ($mapValue === 'string') {
            return $body;
        }
        if ($mapValue === 'int' || $mapValue === 'integer') {
            return (int) $body;
        }
        if ($mapValue === 'float' || $mapValue === 'number') {
            return (float) $body;
        }
        if ($mapValue === 'bool' || $mapValue === 'boolean') {
            return (bool) $body;
        }
        if ($mapValue === 'string[]' || $mapValue === 'array') {
            return $body; // Already an array from json_decode
        }
        if ($mapValue === 'int[]') {
            return array_map(intval(...), $body);
        }
        if ($mapValue === 'float[]') {
            return array_map(floatval(...), $body);
        }
        if ($mapValue === 'bool[]') {
            return array_map(boolval(...), $body);
        }

        // Handle array of models
        if (str_contains($mapValue, '[]')) {
            $objects = [];
            $modelClass = str_replace('[]', '', $mapValue);
            foreach ($body as $item) {
                $objects[] = $modelClass::hydrate($item);
            }
            return $objects;
        }

        // Handle model class
        return $mapValue::hydrate($body);
    }

    public function buildUri(string $path, array $pathParameters = [], array $queryParameters = []): string
    {
        $uri = $this->baseUrl . $path;

        $uri = str_replace(array_map(fn(int|string $key): string => sprintf('{%s}', $key), array_keys($pathParameters)), array_values($pathParameters), $uri);

        return sprintf('%s?%s', $uri, http_build_query($queryParameters));
    }

    /**
     * Map response with full media type support.
     *
     * This method inspects the Content-Type header and returns the appropriate
     * response type: BinaryResponse for binary content, TextResponse for plain text,
     * or hydrated model objects for JSON.
     *
     * @param ResponseInterface $response The HTTP response
     * @param array<int, string> $map Status code to class mapping for JSON responses
     * @param string[] $binaryMediaTypes Additional media types to treat as binary
     * @return BinaryResponse|TextResponse|object|array<mixed>
     */
    protected function mapResponseWithMediaTypes(
        ResponseInterface $response,
        array $map,
        array $binaryMediaTypes = []
    ): mixed {
        $statusCode = $response->getStatusCode();
        $contentType = $this->parseContentType($response->getHeaderLine('Content-Type'));

        // For error responses (4xx/5xx), always try to parse as JSON for error models
        if ($statusCode >= 400 && array_key_exists($statusCode, $map)) {
            return $this->mapJsonResponse($response, $map);
        }

        // Check if this should be a binary response
        if ($this->isBinaryContentType($contentType, $binaryMediaTypes)) {
            return new BinaryResponse(
                $statusCode,
                $contentType,
                $response->getBody(),
                $response->getHeaders()
            );
        }

        // Check if this is a plain text response
        if ($this->isTextContentType($contentType)) {
            return new TextResponse(
                $statusCode,
                $contentType,
                $response->getBody()->getContents(),
                $response->getHeaders()
            );
        }

        // Default: treat as JSON
        return $this->mapJsonResponse($response, $map);
    }

    /**
     * Map JSON response to model objects (extracted from original mapResponse).
     *
     * @param array<int, string> $map
     */
    protected function mapJsonResponse(ResponseInterface $response, array $map): object|array
    {
        $responseCode = $response->getStatusCode();

        if (!array_key_exists($responseCode, $map)) {
            throw new \RuntimeException(sprintf(
                'Expected one of %s, got %d',
                implode(', ', array_keys($map)),
                $response->getStatusCode()
            ));
        }

        $body = json_decode($response->getBody(), true);
        if (str_contains($map[$responseCode], '[]')) {
            $objects = [];
            foreach ($body as $item) {
                $map[$responseCode] = str_replace('[]', '', $map[$responseCode]);
                $objects[] = $map[$responseCode]::hydrate($item);
            }

            return $objects;
        }

        return $map[$responseCode]::hydrate($body);
    }

    /**
     * Map a response that may be void (empty body) on success.
     *
     * This method handles endpoints that return 200/204 with no response body.
     * Use null in the map to indicate a void response for that status code.
     *
     * @param ResponseInterface $response The HTTP response
     * @param array<int, class-string|null> $map Status code to class mapping (null = void)
     * @return object|array|null Returns null for void responses
     */
    protected function mapResponseAllowingVoid(ResponseInterface $response, array $map): object|array|null
    {
        $responseCode = $response->getStatusCode();

        if (!array_key_exists($responseCode, $map)) {
            throw new \RuntimeException(sprintf(
                'Expected one of %s, got %d',
                implode(', ', array_keys($map)),
                $responseCode
            ));
        }

        $class = $map[$responseCode];

        // Void response - return null
        if ($class === null) {
            return null;
        }

        // Otherwise hydrate normally
        $body = json_decode($response->getBody(), true);
        if (str_contains($class, '[]')) {
            $objects = [];
            $itemClass = str_replace('[]', '', $class);
            foreach ($body as $item) {
                $objects[] = $itemClass::hydrate($item);
            }

            return $objects;
        }

        return $class::hydrate($body);
    }

    /**
     * Parse the Content-Type header to extract the media type.
     *
     * @param string $header The full Content-Type header value
     * @return string The media type (e.g., 'application/json')
     */
    protected function parseContentType(string $header): string
    {
        if ($header === '') {
            return 'application/octet-stream';
        }

        // Remove charset and other parameters
        $parts = explode(';', $header);

        return trim($parts[0]);
    }

    /**
     * Check if the content type indicates binary content.
     *
     * @param string $contentType The parsed content type
     * @param string[] $additionalTypes Additional types to treat as binary
     */
    protected function isBinaryContentType(string $contentType, array $additionalTypes = []): bool
    {
        // Check explicit binary types
        if (in_array($contentType, self::BINARY_CONTENT_TYPES, true)) {
            return true;
        }

        // Check additional types specified by the endpoint
        if (in_array($contentType, $additionalTypes, true)) {
            return true;
        }

        // Check wildcard matches in additional types (e.g., 'image/*')
        foreach ($additionalTypes as $type) {
            if (str_ends_with($type, '/*')) {
                $prefix = substr($type, 0, -1);
                if (str_starts_with($contentType, $prefix)) {
                    return true;
                }
            }
        }

        // Check binary prefixes
        foreach (self::BINARY_CONTENT_TYPE_PREFIXES as $prefix) {
            if (str_starts_with($contentType, $prefix)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if the content type indicates plain text content.
     *
     * @param string $contentType The parsed content type
     */
    protected function isTextContentType(string $contentType): bool
    {
        return in_array($contentType, ['text/plain', 'text/html', 'text/csv'], true);
    }
}
