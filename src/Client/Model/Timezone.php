<?php

namespace CedricZiel\MattermostPhp\Client;

class Timezone
{
    /** Set to "true" to use the browser/system timezone, "false" to set manually. Defaults to "true". */
    public ?bool $useAutomaticTimezone;

    /** Value when setting manually the timezone, i.e. "Europe/Berlin". */
    public ?string $manualTimezone;

    /** This value is set automatically when the "useAutomaticTimezone" is set to "true". */
    public ?string $automaticTimezone;
}
;