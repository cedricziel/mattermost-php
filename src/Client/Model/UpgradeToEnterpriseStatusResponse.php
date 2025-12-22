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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return UpgradeToEnterpriseStatusResponse The hydrated instance
     */
    public static function hydrate(?array $data): UpgradeToEnterpriseStatusResponse
    {
        $data ??= [];

        return new self(
            percentage: $data['percentage'] ?? null,
            error: $data['error'] ?? null,
        );
    }
}
