<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetCPAGroupResponse
{
    public function __construct(
        /** The ID of the custom profile attributes group */
        public ?string $id = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): GetCPAGroupResponse {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
        );
        return $object;
    }
}
