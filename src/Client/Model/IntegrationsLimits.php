<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class IntegrationsLimits
{
    public function __construct(
        public ?int $enabled = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return IntegrationsLimits The hydrated instance
     */
    public static function hydrate(?array $data): IntegrationsLimits
    {
        $data ??= [];

        return new self(
            enabled: $data['enabled'] ?? null,
        );
    }
}
