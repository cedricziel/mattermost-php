<?php

namespace CedricZiel\MattermostPhp\Form;

/**
 * @see https://developers.mattermost.com/integrate/apps/structure/forms/#field-types
 */
enum FieldTypes: string
{
    /**
     * A plain text field.
     */
    case TEXT = 'text';

    /**
     * A dropdown select with static elements.
     */
    case STATIC_SELECT = 'static_select';

    /**
     * A dropdown select that loads the elements dynamically.
     */
    case DYNAMIC_SELECT = 'dynamic_select';

    /**
     * A boolean selector represented as a checkbox.
     */
    case BOOL = 'bool';

    /**
     * A dropdown to select users.
     */
    case USER_SELECT = 'user';

    /**
     * A dropdown to select channels.
     */
    case CHANNEL_SELECT = 'channel';

    /**
     * An arbitrary markdown text; only visible in modal dialogs. Read-only.
     */
    case MARKDOWN = 'markdown';
}
