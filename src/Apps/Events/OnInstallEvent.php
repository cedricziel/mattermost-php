<?php

namespace CedricZiel\MattermostPhp\Apps\Events;

use CedricZiel\MattermostPhp\Apps\MattermostApp;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class OnInstallEvent
{
    public function __construct(
        protected MattermostApp $param,
        protected ServerRequestInterface $request,
        protected ResponseInterface $response
    ) {
    }

    public function getParam(): MattermostApp
    {
        return $this->param;
    }

    public function getRequest(): ServerRequestInterface
    {
        return $this->request;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
