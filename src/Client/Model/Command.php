<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Command
{
    public function __construct(
        /** The ID of the slash command */
        public ?string $id = null,
        /** The token which is used to verify the source of the payload */
        public ?string $token = null,
        /** The time in milliseconds the command was created */
        public ?int $create_at = null,
        /** The time in milliseconds the command was last updated */
        public ?int $update_at = null,
        /** The time in milliseconds the command was deleted, 0 if never deleted */
        public ?int $delete_at = null,
        /** The user id for the commands creator */
        public ?string $creator_id = null,
        /** The team id for which this command is configured */
        public ?string $team_id = null,
        /** The string that triggers this command */
        public ?string $trigger = null,
        /** Is the trigger done with HTTP Get ('G') or HTTP Post ('P') */
        public ?string $method = null,
        /** What is the username for the response post */
        public ?string $username = null,
        /** The url to find the icon for this users avatar */
        public ?string $icon_url = null,
        /** Use auto complete for this command */
        public ?bool $auto_complete = null,
        /** The description for this command shown when selecting the command */
        public ?string $auto_complete_desc = null,
        /** The hint for this command */
        public ?string $auto_complete_hint = null,
        /** Display name for the command */
        public ?string $display_name = null,
        /** Description for this command */
        public ?string $description = null,
        /** The URL that is triggered */
        public ?string $url = null,
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
        /** @var string $data['token'] */
            if (isset($data['token'])) $this->token = $data['token'];
        /** @var int $data['create_at'] */
            if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['update_at'] */
            if (isset($data['update_at'])) $this->update_at = $data['update_at'];
        /** @var int $data['delete_at'] */
            if (isset($data['delete_at'])) $this->delete_at = $data['delete_at'];
        /** @var string $data['creator_id'] */
            if (isset($data['creator_id'])) $this->creator_id = $data['creator_id'];
        /** @var string $data['team_id'] */
            if (isset($data['team_id'])) $this->team_id = $data['team_id'];
        /** @var string $data['trigger'] */
            if (isset($data['trigger'])) $this->trigger = $data['trigger'];
        /** @var string $data['method'] */
            if (isset($data['method'])) $this->method = $data['method'];
        /** @var string $data['username'] */
            if (isset($data['username'])) $this->username = $data['username'];
        /** @var string $data['icon_url'] */
            if (isset($data['icon_url'])) $this->icon_url = $data['icon_url'];
        /** @var bool $data['auto_complete'] */
            if (isset($data['auto_complete'])) $this->auto_complete = $data['auto_complete'];
        /** @var string $data['auto_complete_desc'] */
            if (isset($data['auto_complete_desc'])) $this->auto_complete_desc = $data['auto_complete_desc'];
        /** @var string $data['auto_complete_hint'] */
            if (isset($data['auto_complete_hint'])) $this->auto_complete_hint = $data['auto_complete_hint'];
        /** @var string $data['display_name'] */
            if (isset($data['display_name'])) $this->display_name = $data['display_name'];
        /** @var string $data['description'] */
            if (isset($data['description'])) $this->description = $data['description'];
        /** @var string $data['url'] */
            if (isset($data['url'])) $this->url = $data['url'];
        return $this;
    }
}
