<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client;

use CedricZiel\MattermostPhp\Client\FormEncodedTrait;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamFactoryInterface;

#[CoversClass(FormEncodedTrait::class)]
class FormEncodedTraitTest extends TestCase
{
    private FormEncodedTraitTestDouble $sut;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new FormEncodedTraitTestDouble();
    }

    #[Test]
    public function createFormEncodedBodyEncodesBasicFields(): void
    {
        $fields = [
            'username' => 'john',
            'password' => 'secret123',
        ];

        $result = $this->sut->exposeCreateFormEncodedBody($fields);

        $this->assertArrayHasKey('body', $result);
        $this->assertArrayHasKey('contentType', $result);
        $this->assertSame('application/x-www-form-urlencoded', $result['contentType']);

        $body = (string) $result['body'];
        $this->assertSame('username=john&password=secret123', $body);
    }

    #[Test]
    public function createFormEncodedBodyFiltersNullValues(): void
    {
        $fields = [
            'username' => 'john',
            'email' => null,
            'password' => 'secret',
        ];

        $result = $this->sut->exposeCreateFormEncodedBody($fields);
        $body = (string) $result['body'];

        $this->assertStringContainsString('username=john', $body);
        $this->assertStringContainsString('password=secret', $body);
        $this->assertStringNotContainsString('email', $body);
    }

    #[Test]
    public function createFormEncodedBodyEncodesSpecialCharacters(): void
    {
        $fields = [
            'message' => 'Hello World!',
            'symbol' => '@#$%',
        ];

        $result = $this->sut->exposeCreateFormEncodedBody($fields);
        $body = (string) $result['body'];

        // RFC 3986 encoding - spaces become %20, not +
        $this->assertStringContainsString('message=Hello%20World%21', $body);
        $this->assertStringContainsString('symbol=%40%23%24%25', $body);
    }

    #[Test]
    public function createFormEncodedBodyHandlesEmptyArray(): void
    {
        $result = $this->sut->exposeCreateFormEncodedBody([]);
        $body = (string) $result['body'];

        $this->assertSame('', $body);
        $this->assertSame('application/x-www-form-urlencoded', $result['contentType']);
    }

    #[Test]
    public function createFormEncodedBodyPreservesZeroAndFalseValues(): void
    {
        $fields = [
            'count' => '0',
            'enabled' => 'false',
            'empty' => '',
        ];

        $result = $this->sut->exposeCreateFormEncodedBody($fields);
        $body = (string) $result['body'];

        $this->assertStringContainsString('count=0', $body);
        $this->assertStringContainsString('enabled=false', $body);
        $this->assertStringContainsString('empty=', $body);
    }

    #[Test]
    public function createFormEncodedBodyReturnsStreamInterface(): void
    {
        $result = $this->sut->exposeCreateFormEncodedBody(['key' => 'value']);

        $this->assertInstanceOf(\Psr\Http\Message\StreamInterface::class, $result['body']);
    }
}

/**
 * Test double that exposes protected methods and provides required dependencies.
 */
class FormEncodedTraitTestDouble
{
    use FormEncodedTrait;

    protected StreamFactoryInterface $streamFactory;

    public function __construct()
    {
        $this->streamFactory = new \GuzzleHttp\Psr7\HttpFactory();
    }

    public function exposeCreateFormEncodedBody(array $fields): array
    {
        return $this->createFormEncodedBody($fields);
    }
}
