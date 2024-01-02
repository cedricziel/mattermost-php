<?php

namespace CedricZiel\MattermostPhp;

use Symfony\Component\Serializer\Attribute\SerializedName;

class Expand
{
    public function __construct(
        #[SerializedName('app')]
        public readonly ExpandLevel $app,
        #[SerializedName('acting_user')]
        public readonly ExpandLevel $actingUser,
        #[SerializedName('acting_user_access_token')]
        public readonly ExpandLevel $acting_user_access_token,
        #[SerializedName('locale')]
        public readonly ExpandLevel $locale,
        #[SerializedName('channel')]
        public readonly ExpandLevel $channel,
        #[SerializedName('channel_member')]
        public readonly ExpandLevel $channel_member,
        #[SerializedName('team')]
        public readonly ExpandLevel $team,
        #[SerializedName('team_member')]
        public readonly ExpandLevel $team_member,
        #[SerializedName('post')]
        public readonly ExpandLevel $post,
        #[SerializedName('root_post')]
        public readonly ExpandLevel $root_post,
        #[SerializedName('user')]
        public readonly ExpandLevel $user,
        #[SerializedName('oauth2_app')]
        public readonly ExpandLevel $oauth2_app,
        #[SerializedName('oauth2_user')]
        public readonly ExpandLevel $oauth2_user,
    ) {
    }
}
