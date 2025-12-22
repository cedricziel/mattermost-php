<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetUsersByGroupChannelIdsResponse
{
    public function __construct()
    {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return GetUsersByGroupChannelIdsResponse The hydrated instance
     */
    public static function hydrate(?array $data): GetUsersByGroupChannelIdsResponse
    {
        $data = $data ?? [];

        $object = new self(

        );
        return $object;
    }
}
