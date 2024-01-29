<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Audit
{
    public function __construct(
        public ?string $id = null,
        /** The time in milliseconds a audit was created */
        public ?int $create_at = null,
        public ?string $user_id = null,
        public ?string $action = null,
        public ?string $extra_info = null,
        public ?string $ip_address = null,
        public ?string $session_id = null,
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
