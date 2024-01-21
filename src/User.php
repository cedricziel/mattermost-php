<?php

namespace CedricZiel\MattermostPhp;

use Symfony\Component\Serializer\Attribute\SerializedName;

class User
{
    public function __construct(
        #[SerializedName('id')]
        protected string $id,
        #[SerializedName('username')]
        protected ?string $username = null,
        #[SerializedName('email')]
        protected ?string $email = null,
        #[SerializedName('roles')]
        protected ?string $roles = null,
        #[SerializedName('locale')]
        protected ?string $locale = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }
}
