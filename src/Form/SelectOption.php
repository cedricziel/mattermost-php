<?php

namespace CedricZiel\MattermostPhp\Form;

use Symfony\Component\Serializer\Attribute\SerializedName;

class SelectOption
{
    public function __construct(
        #[SerializedName('value')]
        public readonly string $value,
        #[SerializedName('label')]
        public readonly ?string $label,
        #[SerializedName('icon_data')]
        public readonly ?string $iconData,
    ) {
    }
}
