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
        $this->status_code = $data['status_code'];
        $this->id = $data['id'];
        $this->message = $data['message'];
        $this->request_id = $data['request_id'];
        return $this;
    }
}
