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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            data: $data['data'] ?? null,
            err: $data['err'] ?? null,
        );
        return $object;
    }
}
