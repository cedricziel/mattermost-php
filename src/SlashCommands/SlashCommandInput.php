<?php

namespace CedricZiel\MattermostPhp\SlashCommands;

use Psr\Http\Message\ServerRequestInterface;

/**
 * channel_id=fukxanjgjbnp7ng383at53k1sy&
 * channel_name=town-square&
 * command=%2Fweather&
 * response_url=http%3A%2F%2Flocalhost%3A8066%2Fhooks%2Fcommands%2Fi11f6nnfgfyk8eg56x9omc6dpa&
 * team_domain=team-awesome&
 * team_id=wx4zz8t4ttgmtxqiwfohijayzc&
 * text=toronto+week&
 * token=qzgakf1nx3yt9dr4n8585ihbxy&
 * trigger_id=ZWZ5ZjRndzR4YmJxOHJlZWh4MXpkaHozbnI6ZXJqNnFjazNyZmd0dWpzODZ3NXI2cmNremg6MTY2MjA0MTY5Njg5NjpNRVFDSUQ5cTZ3MkRHU1RaNjhyaDh1TGl1STlSVHh2R1czSXZ5aGVRYjhkWThuZnlBaUI2YnlPR2ZpWlczR1FmVkdIODlreEp4MmlVT0UxMm9LMjlkZ1d0RC8xbjZRPT0%3D&
 * user_id=erj6qck3rfgtujs86w5r6rckzh&
 * user_name=alan
 *
 * @see https://developers.mattermost.com/integrate/slash-commands/custom/
 */
class SlashCommandInput
{
    public function __construct(
        protected string                  $channelId,
        protected string                  $channelName,
        protected string                  $command,
        protected string                  $responseUrl,
        protected string                  $teamDomain,
        protected string                  $teamId,
        protected string                  $text,
        protected string                  $token,
        protected string                  $triggerId,
        protected string                  $userId,
        protected string                  $userName,
        protected ?ServerRequestInterface $request,
        protected ?\stdClass              $context = null,
    ) {
    }

    public static function fromRequest(string $command, ServerRequestInterface $request): SlashCommandInput
    {
        $body = $request->getParsedBody();

        if (is_array($body)) {

            // fix for parsers that dont parse the context as object
            if (array_key_exists('context', $body) && is_array($body['context'])) {
                $body['context'] = (object) $body['context'];
            }

            return new self(
                channelId: $body['channel_id'] ?? '',
                channelName: $body['channel_name'] ?? '',
                command: $body['command'] ?? '',
                responseUrl: $body['response_url'] ?? '',
                teamDomain: $body['team_domain'] ?? '',
                teamId: $body['team_id'] ?? '',
                text: $body['text'] ?? '',
                token: $body['token'] ?? '',
                triggerId: $body['trigger_id'] ?? '',
                userId: $body['user_id'] ?? '',
                userName: $body['user_name'] ?? '',
                request: $request,
                context: $body['context'] ?? null,
            );
        } elseif (is_object($body)) {
            return new self(
                channelId: $body->channel_id ?? '',
                channelName: $body->channel_name ?? '',
                command: $body->command ?? '',
                responseUrl: $body->response_url ?? '',
                teamDomain: $body->team_domain ?? '',
                teamId: $body->team_id ?? '',
                text: $body->text ?? '',
                token: $body->token ?? '',
                triggerId: $body->trigger_id ?? '',
                userId: $body->user_id ?? '',
                userName: $body->user_name ?? '',
                request: $request,
                context: $body->context ?? null,
            );
        } else {
            return new self(
                channelId: '',
                channelName: '',
                command: '',
                responseUrl: '',
                teamDomain: '',
                teamId: '',
                text: '',
                token: '',
                triggerId: '',
                userId: '',
                userName: '',
                request: $request,
                context: null,
            );
        }
    }

    public function getChannelId(): string
    {
        return $this->channelId;
    }

    public function getChannelName(): string
    {
        return $this->channelName;
    }

    public function getCommand(): string
    {
        return $this->command;
    }

    public function getResponseUrl(): string
    {
        return $this->responseUrl;
    }

    public function getTeamDomain(): string
    {
        return $this->teamDomain;
    }

    public function getTeamId(): string
    {
        return $this->teamId;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getTriggerId(): string
    {
        return $this->triggerId;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function getContext(): ?\stdClass
    {
        return $this->context;
    }

    public function getRequest(): ?ServerRequestInterface
    {
        return $this->request;
    }

    public function getParameters(): string
    {
        return $this->parameters;
    }
}
