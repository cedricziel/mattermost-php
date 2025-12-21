<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SubmitPerformanceReportRequest
{
    public function __construct(
        /** An identifier for the schema of the data being submitted which currently must be "0.1.0" */
        public string $version,
        /** The time in milliseconds of the first metric in this report */
        public int $start,
        /** The time in milliseconds of the last metric in this report */
        public int $end,
        /** Not currently used */
        public ?string $client_id = null,
        /** Labels to be applied to all metrics when recorded by the metrics backend */
        public ?array $labels = null,
        /** An array of counter metrics to be reported */
        public ?array $counters = null,
        /** An array of histogram measurements to be reported */
        public ?array $histograms = null,
    ) {
    }
}
