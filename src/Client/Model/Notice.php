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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
            if (isset($data['id'])) $this->id = $data['id'];
        /** @var bool $data['sysAdminOnly'] */
            if (isset($data['sysAdminOnly'])) $this->sysAdminOnly = $data['sysAdminOnly'];
        /** @var bool $data['teamAdminOnly'] */
            if (isset($data['teamAdminOnly'])) $this->teamAdminOnly = $data['teamAdminOnly'];
        /** @var string $data['action'] */
            if (isset($data['action'])) $this->action = $data['action'];
        /** @var string $data['actionParam'] */
            if (isset($data['actionParam'])) $this->actionParam = $data['actionParam'];
        /** @var string $data['actionText'] */
            if (isset($data['actionText'])) $this->actionText = $data['actionText'];
        /** @var string $data['description'] */
            if (isset($data['description'])) $this->description = $data['description'];
        /** @var string $data['image'] */
            if (isset($data['image'])) $this->image = $data['image'];
        /** @var string $data['title'] */
            if (isset($data['title'])) $this->title = $data['title'];
        return $this;
    }
}
