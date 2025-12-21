<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ServicesResponse
{
    public function __construct(
        /** List of available LLM services */
        public ?array $services = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): ServicesResponse {
        $object = new self(
            services: isset($data['services']) ? $data['services'] : null,
        );
        return $object;
    }
}
