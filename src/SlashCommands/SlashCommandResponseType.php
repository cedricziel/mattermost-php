<?php

namespace CedricZiel\MattermostPhp\SlashCommands;

enum SlashCommandResponseType : string
{
    case IN_CHANNEL = 'in_channel';
    case EPHEMERAL = 'ephemeral';
}
