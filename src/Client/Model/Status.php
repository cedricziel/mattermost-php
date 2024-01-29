<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Status
{
    public function __construct(
        public ?string $user_id = null,
        public ?string $status = null,
        public ?bool $manual = null,
        public ?int $last_activity_at = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['user_id'] */
            if (isset($data['user_id'])) $this->user_id = $data['user_id'];
        /** @var string $data['status'] */
            if (isset($data['status'])) $this->status = $data['status'];
        /** @var bool $data['manual'] */
            if (isset($data['manual'])) $this->manual = $data['manual'];
        /** @var int $data['last_activity_at'] */
            if (isset($data['last_activity_at'])) $this->last_activity_at = $data['last_activity_at'];
        return $this;
    }
}
