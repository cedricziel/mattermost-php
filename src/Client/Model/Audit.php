<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Audit
{
    public ?string $id;

    /** The time in milliseconds a audit was created */
    public ?int $create_at;
    public ?string $user_id;
    public ?string $action;
    public ?string $extra_info;
    public ?string $ip_address;
    public ?string $session_id;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->id = $data['id'];
        $this->create_at = $data['create_at'];
        $this->user_id = $data['user_id'];
        $this->action = $data['action'];
        $this->extra_info = $data['extra_info'];
        $this->ip_address = $data['ip_address'];
        $this->session_id = $data['session_id'];
        return $this;
    }
}
