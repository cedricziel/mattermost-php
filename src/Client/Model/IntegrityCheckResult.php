<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * an object with the result of the integrity check.
 */
class IntegrityCheckResult
{
    public function __construct(
        public $data = null,
        /** a string value set in case of error. */
        public ?string $err = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return IntegrityCheckResult The hydrated instance
     */
    public static function hydrate(?array $data): IntegrityCheckResult
    {
        $data ??= [];

        return new self(
            data: $data['data'] ?? null,
            err: $data['err'] ?? null,
        );
    }
}
