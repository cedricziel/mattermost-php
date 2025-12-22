<?php

namespace CedricZiel\MattermostPhp\Apps\Bindings;

use CedricZiel\MattermostPhp\Apps\Location;
use Symfony\Component\Serializer\Attribute\SerializedName;

final readonly class TopLevelBinding implements \JsonSerializable
{
    public function __construct(
        #[SerializedName('location')]
        protected Location $location,
        /**
         * @var LocationBinding[]
         */
        #[SerializedName('bindings')]
        protected array $bindings,
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
        $o->bindings = array_map(fn(LocationBinding $binding): \stdClass => $binding->jsonSerialize(), $this->bindings);

        return $o;
    }
}
