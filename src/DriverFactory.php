<?php

namespace CedricZiel\MattermostPhp;

use Gnello\Mattermost\Driver;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

class DriverFactory
{

    public static function fromRequest(
        Request $mmRequest,
        ClientInterface $client,
        RequestFactoryInterface $requestFactory,
        StreamFactoryInterface $streamFactory
    ) : Driver {
        $host = parse_url($mmRequest->getContext()->getMattermostSiteUrl(), PHP_URL_HOST);
        $scheme = parse_url($mmRequest->getContext()->getMattermostSiteUrl(), PHP_URL_SCHEME);

        return new Driver(
            $client,
            $requestFactory,
            $streamFactory,
            [
                'scheme' => $scheme,
                'url' => $host,
                'token' => $mmRequest->getContext()->getBotAccessToken(),
            ],
        );
    }
}
