<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AppError
{
    public function __construct(
        public ?int $status_code = null,
        public ?string $id = null,
        public ?string $message = null,
        public ?string $request_id = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            status_code: $data['status_code'] ?? null,
            id: $data['id'] ?? null,
            message: $data['message'] ?? null,
            request_id: $data['request_id'] ?? null,
        );
        return $object;
    }
}
