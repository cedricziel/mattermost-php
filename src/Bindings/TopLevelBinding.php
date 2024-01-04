<?php

namespace CedricZiel\MattermostPhp\Bindings;

use CedricZiel\MattermostPhp\Location;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class TopLevelBinding
{
    public function __construct(
        #[SerializedName('location')]
        protected readonly Location $location,
        /**
         * @var LocationBinding[]
         */
        #[SerializedName('bindings')]
        protected readonly array $bindings,
    ) {
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @return LocationBinding[]
     */
    public function getBindings(): array
    {
        return $this->bindings;
    }
}
