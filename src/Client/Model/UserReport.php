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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
            if (isset($data['id'])) $this->id = $data['id'];
        /** @var int $data['create_at'] */
            if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var string $data['username'] */
            if (isset($data['username'])) $this->username = $data['username'];
        /** @var string $data['email'] */
            if (isset($data['email'])) $this->email = $data['email'];
        /** @var string $data['display_name'] */
            if (isset($data['display_name'])) $this->display_name = $data['display_name'];
        /** @var int $data['last_login_at'] */
            if (isset($data['last_login_at'])) $this->last_login_at = $data['last_login_at'];
        /** @var int $data['last_status_at'] */
            if (isset($data['last_status_at'])) $this->last_status_at = $data['last_status_at'];
        /** @var int $data['last_post_date'] */
            if (isset($data['last_post_date'])) $this->last_post_date = $data['last_post_date'];
        /** @var int $data['days_active'] */
            if (isset($data['days_active'])) $this->days_active = $data['days_active'];
        /** @var int $data['total_posts'] */
            if (isset($data['total_posts'])) $this->total_posts = $data['total_posts'];
        return $this;
    }
}
