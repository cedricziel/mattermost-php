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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ViewChannelResponse The hydrated instance
     */
    public static function hydrate(?array $data): ViewChannelResponse
    {
        $data ??= [];

        return new self(
            status: $data['status'] ?? null,
            last_viewed_at_times: isset($data['last_viewed_at_times']) ? (object) $data['last_viewed_at_times'] : null,
        );
    }
}
