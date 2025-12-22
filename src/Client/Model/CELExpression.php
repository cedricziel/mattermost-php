<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CELExpression
{
    public function __construct(
        /** The CEL expression to visualize. */
        public ?string $expression = null,
        /** The channel ID to contextually test the expression against (required for channel admins). */
        public ?string $channelId = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return CELExpression The hydrated instance
     */
    public static function hydrate(?array $data): CELExpression
    {
        $data ??= [];

        return new self(
            expression: $data['expression'] ?? null,
            channelId: $data['channelId'] ?? null,
        );
    }
}
