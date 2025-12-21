<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CanUserDirectMessageResponse
{
    public function __construct(
        /** Whether the user can send DMs to the other user */
        public ?bool $can_dm = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): CanUserDirectMessageResponse {
        $object = new self(
            can_dm: isset($data['can_dm']) ? $data['can_dm'] : null,
        );
        return $object;
    }
}
