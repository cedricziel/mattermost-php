<?php

namespace CedricZiel\MattermostPhp\Apps\Forms;

use CedricZiel\MattermostPhp\Apps\Call;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Form
{
    public function __construct(
        #[SerializedName('source')]
        protected readonly Call $source,
        #[SerializedName('title')]
        protected readonly string $title,
        #[SerializedName('header')]
        protected readonly string $header,
        #[SerializedName('footer')]
        protected readonly string $footer,
        #[SerializedName('submit')]
        protected readonly Call $submit,
        #[SerializedName('submit_buttons')]
        protected readonly string $submitButtons,
        #[SerializedName('fields')]
        protected readonly array $fields,
    ) {}
}
