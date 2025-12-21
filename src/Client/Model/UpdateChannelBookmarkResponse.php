<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateChannelBookmarkResponse
{
    public function __construct(
        public $updated = null,
        public $deleted = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): UpdateChannelBookmarkResponse {
        $object = new self(
            updated: isset($data['updated']) ? $data['updated'] : null,
            deleted: isset($data['deleted']) ? $data['deleted'] : null,
        );
        return $object;
    }
}
