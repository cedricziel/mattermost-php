<?php

namespace CedricZiel\MattermostPhp;

use Symfony\Component\Serializer\Attribute\SerializedName;

class Call
{
    public function __construct(
        #[SerializedName('path')]
        public readonly string $path,
        #[SerializedName('state')]
        public readonly ?array $state = null,
        #[SerializedName('expand')]
        public readonly ?Expand $expand = null,
    ) {
    }
}
