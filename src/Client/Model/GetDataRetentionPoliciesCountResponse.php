<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetDataRetentionPoliciesCountResponse
{
    public function __construct(
        /** The number of granular retention policies. */
        public ?int $total_count = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): GetDataRetentionPoliciesCountResponse {
        $object = new self(
            total_count: isset($data['total_count']) ? $data['total_count'] : null,
        );
        return $object;
    }
}
