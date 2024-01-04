<?php

namespace CedricZiel\MattermostPhp;

use Symfony\Component\Serializer\Attribute\SerializedName;

class Call
{
    public function __construct(
        #[SerializedName('path')]
        protected readonly string $path,
        #[SerializedName('state')]
        protected readonly ?array $state = null,
        #[SerializedName('expand')]
        protected readonly ?Expand $expand = null,
    ) {
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getState(): ?array
    {
        return $this->state;
    }

    public function getExpand(): ?Expand
    {
        return $this->expand;
    }
}
