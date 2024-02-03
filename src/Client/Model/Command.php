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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            id: isset($data['id']) ? $data['id'] : null,
            token: isset($data['token']) ? $data['token'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
            creator_id: isset($data['creator_id']) ? $data['creator_id'] : null,
            team_id: isset($data['team_id']) ? $data['team_id'] : null,
            trigger: isset($data['trigger']) ? $data['trigger'] : null,
            method: isset($data['method']) ? $data['method'] : null,
            username: isset($data['username']) ? $data['username'] : null,
            icon_url: isset($data['icon_url']) ? $data['icon_url'] : null,
            auto_complete: isset($data['auto_complete']) ? $data['auto_complete'] : null,
            auto_complete_desc: isset($data['auto_complete_desc']) ? $data['auto_complete_desc'] : null,
            auto_complete_hint: isset($data['auto_complete_hint']) ? $data['auto_complete_hint'] : null,
            display_name: isset($data['display_name']) ? $data['display_name'] : null,
            description: isset($data['description']) ? $data['description'] : null,
            url: isset($data['url']) ? $data['url'] : null,
        );
        return $object;
    }
}
