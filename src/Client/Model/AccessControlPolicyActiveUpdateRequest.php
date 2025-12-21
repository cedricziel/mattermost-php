<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AccessControlPolicyActiveUpdateRequest
{
    public function __construct(
        public ?array $entries = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): AccessControlPolicyActiveUpdateRequest {
        $object = new self(
            entries: isset($data['entries']) ? $data['entries'] : null,
        );
        return $object;
    }
}
