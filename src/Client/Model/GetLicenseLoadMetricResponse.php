<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetLicenseLoadMetricResponse
{
    public function __construct(
        /** Current license load metric as an integer */
        public ?int $load = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return GetLicenseLoadMetricResponse The hydrated instance
     */
    public static function hydrate(?array $data): GetLicenseLoadMetricResponse
    {
        $data ??= [];

        return new self(
            load: $data['load'] ?? null,
        );
    }
}
