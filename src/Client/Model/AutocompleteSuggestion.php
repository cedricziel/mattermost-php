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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return AutocompleteSuggestion The hydrated instance
     */
    public static function hydrate(?array $data): AutocompleteSuggestion
    {
        $data ??= [];

        return new self(
            Complete: $data['Complete'] ?? null,
            Suggestion: $data['Suggestion'] ?? null,
            Hint: $data['Hint'] ?? null,
            Description: $data['Description'] ?? null,
            IconData: $data['IconData'] ?? null,
        );
    }
}
