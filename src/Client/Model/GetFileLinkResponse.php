<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetFileLinkResponse
{
    public function __construct(
        public ?string $link = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            link: isset($data['link']) ? $data['link'] : null,
        );
        return $object;
    }
}
