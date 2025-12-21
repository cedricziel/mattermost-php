<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AccessControlPoliciesWithCount
{
    public function __construct(
        public ?array $policies = null,
        /** The total number of policies. */
        public ?int $total_count = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): AccessControlPoliciesWithCount {
        $object = new self(
            policies: isset($data['policies']) ? $data['policies'] : null,
            total_count: isset($data['total_count']) ? $data['total_count'] : null,
        );
        return $object;
    }
}
