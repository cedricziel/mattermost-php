<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AddChannelsToRetentionPolicyRequest implements \JsonSerializable
{
    public function __construct(
        /**
         * @var string[]
         * The IDs of the channels to add to the policy.
         */
        public array $items,
    ) {
    }

    public function jsonSerialize(): array
    {
        return array_map(function ($item) {
            if ($item instanceof \JsonSerializable) {
              return $item->jsonSerialize();
            }
            return $item;
        }, $this->items);
    }
}
