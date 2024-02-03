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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            Complete: $data['Complete'] ?? null,
            Suggestion: $data['Suggestion'] ?? null,
            Hint: $data['Hint'] ?? null,
            Description: $data['Description'] ?? null,
            IconData: $data['IconData'] ?? null,
        );
        return $object;
    }
}
