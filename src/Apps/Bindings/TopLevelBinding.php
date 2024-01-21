<?php

namespace CedricZiel\MattermostPhp\Apps\Bindings;

use CedricZiel\MattermostPhp\Apps\Location;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class TopLevelBinding implements \JsonSerializable
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

    public function jsonSerialize(): mixed
    {
        $o = new \stdClass();

        $o->location = $this->location->value;
        $o->bindings = array_map(fn(LocationBinding $binding) => $binding->jsonSerialize(), $this->bindings);

        return $o;
    }
}
