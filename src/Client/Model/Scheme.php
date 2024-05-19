<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Scheme
{
    public function __construct(
        /** The unique identifier of the scheme. */
        public ?string $id = null,
        /** The human readable name for the scheme. */
        public ?string $name = null,
        /** A human readable description of the scheme. */
        public ?string $description = null,
        /** The time at which the scheme was created. */
        public ?int $create_at = null,
        /** The time at which the scheme was last updated. */
        public ?int $update_at = null,
        /** The time at which the scheme was deleted. */
        public ?int $delete_at = null,
        /** The scope to which this scheme can be applied, either "team" or "channel". */
        public ?string $scope = null,
        /** The id of the default team admin role for this scheme. */
        public ?string $default_team_admin_role = null,
        /** The id of the default team user role for this scheme. */
        public ?string $default_team_user_role = null,
        /** The id of the default channel admin role for this scheme. */
        public ?string $default_channel_admin_role = null,
        /** The id of the default channel user role for this scheme. */
        public ?string $default_channel_user_role = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): Scheme {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            name: isset($data['name']) ? $data['name'] : null,
            description: isset($data['description']) ? $data['description'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
            scope: isset($data['scope']) ? $data['scope'] : null,
            default_team_admin_role: isset($data['default_team_admin_role']) ? $data['default_team_admin_role'] : null,
            default_team_user_role: isset($data['default_team_user_role']) ? $data['default_team_user_role'] : null,
            default_channel_admin_role: isset($data['default_channel_admin_role']) ? $data['default_channel_admin_role'] : null,
            default_channel_user_role: isset($data['default_channel_user_role']) ? $data['default_channel_user_role'] : null,
        );
        return $object;
    }
}
