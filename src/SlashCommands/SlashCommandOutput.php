<?php

namespace CedricZiel\MattermostPhp\SlashCommands;

use CedricZiel\MattermostPhp\Attachments\Attachment;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

/**
 * @see https://developers.mattermost.com/integrate/slash-commands/custom/#response-parameters
 */
class SlashCommandOutput implements \JsonSerializable
{
    public function __construct(
        protected ?string                  $text = null,
        protected ?array                   $attachments = null,
        protected SlashCommandResponseType $responseType = SlashCommandResponseType::EPHEMERAL,
        protected ?string                  $username = null,
        protected ?string                  $channelId = null,
        protected ?string                  $iconUrl = null,
        protected ?string                  $gotoLocation = null,
        protected ?string                  $type = null,
        protected ?array                   $extraResponses = null,
        protected ?bool                    $skip_slack_parsing = null,
        protected ?\stdClass               $props = null,
    ) {
    }

    public function toResponse(): ResponseInterface
    {
        $body = json_encode($this->jsonSerialize());
        return new Response(
            200,
            [
                'Content-Type' => 'application/json',
            ],
            $body
        );
    }

    public function jsonSerialize(): \stdClass
    {
        $o = new \stdClass();
        if ($this->responseType !== null) {
            $o->response_type = $this->responseType;
        }

        if ($this->text !== null) {
            $o->text = $this->text;
        }

        if (is_array($this->attachments) && count($this->attachments) > 0) {
            $o->attachments = array_map(function (Attachment $attachment) {
                return $attachment->jsonSerialize();
            }, $this->attachments);
        }

        if ($this->username !== null) {
            $o->username = $this->username;
        }
        if ($this->channelId !== null) {
            $o->channel_id = $this->channelId;
        }
        if ($this->iconUrl !== null) {
            $o->icon_url = $this->iconUrl;
        }
        if ($this->gotoLocation !== null) {
            $o->goto_location = $this->gotoLocation;
        }
        if ($this->type !== null) {
            $o->type = $this->type;
        }
        if ($this->extraResponses !== null) {
            $o->extra_responses = array_map(function(SlashCommandOutput $response) {
                return $response->jsonSerialize();
            }, $this->extraResponses);
        }
        if ($this->skip_slack_parsing !== null) {
            $o->skip_slack_parsing = $this->skip_slack_parsing;
        }
        if ($this->props !== null) {
            $o->props = $this->props;
        }

        return $o;
    }

    public static function create(): self
    {
        return new self();
    }

    public function addAttachment(Attachment $attachment): static
    {
        $this->attachments[] = $attachment;

        return $this;
    }

    public function withText(string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function setResponseType(SlashCommandResponseType $responseType): static
    {
        $this->responseType = $responseType;

        return $this;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function setChannelId(string $channelId): static
    {
        $this->channelId = $channelId;

        return $this;
    }

    public function setIconUrl(string $iconUrl): static
    {
        $this->iconUrl = $iconUrl;

        return $this;
    }

    public function setGotoLocation(string $gotoLocation): static
    {
        $this->gotoLocation = $gotoLocation;

        return $this;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function addExtraResponse(SlashCommandOutput $o): static
    {
        if ($this->extraResponses === null) {
            $this->extraResponses = [];
        }

        $this->extraResponses[] = $o;

        return $this;
    }

    public function skipSlackParsing(): static
    {
        $this->skip_slack_parsing = true;

        return $this;
    }

    public function addProp(string $key, $value): static
    {
        if ($this->props === null) {
            $this->props = new \stdClass();
        }

        $this->props->{$key} = $value;

        return $this;
    }
}
