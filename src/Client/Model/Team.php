<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Team
{
    public function __construct(
        public ?string $id = null,
        /** The time in milliseconds a team was created */
        public ?int $create_at = null,
        /** The time in milliseconds a team was last updated */
        public ?int $update_at = null,
        /** The time in milliseconds a team was deleted */
        public ?int $delete_at = null,
        public ?string $display_name = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $email = null,
        public ?string $type = null,
        public ?string $allowed_domains = null,
        public ?string $invite_id = null,
        public ?bool $allow_open_invite = null,
        /** The data retention policy to which this team has been assigned. If no such policy exists, or the caller does not have the `sysconsole_read_compliance_data_retention` permission, this field will be null. */
        public ?string $policy_id = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            id: $data['id'] ?? null,
            create_at: $data['create_at'] ?? null,
            update_at: $data['update_at'] ?? null,
            delete_at: $data['delete_at'] ?? null,
            display_name: $data['display_name'] ?? null,
            name: $data['name'] ?? null,
            description: $data['description'] ?? null,
            email: $data['email'] ?? null,
            type: $data['type'] ?? null,
            allowed_domains: $data['allowed_domains'] ?? null,
            invite_id: $data['invite_id'] ?? null,
            allow_open_invite: $data['allow_open_invite'] ?? null,
            policy_id: $data['policy_id'] ?? null,
        );
        return $object;
    }
}
