<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetFileLinkResponse
{
    public function __construct(
        public ?string $link = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return GetFileLinkResponse The hydrated instance
     */
    public static function hydrate(?array $data): GetFileLinkResponse
    {
        $data ??= [];

        return new self(
            link: $data['link'] ?? null,
        );
    }
}
