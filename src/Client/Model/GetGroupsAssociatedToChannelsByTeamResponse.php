<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetGroupsAssociatedToChannelsByTeamResponse
{
    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return GetGroupsAssociatedToChannelsByTeamResponse The hydrated instance
     */
    public static function hydrate(?array $data): GetGroupsAssociatedToChannelsByTeamResponse
    {
        return new self();
    }
}
