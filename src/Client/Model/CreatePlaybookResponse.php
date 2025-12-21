<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreatePlaybookResponse
{
    public function __construct(
        public ?string $id = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): CreatePlaybookResponse {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
        );
        return $object;
    }
}
