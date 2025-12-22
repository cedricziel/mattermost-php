<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class MyIPResponse
{
    public function __construct(
        /** Your current IP address */
        public ?string $ip = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return MyIPResponse The hydrated instance
     */
    public static function hydrate(?array $data): MyIPResponse
    {
        $data ??= [];

        return new self(
            ip: $data['ip'] ?? null,
        );
    }
}
