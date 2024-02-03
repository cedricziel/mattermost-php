<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class StatusOK
{
    public function __construct(
        /** Will contain "ok" if the request was successful and there was nothing else to return */
        public ?string $status = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            status: isset($data['status']) ? $data['status'] : null,
        );
        return $object;
    }
}
