<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AccessControlPolicyActiveUpdate
{
    public function __construct(
        /** The ID of the policy. */
        public ?string $id = null,
        /** The active status of the policy. */
        public ?bool $active = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): AccessControlPolicyActiveUpdate {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            active: isset($data['active']) ? $data['active'] : null,
        );
        return $object;
    }
}
