<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserReport
{
    public function __construct(
        public ?string $id = null,
        /** The time in milliseconds a user was created */
        public ?int $create_at = null,
        /** The time in milliseconds a user was last updated */
        public ?int $update_at = null,
        /** The time in milliseconds a user was deleted */
        public ?int $delete_at = null,
        public ?string $username = null,
        public ?string $auth_data = null,
        public ?string $auth_service = null,
        public ?string $email = null,
        public ?string $nickname = null,
        public ?string $first_name = null,
        public ?string $last_name = null,
        public ?string $position = null,
        public ?string $roles = null,
        public ?string $locale = null,
        public $timezone = null,
        public ?bool $disable_welcome_email = null,
        /** Last time the user was logged in */
        public ?int $last_login = null,
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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return UserReport The hydrated instance
     */
    public static function hydrate(?array $data): UserReport
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            create_at: $data['create_at'] ?? null,
            update_at: $data['update_at'] ?? null,
            delete_at: $data['delete_at'] ?? null,
            username: $data['username'] ?? null,
            auth_data: $data['auth_data'] ?? null,
            auth_service: $data['auth_service'] ?? null,
            email: $data['email'] ?? null,
            nickname: $data['nickname'] ?? null,
            first_name: $data['first_name'] ?? null,
            last_name: $data['last_name'] ?? null,
            position: $data['position'] ?? null,
            roles: $data['roles'] ?? null,
            locale: $data['locale'] ?? null,
            timezone: $data['timezone'] ?? null,
            disable_welcome_email: $data['disable_welcome_email'] ?? null,
            last_login: $data['last_login'] ?? null,
            last_status_at: $data['last_status_at'] ?? null,
            last_post_date: $data['last_post_date'] ?? null,
            days_active: $data['days_active'] ?? null,
            total_posts: $data['total_posts'] ?? null,
        );
    }
}
