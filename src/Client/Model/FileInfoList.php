<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class FileInfoList
{
    public ?array $order;
    public ?\stdClass $file_infos;

    /** The ID of next file info. Not omitted when empty or not relevant. */
    public ?string $next_file_id;

    /** The ID of previous file info. Not omitted when empty or not relevant. */
    public ?string $prev_file_id;
}
