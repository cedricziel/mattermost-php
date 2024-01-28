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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->Complete = $data['Complete'];
        $this->Suggestion = $data['Suggestion'];
        $this->Hint = $data['Hint'];
        $this->Description = $data['Description'];
        $this->IconData = $data['IconData'];
        return $this;
    }
}
