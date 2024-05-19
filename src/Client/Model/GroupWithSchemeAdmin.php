<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * group augmented with scheme admin information
 */
class GroupWithSchemeAdmin
{
    public function __construct(
        public $group = null,
        public ?bool $scheme_admin = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            group: isset($data['group']) ? $data['group'] : null,
            scheme_admin: isset($data['scheme_admin']) ? $data['scheme_admin'] : null,
        );
        return $object;
    }
}
