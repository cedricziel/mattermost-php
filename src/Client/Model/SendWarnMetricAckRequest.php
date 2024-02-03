<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SendWarnMetricAckRequest
{
    public function __construct(
        /** Flag which determines if the ack for the metric warning should be directly stored (without trying to send email first) or not */
        public ?bool $forceAck = null,
    ) {
    }
}
