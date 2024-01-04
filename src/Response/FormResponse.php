<?php

namespace CedricZiel\MattermostPhp\Response;

use App\Mattermost\Form\Form;

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
