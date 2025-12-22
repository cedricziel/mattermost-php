<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CanUserDirectMessageResponse
{
    public function __construct(
        /** Whether the user can send DMs to the other user */
        public ?bool $can_dm = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return CanUserDirectMessageResponse The hydrated instance
     */
    public static function hydrate(?array $data): CanUserDirectMessageResponse
    {
        $data ??= [];

        return new self(
            can_dm: $data['can_dm'] ?? null,
        );
    }
}
