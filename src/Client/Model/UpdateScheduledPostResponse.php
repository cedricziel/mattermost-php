<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateScheduledPostResponse
{
    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return UpdateScheduledPostResponse The hydrated instance
     */
    public static function hydrate(?array $data): UpdateScheduledPostResponse
    {
        return new self();
    }
}
