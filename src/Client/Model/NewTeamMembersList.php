<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class NewTeamMembersList
{
    public function __construct(
        /** Indicates if there is another page of new team members that can be fetched. */
        public ?bool $has_next = null,
        /** List of new team members. */
        public ?array $items = null,
        /** The total count of new team members for the given time range. */
        public ?int $total_count = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return NewTeamMembersList The hydrated instance
     */
    public static function hydrate(?array $data): NewTeamMembersList
    {
        $data ??= [];

        return new self(
            has_next: $data['has_next'] ?? null,
            items: $data['items'] ?? null,
            total_count: $data['total_count'] ?? null,
        );
    }
}
