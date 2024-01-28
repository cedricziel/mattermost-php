<?php

namespace CedricZiel\MattermostPhp;

class Client
{
    use Client\ClientTrait;

    public function __construct(
        protected string $baseUrl,
        protected ?string $token = null,
        protected ?\Psr\Http\Client\ClientInterface $httpClient = null,
        protected ?\Psr\Http\Message\RequestFactoryInterface $requestFactory = null,
        protected ?\Psr\Http\Message\StreamFactoryInterface $streamFactory = null,
    ) {
        $this->httpClient = $httpClient ?? \Http\Discovery\Psr18ClientDiscovery::find();
        $this->requestFactory = $requestFactory ?? \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactory = $streamFactory ?? \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
    }

    public function users(): Client\Endpoint\UsersEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\UsersEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function bots(): Client\Endpoint\BotsEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\BotsEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function teams(): Client\Endpoint\TeamsEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\TeamsEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function channels(): Client\Endpoint\ChannelsEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\ChannelsEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function posts(): Client\Endpoint\PostsEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\PostsEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function threads(): Client\Endpoint\ThreadsEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\ThreadsEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function files(): Client\Endpoint\FilesEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\FilesEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function uploads(): Client\Endpoint\UploadsEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\UploadsEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function preferences(): Client\Endpoint\PreferencesEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\PreferencesEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function status(): Client\Endpoint\StatusEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\StatusEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function emoji(): Client\Endpoint\EmojiEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\EmojiEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function reactions(): Client\Endpoint\ReactionsEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\ReactionsEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function webhooks(): Client\Endpoint\WebhooksEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\WebhooksEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function commands(): Client\Endpoint\CommandsEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\CommandsEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function system(): Client\Endpoint\SystemEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\SystemEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function brand(): Client\Endpoint\BrandEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\BrandEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function oAuth(): Client\Endpoint\OAuthEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\OAuthEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function sAML(): Client\Endpoint\SAMLEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\SAMLEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function lDAP(): Client\Endpoint\LDAPEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\LDAPEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function groups(): Client\Endpoint\GroupsEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\GroupsEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function compliance(): Client\Endpoint\ComplianceEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\ComplianceEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function cluster(): Client\Endpoint\ClusterEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\ClusterEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function cloud(): Client\Endpoint\CloudEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\CloudEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function elasticsearch(): Client\Endpoint\ElasticsearchEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\ElasticsearchEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function bleve(): Client\Endpoint\BleveEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\BleveEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function dataRetention(): Client\Endpoint\DataRetentionEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\DataRetentionEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function jobs(): Client\Endpoint\JobsEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\JobsEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function plugins(): Client\Endpoint\PluginsEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\PluginsEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function roles(): Client\Endpoint\RolesEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\RolesEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function schemes(): Client\Endpoint\SchemesEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\SchemesEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function integration_actions(): Client\Endpoint\Integration_actionsEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\Integration_actionsEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function sharedChannels(): Client\Endpoint\SharedChannelsEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\SharedChannelsEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function termsOfService(): Client\Endpoint\TermsOfServiceEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\TermsOfServiceEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function imports(): Client\Endpoint\ImportsEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\ImportsEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function permissions(): Client\Endpoint\PermissionsEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\PermissionsEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function exports(): Client\Endpoint\ExportsEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\ExportsEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }

    public function usage(): Client\Endpoint\UsageEndpoint
    {
        return new \CedricZiel\MattermostPhp\Client\Endpoint\UsageEndpoint($this->baseUrl, $this->token, $this->httpClient, $this->requestFactory, $this->streamFactory);
    }
}
