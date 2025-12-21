<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Client;

use Psr\Http\Message\ResponseInterface;

trait StreamingResponseTrait
{
    /**
     * Stream response body directly to a file.
     *
     * This is more memory-efficient than reading the entire response into memory
     * when dealing with large files.
     *
     * @param ResponseInterface $response The HTTP response to stream
     * @param string $path The file path to write to
     * @param int $chunkSize Size of chunks to read at a time (default: 8KB)
     * @throws \RuntimeException If the file cannot be opened or written
     */
    protected function streamToFile(ResponseInterface $response, string $path, int $chunkSize = 8192): void
    {
        $handle = fopen($path, 'wb');
        if ($handle === false) {
            throw new \RuntimeException(sprintf('Cannot open file for writing: %s', $path));
        }

        try {
            $body = $response->getBody();
            while (!$body->eof()) {
                $chunk = $body->read($chunkSize);
                if (fwrite($handle, $chunk) === false) {
                    throw new \RuntimeException(sprintf('Failed to write to file: %s', $path));
                }
            }
        } finally {
            fclose($handle);
        }
    }

    /**
     * Stream response body to a callback function.
     *
     * Useful for custom processing of large responses (e.g., progress tracking,
     * on-the-fly processing, forwarding to another stream).
     *
     * @param ResponseInterface $response The HTTP response to stream
     * @param callable(string): void $callback Function to call with each chunk
     * @param int $chunkSize Size of chunks to read at a time (default: 8KB)
     */
    protected function streamToCallback(ResponseInterface $response, callable $callback, int $chunkSize = 8192): void
    {
        $body = $response->getBody();
        while (!$body->eof()) {
            $chunk = $body->read($chunkSize);
            $callback($chunk);
        }
    }

    /**
     * Stream response body to a PSR-7 stream.
     *
     * @param ResponseInterface $response The HTTP response to stream
     * @param \Psr\Http\Message\StreamInterface $targetStream The target stream to write to
     * @param int $chunkSize Size of chunks to read at a time (default: 8KB)
     */
    protected function streamToStream(
        ResponseInterface $response,
        \Psr\Http\Message\StreamInterface $targetStream,
        int $chunkSize = 8192
    ): void {
        $body = $response->getBody();
        while (!$body->eof()) {
            $chunk = $body->read($chunkSize);
            $targetStream->write($chunk);
        }
    }
}
