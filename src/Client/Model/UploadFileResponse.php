<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UploadFileResponse
{
    public function __construct(
        /** A list of file metadata that has been stored in the database */
        public ?array $file_infos = null,
        /** A list of the client_ids that were provided in the request */
        public ?array $client_ids = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return UploadFileResponse The hydrated instance
     */
    public static function hydrate(?array $data): UploadFileResponse
    {
        $data ??= [];

        return new self(
            file_infos: $data['file_infos'] ?? null,
            client_ids: $data['client_ids'] ?? null,
        );
    }
}
