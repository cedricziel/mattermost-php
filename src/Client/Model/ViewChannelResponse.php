<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ViewChannelResponse
{
    public function __construct(
        /** Value should be "OK" if successful */
        public ?string $status = null,
        /** A JSON object mapping channel IDs to the channel view times */
        public ?\stdClass $last_viewed_at_times = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            status: isset($data['status']) ? $data['status'] : null,
            last_viewed_at_times: isset($data['last_viewed_at_times']) ? (object) $data['last_viewed_at_times'] : null,
        );
        return $object;
    }
}
