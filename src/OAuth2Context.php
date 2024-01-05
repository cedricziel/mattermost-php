<?php

namespace CedricZiel\MattermostPhp;

use Symfony\Component\Serializer\Attribute\SerializedName;

readonly class OAuth2Context
{
    public function __construct(
        #[SerializedName('connect_url')]
        protected ?string $connect_url = null,
        #[SerializedName('complete_url')]
        protected ?string $complete_url = null,
    ) {}
}
