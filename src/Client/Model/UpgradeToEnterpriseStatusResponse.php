<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpgradeToEnterpriseStatusResponse
{
    public function __construct(
        /** Current percentage of the upgrade */
        public ?int $percentage = null,
        /** Error happened during the upgrade */
        public ?string $error = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            percentage: isset($data['percentage']) ? $data['percentage'] : null,
            error: isset($data['error']) ? $data['error'] : null,
        );
        return $object;
    }
}
