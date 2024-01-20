<?php

namespace CedricZiel\MattermostPhp\Apps\Response;

class ErrorResponse extends CallResponse
{
    public function __construct(
        public readonly string $error,
    ) {
        parent::__construct(
            type: CallResponse::TYPE_ERROR,
            text: $error,
        );
    }
}
