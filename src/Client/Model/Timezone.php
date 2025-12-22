<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Timezone
{
    public function __construct(
        /** Set to "true" to use the browser/system timezone, "false" to set manually. Defaults to "true". */
        public ?string $useAutomaticTimezone = null,
        /** Value when setting manually the timezone, i.e. "Europe/Berlin". */
        public ?string $manualTimezone = null,
        /** This value is set automatically when the "useAutomaticTimezone" is set to "true". */
        public ?string $automaticTimezone = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Timezone The hydrated instance
     */
    public static function hydrate(?array $data): Timezone
    {
        $data ??= [];

        return new self(
            useAutomaticTimezone: $data['useAutomaticTimezone'] ?? null,
            manualTimezone: $data['manualTimezone'] ?? null,
            automaticTimezone: $data['automaticTimezone'] ?? null,
        );
    }
}
