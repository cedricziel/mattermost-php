<?php

namespace CedricZiel\MattermostPhp\Bindings;

use CedricZiel\MattermostPhp\Call;
use CedricZiel\MattermostPhp\Form\Form;
use CedricZiel\MattermostPhp\Location;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class LocationBinding
{
    public function __construct(
        protected readonly string $icon,
        protected readonly string $label,
        protected readonly string $hint,
        protected readonly string $description,
        protected readonly Call $submit,
        /**
         * Location allows the App to identify where in the UX the Call request
         * comes from. It is optional. For /command bindings, Location is
         * defaulted to Label.
         */
        #[SerializedName('location')]
        protected readonly ?Location $location = null,
        protected readonly ?Form $form = null,
        /**
         * @var array<LocationBinding>
         */
        protected readonly ?array $bindings = null,
    ) {
    }
}
