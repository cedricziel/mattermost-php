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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): UserReport {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
            username: isset($data['username']) ? $data['username'] : null,
            auth_data: isset($data['auth_data']) ? $data['auth_data'] : null,
            auth_service: isset($data['auth_service']) ? $data['auth_service'] : null,
            email: isset($data['email']) ? $data['email'] : null,
            nickname: isset($data['nickname']) ? $data['nickname'] : null,
            first_name: isset($data['first_name']) ? $data['first_name'] : null,
            last_name: isset($data['last_name']) ? $data['last_name'] : null,
            position: isset($data['position']) ? $data['position'] : null,
            roles: isset($data['roles']) ? $data['roles'] : null,
            locale: isset($data['locale']) ? $data['locale'] : null,
            timezone: isset($data['timezone']) ? $data['timezone'] : null,
            disable_welcome_email: isset($data['disable_welcome_email']) ? $data['disable_welcome_email'] : null,
            last_login: isset($data['last_login']) ? $data['last_login'] : null,
            last_status_at: isset($data['last_status_at']) ? $data['last_status_at'] : null,
            last_post_date: isset($data['last_post_date']) ? $data['last_post_date'] : null,
            days_active: isset($data['days_active']) ? $data['days_active'] : null,
            total_posts: isset($data['total_posts']) ? $data['total_posts'] : null,
        );
        return $object;
    }
}
