<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetPluginsResponse
{
    public function __construct(
        public ?array $active = null,
        public ?array $inactive = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): GetPluginsResponse {
        $object = new self(
            active: isset($data['active']) ? $data['active'] : null,
            inactive: isset($data['inactive']) ? $data['inactive'] : null,
        );
        return $object;
    }
}
