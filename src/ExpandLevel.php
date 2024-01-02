<?php

namespace CedricZiel\MattermostPhp;

enum ExpandLevel: string
{
    case none = 'none';
    case all = 'all';
    case summary = 'summary';
    case id = 'id';
}
