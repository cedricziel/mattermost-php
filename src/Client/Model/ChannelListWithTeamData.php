<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelListWithTeamData
{
    public function __construct(
        /** @var \CedricZiel\MattermostPhp\Client\Model\ChannelWithTeamData[] */
        public array $items,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            items: array_map(function ($item) {
            return \CedricZiel\MattermostPhp\Client\Model\ChannelWithTeamData::hydrate($item);
            }, $data['items'] ?? []),
        );
        return $object;
    }
}
