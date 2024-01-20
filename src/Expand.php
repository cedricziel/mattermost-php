<?php

namespace CedricZiel\MattermostPhp;

use CedricZiel\MattermostPhp\Apps\ExpandLevel;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class Expand implements \JsonSerializable
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

    public static function create(): self
    {
        return new self();
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

    public function jsonSerialize(): mixed
    {
        $o = new \stdClass();

        if ($this->app !== null) {
            $o->app = $this->app;
        }

        if ($this->actingUser !== null) {
            $o->acting_user = $this->actingUser;
        }

        if ($this->acting_user_access_token !== null) {
            $o->acting_user_access_token = $this->acting_user_access_token;
        }

        if ($this->locale !== null) {
            $o->locale = $this->locale;
        }

        if ($this->channel !== null) {
            $o->channel = $this->channel;
        }

        if ($this->channel_member !== null) {
            $o->channel_member = $this->channel_member;
        }

        if ($this->team !== null) {
            $o->team = $this->team;
        }

        if ($this->team_member !== null) {
            $o->team_member = $this->team_member;
        }

        if ($this->post !== null) {
            $o->post = $this->post;
        }

        if ($this->root_post !== null) {
            $o->root_post = $this->root_post;
        }

        if ($this->user !== null) {
            $o->user = $this->user;
        }

        if ($this->oauth2_app !== null) {
            $o->oauth2_app = $this->oauth2_app;
        }

        if ($this->oauth2_user !== null) {
            $o->oauth2_user = $this->oauth2_user;
        }

        return $o;
    }

    public function withApp(ExpandLevel $expandLevel): Expand
    {
        $this->app = $expandLevel;

        return $this;
    }

    public function withActingUser(ExpandLevel $expandLevel): Expand
    {
        $this->actingUser = $expandLevel;

        return $this;
    }

    public function withTeam(ExpandLevel $expandLevel): Expand
    {
        $this->team = $expandLevel;

        return $this;
    }

    public function withChannel(ExpandLevel $expandLevel): Expand
    {
        $this->channel = $expandLevel;

        return $this;
    }

    public function withUser(ExpandLevel $expandLevel): Expand
    {
        $this->user = $expandLevel;

        return $this;
    }
}
