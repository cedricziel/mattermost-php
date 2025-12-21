<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AccessControlPolicyCursor
{
    public function __construct(
        /** The ID of the policy to start searching after. */
        public ?string $id = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): AccessControlPolicyCursor {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
        );
        return $object;
    }
}
