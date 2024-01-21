<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AppError
{
    public ?int $status_code;
    public ?string $id;
    public ?string $message;
    public ?string $request_id;
}
