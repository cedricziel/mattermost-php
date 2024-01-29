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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
            if (isset($data['id'])) $this->id = $data['id'];
        /** @var int $data['create_at'] */
            if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['update_at'] */
            if (isset($data['update_at'])) $this->update_at = $data['update_at'];
        /** @var int $data['delete_at'] */
            if (isset($data['delete_at'])) $this->delete_at = $data['delete_at'];
        /** @var string $data['display_name'] */
            if (isset($data['display_name'])) $this->display_name = $data['display_name'];
        /** @var string $data['name'] */
            if (isset($data['name'])) $this->name = $data['name'];
        /** @var string $data['description'] */
            if (isset($data['description'])) $this->description = $data['description'];
        /** @var string $data['email'] */
            if (isset($data['email'])) $this->email = $data['email'];
        /** @var string $data['type'] */
            if (isset($data['type'])) $this->type = $data['type'];
        /** @var string $data['allowed_domains'] */
            if (isset($data['allowed_domains'])) $this->allowed_domains = $data['allowed_domains'];
        /** @var string $data['invite_id'] */
            if (isset($data['invite_id'])) $this->invite_id = $data['invite_id'];
        /** @var bool $data['allow_open_invite'] */
            if (isset($data['allow_open_invite'])) $this->allow_open_invite = $data['allow_open_invite'];
        /** @var string $data['policy_id'] */
            if (isset($data['policy_id'])) $this->policy_id = $data['policy_id'];
        return $this;
    }
}
