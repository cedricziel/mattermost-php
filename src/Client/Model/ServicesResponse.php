<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ServicesResponse
{
    public function __construct(
        /** List of available LLM services */
        public ?array $services = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ServicesResponse The hydrated instance
     */
    public static function hydrate(?array $data): ServicesResponse
    {
        $data ??= [];

        return new self(
            services: $data['services'] ?? null,
        );
    }
}
