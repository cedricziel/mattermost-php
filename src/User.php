<?php

namespace CedricZiel\MattermostPhp;

use Symfony\Component\Serializer\Attribute\SerializedName;

final readonly class User
{
    public function __construct(
        #[SerializedName('id')]
        protected string $id,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }
}
