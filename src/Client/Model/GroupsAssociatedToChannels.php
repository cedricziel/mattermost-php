<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * a map of channel id(s) to the set of groups that constrain the corresponding channel in a team
 */
class GroupsAssociatedToChannels
{
    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return GroupsAssociatedToChannels The hydrated instance
     */
    public static function hydrate(?array $data): GroupsAssociatedToChannels
    {
        return new self();
    }
}
