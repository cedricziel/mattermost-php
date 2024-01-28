<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AppError
{
    public ?int $status_code;
    public ?string $id;
    public ?string $message;
    public ?string $request_id;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var int $data['status_code'] */
        if (isset($data['status_code'])) $this->status_code = $data['status_code'];
        /** @var string $data['id'] */
        if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['message'] */
        if (isset($data['message'])) $this->message = $data['message'];
        /** @var string $data['request_id'] */
        if (isset($data['request_id'])) $this->request_id = $data['request_id'];
        return $this;
    }
}
