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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): NewTeamMember {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            username: isset($data['username']) ? $data['username'] : null,
            first_name: isset($data['first_name']) ? $data['first_name'] : null,
            last_name: isset($data['last_name']) ? $data['last_name'] : null,
            nickname: isset($data['nickname']) ? $data['nickname'] : null,
            position: isset($data['position']) ? $data['position'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
        );
        return $object;
    }
}
