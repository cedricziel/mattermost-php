<?php

namespace CedricZiel\MattermostPhp;

use CedricZiel\MattermostPhp\Apps\ChannelMember;
use CedricZiel\MattermostPhp\Apps\Team;
use CedricZiel\MattermostPhp\Apps\TeamMember;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Context
{
    public function __construct(
        #[SerializedName('mattermost_site_url')]
        protected readonly string $mattermost_site_url,
        #[SerializedName('bot_user_id')]
        protected readonly ?string $bot_user_id,
        #[SerializedName('bot_access_token')]
        protected readonly ?string $bot_access_token,
        #[SerializedName('subject')]
        protected readonly ?string $subject = null,
        #[SerializedName('channel_id')]
        protected readonly ?string $channel_id = null,
        #[SerializedName('team_id')]
        protected readonly ?string $team_id = null,
        #[SerializedName('post_id')]
        protected readonly ?string $post_id = null,
        #[SerializedName('root_post_id')]
        protected readonly ?string $root_post_id = null,
        #[SerializedName('app_id')]
        protected readonly ?string $app_id = null,
        #[SerializedName('location')]
        protected readonly ?string $location = null,
        #[SerializedName('user_agent')]
        protected readonly ?string        $user_agent = null,
        #[SerializedName('track_as_submit')]
        protected readonly ?bool          $track_as_submit = null,
        #[SerializedName('developer_mode')]
        protected readonly ?bool          $developer_mode  = false,
        #[SerializedName('app_path')]
        protected readonly ?string        $app_path = null,
        #[SerializedName('app')]
        protected readonly ?App           $app = null,
        #[SerializedName('acting_user')]
        protected readonly ?User          $acting_user = null,
        #[SerializedName('acting_user_access_token')]
        protected readonly ?string        $acting_user_access_token = null,
        #[SerializedName('locale')]
        protected readonly ?string        $locale = null,
        #[SerializedName('channel')]
        protected readonly ?Channel       $channel = null,
        #[SerializedName('channel_member')]
        protected readonly ?ChannelMember $channel_member = null,
        #[SerializedName('team')]
        protected readonly ?Team          $team = null,
        #[SerializedName('team_member')]
        protected readonly ?TeamMember $team_member = null,
        #[SerializedName('post')]
        protected readonly ?\CedricZiel\MattermostPhp\Client\Model\Post $post = null,
        #[SerializedName('post')]
        protected readonly ?\CedricZiel\MattermostPhp\Client\Model\Post $root_post = null,
        #[SerializedName('user')]
        protected readonly ?User $user = null,
        /**
         * @var User[]
         */
        protected readonly ?array $mentioned = null,
        #[SerializedName('oauth2')]
        protected readonly OAuth2Context $oauth2 = new OAuth2Context(),
    ){
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function getChannelId(): ?string
    {
        return $this->channel_id;
    }

    public function getTeamId(): ?string
    {
        return $this->team_id;
    }

    public function getPostId(): ?string
    {
        return $this->post_id;
    }

    public function getRootPostId(): ?string
    {
        return $this->root_post_id;
    }

    public function getAppId(): string
    {
        return $this->app_id;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function getUserAgent(): ?string
    {
        return $this->user_agent;
    }

    public function getTrackAsSubmit(): ?bool
    {
        return $this->track_as_submit;
    }

    public function getMattermostSiteUrl(): string
    {
        return $this->mattermost_site_url;
    }

    public function getDeveloperMode(): ?bool
    {
        return $this->developer_mode;
    }

    public function getAppPath(): string
    {
        return $this->app_path;
    }

    public function getBotUserId(): string
    {
        return $this->bot_user_id;
    }

    public function getBotAccessToken(): ?string
    {
        return $this->bot_access_token;
    }

    public function getApp(): ?App
    {
        return $this->app;
    }

    public function getActingUser(): ?User
    {
        return $this->acting_user;
    }

    public function getActingUserAccessToken(): ?string
    {
        return $this->acting_user_access_token;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function getChannel(): ?Channel
    {
        return $this->channel;
    }

    public function getChannelMember(): ?ChannelMember
    {
        return $this->channel_member;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function getTeamMember(): ?TeamMember
    {
        return $this->team_member;
    }

    public function getPost(): ?\CedricZiel\MattermostPhp\Client\Model\Post
    {
        return $this->post;
    }

    public function getRootPost(): ?\CedricZiel\MattermostPhp\Client\Model\Post
    {
        return $this->root_post;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function getMentioned(): ?array
    {
        return $this->mentioned;
    }

    public function getOauth2(): OAuth2Context
    {
        return $this->oauth2;
    }
}
