<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Group
{
    public ?string $id;
    public ?string $name;
    public ?string $display_name;
    public ?string $description;
    public ?string $source;
    public ?string $remote_id;
    public ?int $create_at;
    public ?int $update_at;
    public ?int $delete_at;
    public ?bool $has_syncables;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->display_name = $data['display_name'];
        $this->description = $data['description'];
        $this->source = $data['source'];
        $this->remote_id = $data['remote_id'];
        $this->create_at = $data['create_at'];
        $this->update_at = $data['update_at'];
        $this->delete_at = $data['delete_at'];
        $this->has_syncables = $data['has_syncables'];
        return $this;
    }
}
