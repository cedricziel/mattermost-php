<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PatchCPAValuesRequest implements \JsonSerializable
{
    public function __construct(
        /**
         * @var \stdClass[]
         */
        public array $items,
    ) {
    }

    public function jsonSerialize(): array
    {
        return array_map(fn(mixed $item): mixed => $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item, $this->items);
    }
}
