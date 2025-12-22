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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return AppError The hydrated instance
     */
    public static function hydrate(?array $data): AppError
    {
        $data ??= [];

        return new self(
            status_code: $data['status_code'] ?? null,
            id: $data['id'] ?? null,
            message: $data['message'] ?? null,
            request_id: $data['request_id'] ?? null,
        );
    }
}
