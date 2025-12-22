<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PostIdToReactionsMap
{
    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return PostIdToReactionsMap The hydrated instance
     */
    public static function hydrate(?array $data): PostIdToReactionsMap
    {
        return new self();
    }
}
