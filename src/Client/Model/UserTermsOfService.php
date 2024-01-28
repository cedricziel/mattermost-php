<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserTermsOfService
{
    /** The unique identifier of the user who performed this terms of service action. */
    public ?string $user_id;

    /** The unique identifier of the terms of service the action was performed on. */
    public ?string $terms_of_service_id;

    /** The time in milliseconds that this action was performed. */
    public ?int $create_at;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->user_id = $data['user_id'];
        $this->terms_of_service_id = $data['terms_of_service_id'];
        $this->create_at = $data['create_at'];
        return $this;
    }
}
