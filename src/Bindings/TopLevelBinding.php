<?php

namespace App\Mattermost\Bindings;

use CedricZiel\MattermostPhp\Location;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class TopLevelBinding
{
    public function __construct(
        #[SerializedName('location')]
        protected readonly Location $location,
        /**
         * @var array<LocationBinding>
         */
        #[SerializedName('bindings')]
        protected readonly array $bindings,
    ) {
    }
}
