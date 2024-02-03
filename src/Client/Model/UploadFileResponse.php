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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            file_infos: isset($data['file_infos']) ? $data['file_infos'] : null,
            client_ids: isset($data['client_ids']) ? $data['client_ids'] : null,
        );
        return $object;
    }
}
