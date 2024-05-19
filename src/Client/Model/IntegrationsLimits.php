<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class IntegrationsLimits
{
    public function __construct(
        public ?int $enabled = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            enabled: isset($data['enabled']) ? $data['enabled'] : null,
        );
        return $object;
    }
}
