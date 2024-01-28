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
        /** @var string $data['id'] */
        if (isset($data['id'])) $this->id = $data['id'];
        /** @var int $data['create_at'] */
        if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var string $data['user_id'] */
        if (isset($data['user_id'])) $this->user_id = $data['user_id'];
        /** @var string $data['action'] */
        if (isset($data['action'])) $this->action = $data['action'];
        /** @var string $data['extra_info'] */
        if (isset($data['extra_info'])) $this->extra_info = $data['extra_info'];
        /** @var string $data['ip_address'] */
        if (isset($data['ip_address'])) $this->ip_address = $data['ip_address'];
        /** @var string $data['session_id'] */
        if (isset($data['session_id'])) $this->session_id = $data['session_id'];
        return $this;
    }
}
