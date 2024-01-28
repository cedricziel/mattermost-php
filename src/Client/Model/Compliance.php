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
        /** @var string $data['id'] */
        if (isset($data['id'])) $this->id = $data['id'];
        /** @var int $data['create_at'] */
        if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var string $data['user_id'] */
        if (isset($data['user_id'])) $this->user_id = $data['user_id'];
        /** @var string $data['status'] */
        if (isset($data['status'])) $this->status = $data['status'];
        /** @var int $data['count'] */
        if (isset($data['count'])) $this->count = $data['count'];
        /** @var string $data['desc'] */
        if (isset($data['desc'])) $this->desc = $data['desc'];
        /** @var string $data['type'] */
        if (isset($data['type'])) $this->type = $data['type'];
        /** @var int $data['start_at'] */
        if (isset($data['start_at'])) $this->start_at = $data['start_at'];
        /** @var int $data['end_at'] */
        if (isset($data['end_at'])) $this->end_at = $data['end_at'];
        /** @var string $data['keywords'] */
        if (isset($data['keywords'])) $this->keywords = $data['keywords'];
        /** @var string $data['emails'] */
        if (isset($data['emails'])) $this->emails = $data['emails'];
        return $this;
    }
}
