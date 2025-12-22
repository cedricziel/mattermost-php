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
        $data ??= [];

        return new self(
            items: array_map(\CedricZiel\MattermostPhp\Client\Model\ChannelWithTeamData::hydrate(...), $data['items'] ?? []),
        );
    }

    public function jsonSerialize(): array
    {
        return array_map(fn(mixed $item): mixed => $item instanceof \JsonSerializable ? $item->jsonSerialize() : $item, $this->items);
    }
}
