<?php

namespace CedricZiel\MattermostPhp\Apps\Events;

use CedricZiel\MattermostPhp\Apps\MattermostApp;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class OnManifestRequestEvent
{
    public function __construct(
        protected MattermostApp $app,
        protected ServerRequestInterface $request,
        protected ResponseInterface $response,
    ) {
    }

    public function getApp(): MattermostApp
    {
        return $this->app;
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
