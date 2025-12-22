<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetTeamInviteInfoResponse
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $display_name = null,
        public ?string $description = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return GetTeamInviteInfoResponse The hydrated instance
     */
    public static function hydrate(?array $data): GetTeamInviteInfoResponse
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            display_name: $data['display_name'] ?? null,
            description: $data['description'] ?? null,
        );
    }
}
