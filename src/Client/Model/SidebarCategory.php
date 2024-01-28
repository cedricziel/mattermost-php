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
        array $data,
    ): static
    {
        $this->id = $data['id'];
        $this->user_id = $data['user_id'];
        $this->team_id = $data['team_id'];
        $this->display_name = $data['display_name'];
        $this->type = $data['type'];
        return $this;
    }
}
