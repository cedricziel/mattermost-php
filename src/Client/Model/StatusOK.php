<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class StatusOK
{
    public function __construct(
        /** Will contain "ok" if the request was successful and there was nothing else to return */
        public ?string $status = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return StatusOK The hydrated instance
     */
    public static function hydrate(?array $data): StatusOK
    {
        $data ??= [];

        return new self(
            status: $data['status'] ?? null,
        );
    }
}
