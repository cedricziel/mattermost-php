<?php

namespace CedricZiel\MattermostPhp\Bindings;

use CedricZiel\MattermostPhp\Call;
use CedricZiel\MattermostPhp\Form\Form;
use CedricZiel\MattermostPhp\Location;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class LocationBinding
{
    public function __construct(
        /**
         * Location allows the App to identify where in the UX the Call request
         * comes from. It is optional. For /command bindings, Location is
         * defaulted to Label.
         */
        #[SerializedName('location')]
        protected readonly string $location,
        protected readonly string $icon,
        protected readonly string $hint = '',
        protected readonly string $description = '',
        /**
         * @var array<LocationBinding>
         */
        #[SerializedName('bindings')]
        protected readonly ?array $bindings = null,
        #[SerializedName('form')]
        protected readonly ?Form $form = null,
        protected readonly ?string $label = null,
        protected readonly ?Call $submit = null,
    ) {
    }
}
