<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Notice
{
    /** Notice ID */
    public ?string $id;

    /** Does this notice apply only to sysadmins */
    public ?bool $sysAdminOnly;

    /** Does this notice apply only to team admins */
    public ?bool $teamAdminOnly;

    /** Optional action to perform on action button click. (defaults to closing the notice) */
    public ?string $action;

    /**
     * Optional action parameter.
     * Example: {"action": "url", actionParam: "/console/some-page"}
     */
    public ?string $actionParam;

    /** Optional override for the action button text (defaults to OK) */
    public ?string $actionText;

    /** Notice content. Use {{Mattermost}} instead of plain text to support white-labeling. Text supports Markdown. */
    public ?string $description;

    /** URL of image to display */
    public ?string $image;

    /** Notice title. Use {{Mattermost}} instead of plain text to support white-labeling. Text supports Markdown. */
    public ?string $title;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->id = $data['id'];
        $this->sysAdminOnly = $data['sysAdminOnly'];
        $this->teamAdminOnly = $data['teamAdminOnly'];
        $this->action = $data['action'];
        $this->actionParam = $data['actionParam'];
        $this->actionText = $data['actionText'];
        $this->description = $data['description'];
        $this->image = $data['image'];
        $this->title = $data['title'];
        return $this;
    }
}
