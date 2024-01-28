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
        $this->id = $data['id'];
        $this->create_at = $data['create_at'];
        $this->update_at = $data['update_at'];
        $this->delete_at = $data['delete_at'];
        $this->username = $data['username'];
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->nickname = $data['nickname'];
        $this->email = $data['email'];
        $this->email_verified = $data['email_verified'];
        $this->auth_service = $data['auth_service'];
        $this->roles = $data['roles'];
        $this->locale = $data['locale'];
        $this->notify_props = $data['notify_props'];
        $this->props = $data['props'];
        $this->last_password_update = $data['last_password_update'];
        $this->last_picture_update = $data['last_picture_update'];
        $this->failed_attempts = $data['failed_attempts'];
        $this->mfa_active = $data['mfa_active'];
        $this->timezone = $data['timezone'];
        $this->terms_of_service_id = $data['terms_of_service_id'];
        $this->terms_of_service_create_at = $data['terms_of_service_create_at'];
        return $this;
    }
}
