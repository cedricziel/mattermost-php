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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): CELExpression {
        $object = new self(
            expression: isset($data['expression']) ? $data['expression'] : null,
            channelId: isset($data['channelId']) ? $data['channelId'] : null,
        );
        return $object;
    }
}
