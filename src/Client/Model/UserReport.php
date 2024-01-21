<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserReport
{
    public ?string $id;

    /** The time in milliseconds a user was created */
    public ?int $create_at;
    public ?string $username;
    public ?string $email;

    /** Calculated display name based on user */
    public ?string $display_name;

    /** Last time the user was logged in */
    public ?int $last_login_at;

    /** Last time the user's status was updated */
    public ?int $last_status_at;

    /** Last time the user made a post within the given date range */
    public ?int $last_post_date;

    /** Total number of days a user posted within the given date range */
    public ?int $days_active;

    /** Total number of posts made by a user within the given date range */
    public ?int $total_posts;
}
