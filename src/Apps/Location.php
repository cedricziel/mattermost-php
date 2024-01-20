<?php

namespace CedricZiel\MattermostPhp\Apps;

enum Location: string
{
    case channel_header = '/channel_header';
    case post_menu = '/post_menu';
    case command = '/command';
    case in_post = '/in_post';
}
