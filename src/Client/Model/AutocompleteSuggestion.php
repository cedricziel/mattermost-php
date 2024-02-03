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
        $object = new self(
            Complete: isset($data['Complete']) ? $data['Complete'] : null,
            Suggestion: isset($data['Suggestion']) ? $data['Suggestion'] : null,
            Hint: isset($data['Hint']) ? $data['Hint'] : null,
            Description: isset($data['Description']) ? $data['Description'] : null,
            IconData: isset($data['IconData']) ? $data['IconData'] : null,
        );
        return $object;
    }
}
