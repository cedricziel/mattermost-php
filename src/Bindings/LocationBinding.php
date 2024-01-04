<?php

namespace CedricZiel\MattermostPhp\Bindings;

use App\Mattermost\Form\Form;
use CedricZiel\MattermostPhp\Call;
use CedricZiel\MattermostPhp\Location;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class LocationBinding
{
    public function __construct(
        #[SerializedName('location')]
        protected readonly Location $location,
        protected readonly string $icon,
        protected readonly string $label,
        protected readonly string $hint,
        protected readonly string $description,
        protected readonly Call $submit,
        protected readonly Form $form,
        /**
         * @var array<\App\Mattermost\Bindings\Binding>
         */
        protected readonly array $bindings,
    ) {
    }
}
