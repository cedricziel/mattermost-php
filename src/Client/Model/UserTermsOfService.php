<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserTermsOfService
{
    public function __construct(
        /** The unique identifier of the user who performed this terms of service action. */
        public ?string $user_id = null,
        /** The unique identifier of the terms of service the action was performed on. */
        public ?string $terms_of_service_id = null,
        /** The time in milliseconds that this action was performed. */
        public ?int $create_at = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            user_id: isset($data['user_id']) ? $data['user_id'] : null,
            terms_of_service_id: isset($data['terms_of_service_id']) ? $data['terms_of_service_id'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
        );
        return $object;
    }
}
