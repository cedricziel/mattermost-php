<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Notice
{
    public function __construct(
        /** Notice ID */
        public ?string $id = null,
        /** Does this notice apply only to sysadmins */
        public ?bool $sysAdminOnly = null,
        /** Does this notice apply only to team admins */
        public ?bool $teamAdminOnly = null,
        /** Optional action to perform on action button click. (defaults to closing the notice) */
        public ?string $action = null,
        /**
         * Optional action parameter.
         * Example: {"action": "url", actionParam: "/console/some-page"}
         */
        public ?string $actionParam = null,
        /** Optional override for the action button text (defaults to OK) */
        public ?string $actionText = null,
        /** Notice content. Use {{Mattermost}} instead of plain text to support white-labeling. Text supports Markdown. */
        public ?string $description = null,
        /** URL of image to display */
        public ?string $image = null,
        /** Notice title. Use {{Mattermost}} instead of plain text to support white-labeling. Text supports Markdown. */
        public ?string $title = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            sysAdminOnly: isset($data['sysAdminOnly']) ? $data['sysAdminOnly'] : null,
            teamAdminOnly: isset($data['teamAdminOnly']) ? $data['teamAdminOnly'] : null,
            action: isset($data['action']) ? $data['action'] : null,
            actionParam: isset($data['actionParam']) ? $data['actionParam'] : null,
            actionText: isset($data['actionText']) ? $data['actionText'] : null,
            description: isset($data['description']) ? $data['description'] : null,
            image: isset($data['image']) ? $data['image'] : null,
            title: isset($data['title']) ? $data['title'] : null,
        );
        return $object;
    }
}
