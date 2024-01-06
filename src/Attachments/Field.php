<?php

namespace CedricZiel\MattermostPhp\Attachments;

/**
 * @see https://developers.mattermost.com/integrate/reference/message-attachments/#fields
 */
class Field implements \JsonSerializable
{
    public function __construct(
        protected string $title,
        protected string $value,
        protected bool $short = false,
    ) {
    }

    public function jsonSerialize(): \stdClass
    {
        $o = new \stdClass();
        if ($this->title !== null) {
            $o->title = $this->title;
        }
        if ($this->value !== null) {
            $o->value = $this->value;
        }
        if ($this->short !== null) {
            $o->short = $this->short;
        }
        return $o;
    }
}
