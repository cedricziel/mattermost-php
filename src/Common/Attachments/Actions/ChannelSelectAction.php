<?php

namespace CedricZiel\MattermostPhp\Common\Attachments\Actions;

use CedricZiel\MattermostPhp\Common\Attachments\Action;

class ChannelSelectAction extends Action
{
    protected string $dataSource = 'channels';
    protected string $type = 'select';

    public function __construct(
        string $id,
        string $name,
        ActionIntegration $integration,
    ) {
        parent::__construct($id, $name, $integration);
    }

    public static function create(string $id, string $name, ActionIntegration $integration): self
    {
        return new self($id, $name, $integration);
    }

    public function jsonSerialize(): \stdClass
    {
        $o = parent::jsonSerialize();

        $o->data_source = $this->dataSource;
        $o->type = $this->type;

        return $o;
    }
}
