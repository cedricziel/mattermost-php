<?php

namespace CedricZiel\MattermostPhp\Apps\Response;

use CedricZiel\MattermostPhp\Apps\Forms\Form;

class FormResponse extends CallResponse
{
    public function __construct(
        Form $form
    ) {
        parent::__construct(
            type: CallResponse::TYPE_FORM,
            form: $form,
        );
    }
}
