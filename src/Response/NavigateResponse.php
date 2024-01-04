<?php

namespace CedricZiel\MattermostPhp\Response;

class NavigateResponse extends CallResponse
{
    public function __construct(
        string $url,
    ) {
        parent::__construct(
            type: CallResponse::TYPE_NAVIGATE,
            navigateToUrl: $url,
        );
    }
}
