<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * A map of attribute names to their values as applied to the channel.
 */
class GetChannelAccessControlAttributesResponse
{
    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return GetChannelAccessControlAttributesResponse The hydrated instance
     */
    public static function hydrate(?array $data): GetChannelAccessControlAttributesResponse
    {
        return new self();
    }
}
