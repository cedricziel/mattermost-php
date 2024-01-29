<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Group
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $display_name = null,
        public ?string $description = null,
        public ?string $source = null,
        public ?string $remote_id = null,
        public ?int $create_at = null,
        public ?int $update_at = null,
        public ?int $delete_at = null,
        public ?bool $has_syncables = null,
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
        /** @var string $data['name'] */
            if (isset($data['name'])) $this->name = $data['name'];
        /** @var string $data['display_name'] */
            if (isset($data['display_name'])) $this->display_name = $data['display_name'];
        /** @var string $data['description'] */
            if (isset($data['description'])) $this->description = $data['description'];
        /** @var string $data['source'] */
            if (isset($data['source'])) $this->source = $data['source'];
        /** @var string $data['remote_id'] */
            if (isset($data['remote_id'])) $this->remote_id = $data['remote_id'];
        /** @var int $data['create_at'] */
            if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['update_at'] */
            if (isset($data['update_at'])) $this->update_at = $data['update_at'];
        /** @var int $data['delete_at'] */
            if (isset($data['delete_at'])) $this->delete_at = $data['delete_at'];
        /** @var bool $data['has_syncables'] */
            if (isset($data['has_syncables'])) $this->has_syncables = $data['has_syncables'];
        return $this;
    }
}
