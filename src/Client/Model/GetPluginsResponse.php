<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetPluginsResponse
{
    public function __construct(
        public ?array $active = null,
        public ?array $inactive = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return GetPluginsResponse The hydrated instance
     */
    public static function hydrate(?array $data): GetPluginsResponse
    {
        $data ??= [];

        return new self(
            active: $data['active'] ?? null,
            inactive: $data['inactive'] ?? null,
        );
    }
}
