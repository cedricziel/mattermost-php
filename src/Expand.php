<?php

namespace CedricZiel\MattermostPhp;

use Symfony\Component\Serializer\Attribute\SerializedName;

final readonly class Expand
{
    public function __construct(
        #[SerializedName('app')]
        protected ?ExpandLevel $app = null,
        #[SerializedName('acting_user')]
        protected ?ExpandLevel $actingUser = null,
        #[SerializedName('acting_user_access_token')]
        protected ?ExpandLevel $acting_user_access_token = null,
        #[SerializedName('locale')]
        protected ?ExpandLevel $locale = null,
        #[SerializedName('channel')]
        protected ?ExpandLevel $channel = null,
        #[SerializedName('channel_member')]
        protected ?ExpandLevel $channel_member = null,
        #[SerializedName('team')]
        protected ?ExpandLevel $team = null,
        #[SerializedName('team_member')]
        protected ?ExpandLevel $team_member = null,
        #[SerializedName('post')]
        protected ?ExpandLevel $post = null,
        #[SerializedName('root_post')]
        protected ?ExpandLevel $root_post = null,
        #[SerializedName('user')]
        protected ?ExpandLevel $user = null,
        #[SerializedName('oauth2_app')]
        protected ?ExpandLevel $oauth2_app = null,
        #[SerializedName('oauth2_user')]
        protected ?ExpandLevel $oauth2_user = null,
    ) {
    }

    public function getApp(): ?ExpandLevel
    {
        return $this->app;
    }

    public function getActingUser(): ?ExpandLevel
    {
        return $this->actingUser;
    }

    public function getActingUserAccessToken(): ?ExpandLevel
    {
        return $this->acting_user_access_token;
    }

    public function getLocale(): ?ExpandLevel
    {
        return $this->locale;
    }

    public function getChannel(): ?ExpandLevel
    {
        return $this->channel;
    }

    public function getChannelMember(): ?ExpandLevel
    {
        return $this->channel_member;
    }

    public function getTeam(): ?ExpandLevel
    {
        return $this->team;
    }

    public function getTeamMember(): ?ExpandLevel
    {
        return $this->team_member;
    }

    public function getPost(): ?ExpandLevel
    {
        return $this->post;
    }

    public function getRootPost(): ?ExpandLevel
    {
        return $this->root_post;
    }

    public function getUser(): ?ExpandLevel
    {
        return $this->user;
    }

    public function getOauth2App(): ?ExpandLevel
    {
        return $this->oauth2_app;
    }

    public function getOauth2User(): ?ExpandLevel
    {
        return $this->oauth2_user;
    }
}
