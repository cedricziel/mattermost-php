<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Timezone
{
    public function __construct(
        /** Set to "true" to use the browser/system timezone, "false" to set manually. Defaults to "true". */
        public ?bool $useAutomaticTimezone = null,
        /** Value when setting manually the timezone, i.e. "Europe/Berlin". */
        public ?string $manualTimezone = null,
        /** This value is set automatically when the "useAutomaticTimezone" is set to "true". */
        public ?string $automaticTimezone = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            useAutomaticTimezone: isset($data['useAutomaticTimezone']) ? $data['useAutomaticTimezone'] : null,
            manualTimezone: isset($data['manualTimezone']) ? $data['manualTimezone'] : null,
            automaticTimezone: isset($data['automaticTimezone']) ? $data['automaticTimezone'] : null,
        );
        return $object;
    }
}
