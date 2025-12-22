<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelListWithTeamData implements \JsonSerializable
{
    public function __construct(
        /** @var \CedricZiel\MattermostPhp\Client\Model\ChannelWithTeamData[] */
        public array $items,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ChannelListWithTeamData The hydrated instance
     */
    public static function hydrate(?array $data): ChannelListWithTeamData
    {
        $data = $data ?? [];

        $object = new self(
            items: array_map(function ($item) {
                return \CedricZiel\MattermostPhp\Client\Model\ChannelWithTeamData::hydrate($item);
            }, $data['items'] ?? []),
        );
        return $object;
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
