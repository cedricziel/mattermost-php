<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class User
{
    public ?string $id;

    /** The time in milliseconds a user was created */
    public ?int $create_at;

    /** The time in milliseconds a user was last updated */
    public ?int $update_at;

    /** The time in milliseconds a user was deleted */
    public ?int $delete_at;
    public ?string $username;
    public ?string $first_name;
    public ?string $last_name;
    public ?string $nickname;
    public ?string $email;
    public ?bool $email_verified;
    public ?string $auth_service;
    public ?string $roles;
    public ?string $locale;
    public $notify_props;
    public ?\stdClass $props;
    public ?int $last_password_update;
    public ?int $last_picture_update;
    public ?int $failed_attempts;
    public ?bool $mfa_active;
    public $timezone;

    /** ID of accepted terms of service, if any. This field is not present if empty. */
    public ?string $terms_of_service_id;

    /** The time in milliseconds the user accepted the terms of service */
    public ?int $terms_of_service_create_at;

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
        /** @var int $data['update_at'] */
        if (isset($data['update_at'])) $this->update_at = $data['update_at'];
        /** @var int $data['delete_at'] */
        if (isset($data['delete_at'])) $this->delete_at = $data['delete_at'];
        /** @var string $data['username'] */
        if (isset($data['username'])) $this->username = $data['username'];
        /** @var string $data['first_name'] */
        if (isset($data['first_name'])) $this->first_name = $data['first_name'];
        /** @var string $data['last_name'] */
        if (isset($data['last_name'])) $this->last_name = $data['last_name'];
        /** @var string $data['nickname'] */
        if (isset($data['nickname'])) $this->nickname = $data['nickname'];
        /** @var string $data['email'] */
        if (isset($data['email'])) $this->email = $data['email'];
        /** @var bool $data['email_verified'] */
        if (isset($data['email_verified'])) $this->email_verified = $data['email_verified'];
        /** @var string $data['auth_service'] */
        if (isset($data['auth_service'])) $this->auth_service = $data['auth_service'];
        /** @var string $data['roles'] */
        if (isset($data['roles'])) $this->roles = $data['roles'];
        /** @var string $data['locale'] */
        if (isset($data['locale'])) $this->locale = $data['locale'];
        /** @var  $data['notify_props'] */
        if (isset($data['notify_props'])) $this->notify_props = $data['notify_props'];
        /** @var stdClass $data['props'] */
        if (isset($data['props'])) $this->props = (object) $data['props'];
        /** @var int $data['last_password_update'] */
        if (isset($data['last_password_update'])) $this->last_password_update = $data['last_password_update'];
        /** @var int $data['last_picture_update'] */
        if (isset($data['last_picture_update'])) $this->last_picture_update = $data['last_picture_update'];
        /** @var int $data['failed_attempts'] */
        if (isset($data['failed_attempts'])) $this->failed_attempts = $data['failed_attempts'];
        /** @var bool $data['mfa_active'] */
        if (isset($data['mfa_active'])) $this->mfa_active = $data['mfa_active'];
        /** @var  $data['timezone'] */
        if (isset($data['timezone'])) $this->timezone = $data['timezone'];
        /** @var string $data['terms_of_service_id'] */
        if (isset($data['terms_of_service_id'])) $this->terms_of_service_id = $data['terms_of_service_id'];
        /** @var int $data['terms_of_service_create_at'] */
        if (isset($data['terms_of_service_create_at'])) $this->terms_of_service_create_at = $data['terms_of_service_create_at'];
        return $this;
    }
}
