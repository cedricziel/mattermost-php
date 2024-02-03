<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class DeletePreferencesRequest implements \JsonSerializable
{
    public function __construct(
        /**
         * @var []
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
