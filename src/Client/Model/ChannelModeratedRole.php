<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelModeratedRole
{
    public function __construct(
        public ?bool $value = null,
        public ?bool $enabled = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ChannelModeratedRole The hydrated instance
     */
    public static function hydrate(?array $data): ChannelModeratedRole
    {
        $data ??= [];

        return new self(
            value: $data['value'] ?? null,
            enabled: $data['enabled'] ?? null,
        );
    }
}
