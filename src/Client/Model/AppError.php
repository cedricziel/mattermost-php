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
        $object = new self(
            status_code: isset($data['status_code']) ? $data['status_code'] : null,
            id: isset($data['id']) ? $data['id'] : null,
            message: isset($data['message']) ? $data['message'] : null,
            request_id: isset($data['request_id']) ? $data['request_id'] : null,
        );
        return $object;
    }
}
