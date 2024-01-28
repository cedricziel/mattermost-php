<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Team
{
    public ?string $id;

    /** The time in milliseconds a team was created */
    public ?int $create_at;

    /** The time in milliseconds a team was last updated */
    public ?int $update_at;

    /** The time in milliseconds a team was deleted */
    public ?int $delete_at;
    public ?string $display_name;
    public ?string $name;
    public ?string $description;
    public ?string $email;
    public ?string $type;
    public ?string $allowed_domains;
    public ?string $invite_id;
    public ?bool $allow_open_invite;

    /** The data retention policy to which this team has been assigned. If no such policy exists, or the caller does not have the `sysconsole_read_compliance_data_retention` permission, this field will be null. */
    public ?string $policy_id;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->id = $data['id'];
        $this->create_at = $data['create_at'];
        $this->update_at = $data['update_at'];
        $this->delete_at = $data['delete_at'];
        $this->display_name = $data['display_name'];
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->email = $data['email'];
        $this->type = $data['type'];
        $this->allowed_domains = $data['allowed_domains'];
        $this->invite_id = $data['invite_id'];
        $this->allow_open_invite = $data['allow_open_invite'];
        $this->policy_id = $data['policy_id'];
        return $this;
    }
}
