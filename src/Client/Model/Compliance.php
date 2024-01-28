<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Compliance
{
    public ?string $id;
    public ?int $create_at;
    public ?string $user_id;
    public ?string $status;
    public ?int $count;
    public ?string $desc;
    public ?string $type;
    public ?int $start_at;
    public ?int $end_at;
    public ?string $keywords;
    public ?string $emails;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->id = $data['id'];
        $this->create_at = $data['create_at'];
        $this->user_id = $data['user_id'];
        $this->status = $data['status'];
        $this->count = $data['count'];
        $this->desc = $data['desc'];
        $this->type = $data['type'];
        $this->start_at = $data['start_at'];
        $this->end_at = $data['end_at'];
        $this->keywords = $data['keywords'];
        $this->emails = $data['emails'];
        return $this;
    }
}
