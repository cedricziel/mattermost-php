<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AutocompleteSuggestion
{
    public function __construct(
        /** Completed suggestion */
        public ?string $Complete = null,
        /** Predicted text user might want to input */
        public ?string $Suggestion = null,
        /** Hint about suggested input */
        public ?string $Hint = null,
        /** Description of the suggested command */
        public ?string $Description = null,
        /** Base64 encoded svg image */
        public ?string $IconData = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['Complete'] */
            if (isset($data['Complete'])) $this->Complete = $data['Complete'];
        /** @var string $data['Suggestion'] */
            if (isset($data['Suggestion'])) $this->Suggestion = $data['Suggestion'];
        /** @var string $data['Hint'] */
            if (isset($data['Hint'])) $this->Hint = $data['Hint'];
        /** @var string $data['Description'] */
            if (isset($data['Description'])) $this->Description = $data['Description'];
        /** @var string $data['IconData'] */
            if (isset($data['IconData'])) $this->IconData = $data['IconData'];
        return $this;
    }
}
