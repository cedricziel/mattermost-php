<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class DeleteScheduledPostResponse
{
    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return DeleteScheduledPostResponse The hydrated instance
     */
    public static function hydrate(?array $data): DeleteScheduledPostResponse
    {
        return new self();
    }
}
