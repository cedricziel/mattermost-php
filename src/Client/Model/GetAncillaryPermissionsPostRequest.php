<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetAncillaryPermissionsPostRequest implements \JsonSerializable
{
    public function __construct(
        /**
         * @var string[]
         */
        public array $items,
    ) {
    }

    public function jsonSerialize(): array
    {
        return array_map(fn(mixed $item): mixed => $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item, $this->items);
    }
}
