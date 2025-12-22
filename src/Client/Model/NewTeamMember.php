<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class NewTeamMember
{
    public function __construct(
        /** The user's ID. */
        public ?string $id = null,
        public ?string $username = null,
        public ?string $first_name = null,
        public ?string $last_name = null,
        public ?string $nickname = null,
        /** The user's position field value. */
        public ?string $position = null,
        /** The creation timestamp of the team member record. */
        public ?int $create_at = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return NewTeamMember The hydrated instance
     */
    public static function hydrate(?array $data): NewTeamMember
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            username: $data['username'] ?? null,
            first_name: $data['first_name'] ?? null,
            last_name: $data['last_name'] ?? null,
            nickname: $data['nickname'] ?? null,
            position: $data['position'] ?? null,
            create_at: $data['create_at'] ?? null,
        );
    }
}
