<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AddTeamsToRetentionPolicyRequest implements \JsonSerializable
{
    public function __construct(
        /**
         * @var string[]
         * The IDs of the teams to add to the policy.
         */
        public array $items,
    ) {
    }

    public function jsonSerialize(): array
    {
        return array_map(fn(mixed $item): mixed => $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item, $this->items);
    }
}
