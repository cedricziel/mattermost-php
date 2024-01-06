<?php

namespace CedricZiel\MattermostPhp\Attachments;

/**
 * @see https://api.slack.com/docs/message-attachments
 * @see https://developers.mattermost.com/integrate/reference/message-attachments/
 */
class Attachment implements \JsonSerializable
{
    public function __construct(
        protected string $fallback,
        protected ?string $text = null,
        protected ?array $actions = null,
        protected ?string $color = null,
        protected ?string $pretext = null,
        protected ?string $authorName = null,
        protected ?string $authorIcon = null,
        protected ?string $authorLink = null,
        protected ?string $title = null,
        protected ?string $titleLink = null,
        protected ?array $fields = null,
        protected ?string $imageUrl = null,
        protected ?string $thumbUrl = null,
        protected ?string $footer = null,
        protected ?string $footerIcon = null,
    ) {
    }

    public static function create(string $fallback): static
    {
        return new static($fallback);
    }

    public function jsonSerialize(): mixed
    {
        $o = new \stdClass();

        if (is_array($this->actions) && count($this->actions) > 0) {
            $o->actions = array_map(function (Action $action) {
                return $action->jsonSerialize();
            }, $this->actions);
        }
        if ($this->fallback !== null) {
            $o->fallback = $this->fallback;
        }
        if ($this->color !== null) {
            $o->color = $this->color;
        }
        if ($this->pretext !== null) {
            $o->pretext = $this->pretext;
        }
        if ($this->text !== null) {
            $o->text = $this->text;
        }
        if ($this->authorName !== null) {
            $o->author_name = $this->authorName;
        }
        if ($this->authorIcon !== null) {
            $o->author_icon = $this->authorIcon;
        }
        if ($this->authorLink !== null) {
            $o->author_link = $this->authorLink;
        }
        if ($this->title !== null) {
            $o->title = $this->title;
        }
        if ($this->titleLink !== null) {
            $o->title_link = $this->titleLink;
        }
        if (is_array($this->fields) && count($this->fields) > 0) {
            $o->fields = array_map(function (Field $field) {
                return $field->jsonSerialize();
            }, $this->fields);
        }
        if ($this->imageUrl !== null) {
            $o->image_url = $this->imageUrl;
        }
        if ($this->thumbUrl !== null) {
            $o->thumb_url = $this->thumbUrl;
        }
        if ($this->footer !== null) {
            $o->footer = $this->footer;
        }
        if ($this->footerIcon !== null) {
            $o->footer_icon = $this->footerIcon;
        }

        return $o;
    }

    public function withPretext(string $pretext): static
    {
        $this->pretext = $pretext;

        return $this;
    }

    public function withText(string $string) : static
    {
        $this->text = $string;

        return $this;
    }

    public function addAction(Action $action) : static
    {
        $this->actions[] = $action;

        return $this;
    }

    public function withColor(string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function addField(Field $create): static
    {
        $this->fields[] = $create;

        return $this;
    }
}
