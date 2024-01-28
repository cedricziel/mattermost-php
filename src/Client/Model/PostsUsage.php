<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PostsUsage
{
    /** Total no. of posts */
    public ?\number $count;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var number $data['count'] */
        if (isset($data['count'])) $this->count = $data['count'];
        return $this;
    }
}
