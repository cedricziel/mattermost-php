<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetLicenseLoadMetricResponse
{
    public function __construct(
        /** Current license load metric as an integer */
        public ?int $load = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): GetLicenseLoadMetricResponse {
        $object = new self(
            load: isset($data['load']) ? $data['load'] : null,
        );
        return $object;
    }
}
