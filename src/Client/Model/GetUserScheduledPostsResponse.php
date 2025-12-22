<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetUserScheduledPostsResponse
{
    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return GetUserScheduledPostsResponse The hydrated instance
     */
    public static function hydrate(?array $data): GetUserScheduledPostsResponse
    {
        return new self();
    }
}
