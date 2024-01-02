<?php

namespace CedricZiel\MattermostPhp;

use Symfony\Component\Serializer\Attribute\SerializedName;

class OAuth2Context
{
    public function __construct(
        #[SerializedName('connect_url')]
        protected readonly ?string $connect_url,
        #[SerializedName('complete_url')]
        protected readonly ?string $complete_url,
    ) {}
}
