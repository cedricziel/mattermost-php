<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class User
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
        public ?string $first_name = null,
        public ?string $last_name = null,
        public ?string $nickname = null,
        public ?string $email = null,
        public ?bool $email_verified = null,
        public ?string $auth_service = null,
        public ?string $roles = null,
        public ?string $locale = null,
        public $notify_props = null,
        public ?\stdClass $props = null,
        public ?int $last_password_update = null,
        public ?int $last_picture_update = null,
        public ?int $failed_attempts = null,
        public ?bool $mfa_active = null,
        public $timezone = null,
        /** ID of accepted terms of service, if any. This field is not present if empty. */
        public ?string $terms_of_service_id = null,
        /** The time in milliseconds the user accepted the terms of service */
        public ?int $terms_of_service_create_at = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
            username: isset($data['username']) ? $data['username'] : null,
            first_name: isset($data['first_name']) ? $data['first_name'] : null,
            last_name: isset($data['last_name']) ? $data['last_name'] : null,
            nickname: isset($data['nickname']) ? $data['nickname'] : null,
            email: isset($data['email']) ? $data['email'] : null,
            email_verified: isset($data['email_verified']) ? $data['email_verified'] : null,
            auth_service: isset($data['auth_service']) ? $data['auth_service'] : null,
            roles: isset($data['roles']) ? $data['roles'] : null,
            locale: isset($data['locale']) ? $data['locale'] : null,
            notify_props: isset($data['notify_props']) ? $data['notify_props'] : null,
            props: isset($data['props']) ? (object) $data['props'] : null,
            last_password_update: isset($data['last_password_update']) ? $data['last_password_update'] : null,
            last_picture_update: isset($data['last_picture_update']) ? $data['last_picture_update'] : null,
            failed_attempts: isset($data['failed_attempts']) ? $data['failed_attempts'] : null,
            mfa_active: isset($data['mfa_active']) ? $data['mfa_active'] : null,
            timezone: isset($data['timezone']) ? $data['timezone'] : null,
            terms_of_service_id: isset($data['terms_of_service_id']) ? $data['terms_of_service_id'] : null,
            terms_of_service_create_at: isset($data['terms_of_service_create_at']) ? $data['terms_of_service_create_at'] : null,
        );
        return $object;
    }
}
