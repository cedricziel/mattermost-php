<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Request body for Microsoft Intune MAM authentication using Azure AD/Entra ID access token
 */
class IntuneLoginRequest
{
    public function __construct(
        /** Microsoft Entra ID access token obtained via MSAL (Microsoft Authentication Library). This token must be scoped to the Intune MAM app registration and will be validated against the configured tenant. */
        public ?string $access_token = null,
        /** Optional mobile device identifier used for push notifications. If provided, the device will be registered for receiving push notifications. */
        public ?string $device_id = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): IntuneLoginRequest {
        $object = new self(
            access_token: isset($data['access_token']) ? $data['access_token'] : null,
            device_id: isset($data['device_id']) ? $data['device_id'] : null,
        );
        return $object;
    }
}
