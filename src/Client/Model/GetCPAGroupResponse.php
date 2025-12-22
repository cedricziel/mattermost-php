<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetCPAGroupResponse
{
    public function __construct(
        /** The ID of the custom profile attributes group */
        public ?string $id = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return GetCPAGroupResponse The hydrated instance
     */
    public static function hydrate(?array $data): GetCPAGroupResponse
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
        );
    }
}
