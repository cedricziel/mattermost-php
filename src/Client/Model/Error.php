<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Error
{
    public function __construct(
        /** A message with the error description. */
        public ?string $error = null,
        /** Further details on where and why this error happened. */
        public ?string $details = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Error The hydrated instance
     */
    public static function hydrate(?array $data): Error
    {
        $data ??= [];

        return new self(
            error: $data['error'] ?? null,
            details: $data['details'] ?? null,
        );
    }
}
