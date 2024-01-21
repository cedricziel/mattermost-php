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
}
