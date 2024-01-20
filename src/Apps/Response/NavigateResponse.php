<?php

namespace CedricZiel\MattermostPhp\Apps\Response;

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
