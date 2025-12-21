<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreatePlaybookRunFromPostRequest
{
    public function __construct(
        /** The name of the playbook run. */
        public string $name,
        /** The identifier of the user who is commanding the playbook run. */
        public string $owner_user_id,
        /** The identifier of the team where the playbook run's channel is in. */
        public string $team_id,
        /** The identifier of the playbook with from which this playbook run was created. */
        public string $playbook_id,
        /** The description of the playbook run. */
        public ?string $description = null,
        /** If the playbook run was created from a post, this field contains the identifier of such post. If not, this field is empty. */
        public ?string $post_id = null,
    ) {
    }
}
