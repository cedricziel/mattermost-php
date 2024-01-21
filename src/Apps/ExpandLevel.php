<?php

namespace CedricZiel\MattermostPhp\Apps;

enum ExpandLevel: string
{
    case none = 'none';
    case all = 'all';
    case summary = 'summary';
    case id = 'id';
}
