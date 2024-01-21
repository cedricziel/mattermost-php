<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Command
{
    /** The ID of the slash command */
    public ?string $id;

    /** The token which is used to verify the source of the payload */
    public ?string $token;

    /** The time in milliseconds the command was created */
    public ?int $create_at;

    /** The time in milliseconds the command was last updated */
    public ?int $update_at;

    /** The time in milliseconds the command was deleted, 0 if never deleted */
    public ?int $delete_at;

    /** The user id for the commands creator */
    public ?string $creator_id;

    /** The team id for which this command is configured */
    public ?string $team_id;

    /** The string that triggers this command */
    public ?string $trigger;

    /** Is the trigger done with HTTP Get ('G') or HTTP Post ('P') */
    public ?string $method;

    /** What is the username for the response post */
    public ?string $username;

    /** The url to find the icon for this users avatar */
    public ?string $icon_url;

    /** Use auto complete for this command */
    public ?bool $auto_complete;

    /** The description for this command shown when selecting the command */
    public ?string $auto_complete_desc;

    /** The hint for this command */
    public ?string $auto_complete_hint;

    /** Display name for the command */
    public ?string $display_name;

    /** Description for this command */
    public ?string $description;

    /** The URL that is triggered */
    public ?string $url;
}