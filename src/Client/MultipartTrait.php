<?php

namespace CedricZiel\MattermostPhp\Client;

use GuzzleHttp\Psr7\MultipartStream;
use Psr\Http\Message\StreamInterface;

trait MultipartTrait
{
    /**
     * Create a multipart stream from an array of form fields.
     *
     * @param array<string, mixed> $fields Array of field name => value pairs
     *        Values can be:
     *        - string: raw content
     *        - resource: file handle
     *        - StreamInterface: PSR-7 stream
     *        - array with 'contents' key and optional 'filename', 'headers' keys
     * @return array{stream: StreamInterface, boundary: string}
     */
    protected function createMultipartStream(array $fields): array
    {
        $elements = [];
        foreach ($fields as $name => $value) {
            if ($value === null) {
                continue;
            }

            if (is_array($value) && isset($value['contents'])) {
                $elements[] = $value;
            } else {
                $elements[] = [
                    'name' => $name,
                    'contents' => $value,
                ];
            }
        }

        $stream = new MultipartStream($elements);

        return [
            'stream' => $stream,
            'boundary' => $stream->getBoundary(),
        ];
    }
}
