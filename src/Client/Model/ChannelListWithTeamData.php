<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelListWithTeamData
{
    /** @var \CedricZiel\MattermostPhp\Client\Model\ChannelWithTeamData[] */
    public array $items;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        foreach ($data as $item) {
            $this->items[] = (new \CedricZiel\MattermostPhp\Client\Model\ChannelWithTeamData())->hydrate($item);
        }

        return $this;
    }
}
