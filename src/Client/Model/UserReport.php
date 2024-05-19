<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserReport
{
    public function __construct(
        public ?string $id = null,
        /** The time in milliseconds a user was created */
        public ?int $create_at = null,
        public ?string $username = null,
        public ?string $email = null,
        /** Calculated display name based on user */
        public ?string $display_name = null,
        /** Last time the user was logged in */
        public ?int $last_login_at = null,
        /** Last time the user's status was updated */
        public ?int $last_status_at = null,
        /** Last time the user made a post within the given date range */
        public ?int $last_post_date = null,
        /** Total number of days a user posted within the given date range */
        public ?int $days_active = null,
        /** Total number of posts made by a user within the given date range */
        public ?int $total_posts = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            username: isset($data['username']) ? $data['username'] : null,
            email: isset($data['email']) ? $data['email'] : null,
            display_name: isset($data['display_name']) ? $data['display_name'] : null,
            last_login_at: isset($data['last_login_at']) ? $data['last_login_at'] : null,
            last_status_at: isset($data['last_status_at']) ? $data['last_status_at'] : null,
            last_post_date: isset($data['last_post_date']) ? $data['last_post_date'] : null,
            days_active: isset($data['days_active']) ? $data['days_active'] : null,
            total_posts: isset($data['total_posts']) ? $data['total_posts'] : null,
        );
        return $object;
    }
}
