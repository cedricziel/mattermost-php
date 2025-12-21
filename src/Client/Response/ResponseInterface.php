<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Client\Response;

interface ResponseInterface
{
    public function getStatusCode(): int;

    public function getContentType(): string;

    /**
     * @return array<string, string[]>
     */
    public function getHeaders(): array;

    public function getHeader(string $name): ?string;
}
