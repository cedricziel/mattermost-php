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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var bool $data['useAutomaticTimezone'] */
            if (isset($data['useAutomaticTimezone'])) $this->useAutomaticTimezone = $data['useAutomaticTimezone'];
        /** @var string $data['manualTimezone'] */
            if (isset($data['manualTimezone'])) $this->manualTimezone = $data['manualTimezone'];
        /** @var string $data['automaticTimezone'] */
            if (isset($data['automaticTimezone'])) $this->automaticTimezone = $data['automaticTimezone'];
        return $this;
    }
}
