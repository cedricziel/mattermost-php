<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class RegisterTermsOfServiceActionRequest
{
    public function __construct(
        /** terms of service ID on which the user is acting on */
        public string $serviceTermsId,
        /** true or false, indicates whether the user accepted or rejected the terms of service. */
        public string $accepted,
    ) {
    }
}
