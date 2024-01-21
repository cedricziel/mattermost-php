<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AutocompleteSuggestion
{
    /** Completed suggestion */
    public ?string $Complete;

    /** Predicted text user might want to input */
    public ?string $Suggestion;

    /** Hint about suggested input */
    public ?string $Hint;

    /** Description of the suggested command */
    public ?string $Description;

    /** Base64 encoded svg image */
    public ?string $IconData;
}
