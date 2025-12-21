<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class MyIPResponse
{
    public function __construct(
        /** Your current IP address */
        public ?string $ip = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): MyIPResponse {
        $object = new self(
            ip: isset($data['ip']) ? $data['ip'] : null,
        );
        return $object;
    }
}
