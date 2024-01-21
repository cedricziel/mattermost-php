<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * User's sidebar category with it's channels
 */
class SidebarCategoryWithChannels
{
    public ?string $id;
    public ?string $user_id;
    public ?string $team_id;
    public ?string $display_name;
    public ?string $type;
    public ?array $channel_ids;
}
;