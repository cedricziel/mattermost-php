<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreatePlaybookRequest
{
    public function __construct(
        /** The title of the playbook. */
        public string $title,
        /** The identifier of the team where the playbook is in. */
        public string $team_id,
        /** A boolean indicating whether the playbook runs created from this playbook should be public or private. */
        public bool $create_public_playbook_run,
        /** The stages defined by this playbook. */
        public array $checklists,
        /** The identifiers of all the users that are members of this playbook. */
        public array $member_ids,
        /** The description of the playbook. */
        public ?string $description = null,
        /** A boolean indicating whether the playbook is licensed as public or private. Required 'true' for free tier. */
        public ?bool $public = null,
        /** The IDs of the channels where all the status updates will be broadcasted. The team of the broadcast channel must be the same as the playbook's team. */
        public ?array $broadcast_channel_ids = null,
        /** A list with the IDs of the members to be automatically invited to the playbook run's channel as soon as the playbook run is created. */
        public ?array $invited_user_ids = null,
        /** Boolean that indicates whether the members declared in invited_user_ids will be automatically invited. */
        public ?bool $invite_users_enabled = null,
        /** User ID of the member that will be automatically assigned as owner as soon as the playbook run is created. If the member is not part of the playbook run's channel or is not included in the invited_user_ids list, they will be automatically invited to the channel. */
        public ?string $default_owner_id = null,
        /** Boolean that indicates whether the member declared in default_owner_id will be automatically assigned as owner. */
        public ?string $default_owner_enabled = null,
        /** ID of the channel where the playbook run will be automatically announced as soon as the playbook run is created. */
        public ?string $announcement_channel_id = null,
        /** Boolean that indicates whether the playbook run creation will be announced in the channel declared in announcement_channel_id. */
        public ?bool $announcement_channel_enabled = null,
        /** An absolute URL where a POST request will be sent as soon as the playbook run is created. The allowed protocols are HTTP and HTTPS. */
        public ?string $webhook_on_creation_url = null,
        /** Boolean that indicates whether the webhook declared in webhook_on_creation_url will be automatically sent. */
        public ?bool $webhook_on_creation_enabled = null,
        /** An absolute URL where a POST request will be sent as soon as the playbook run's status is updated. The allowed protocols are HTTP and HTTPS. */
        public ?string $webhook_on_status_update_url = null,
        /** Boolean that indicates whether the webhook declared in webhook_on_status_update_url will be automatically sent. */
        public ?bool $webhook_on_status_update_enabled = null,
    ) {
    }
}
