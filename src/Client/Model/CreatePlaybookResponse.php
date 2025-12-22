<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreatePlaybookResponse
{
    public function __construct(
        public ?string $id = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return CreatePlaybookResponse The hydrated instance
     */
    public static function hydrate(?array $data): CreatePlaybookResponse
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
        );
    }
}
