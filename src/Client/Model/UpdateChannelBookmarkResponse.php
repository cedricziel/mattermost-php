<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateChannelBookmarkResponse
{
    public function __construct(
        public $updated = null,
        public $deleted = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return UpdateChannelBookmarkResponse The hydrated instance
     */
    public static function hydrate(?array $data): UpdateChannelBookmarkResponse
    {
        $data ??= [];

        return new self(
            updated: $data['updated'] ?? null,
            deleted: $data['deleted'] ?? null,
        );
    }
}
