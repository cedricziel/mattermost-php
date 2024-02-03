<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetSamlMetadataFromIdpRequest
{
    public function __construct(
        /** The URL from which to retrieve the SAML IDP data. */
        public ?string $saml_metadata_url = null,
    ) {
    }
}
