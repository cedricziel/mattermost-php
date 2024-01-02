<?php

namespace CedricZiel\MattermostPhp;

use Symfony\Component\Serializer\Attribute\SerializedName;

class User
{
    public function __construct(
        #[SerializedName('id')]
        protected readonly string $id,
    ) {
    }
}
