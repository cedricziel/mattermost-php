<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class RetentionPolicyForTeamList
{
    public function __construct(
        /** The list of team policies. */
        public ?array $policies = null,
        /** The total number of team policies. */
        public ?int $total_count = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            policies: isset($data['policies']) ? $data['policies'] : null,
            total_count: isset($data['total_count']) ? $data['total_count'] : null,
        );
        return $object;
    }
}
