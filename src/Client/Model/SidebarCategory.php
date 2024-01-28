<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * User's sidebar category
 */
class SidebarCategory
{
    public ?string $id;
    public ?string $user_id;
    public ?string $team_id;
    public ?string $display_name;
    public ?string $type;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
        if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['user_id'] */
        if (isset($data['user_id'])) $this->user_id = $data['user_id'];
        /** @var string $data['team_id'] */
        if (isset($data['team_id'])) $this->team_id = $data['team_id'];
        /** @var string $data['display_name'] */
        if (isset($data['display_name'])) $this->display_name = $data['display_name'];
        /** @var string $data['type'] */
        if (isset($data['type'])) $this->type = $data['type'];
        return $this;
    }
}
