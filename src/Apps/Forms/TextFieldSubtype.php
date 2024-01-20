<?php

namespace CedricZiel\MattermostPhp\Apps\Forms;

/**
 * The text field subtypes, except textarea, map to the types of the HTML input form element.
 *
 * The available subtypes are listed here.
 *
 * @see https://developers.mattermost.com/integrate/apps/structure/forms/#text-fields
 */
enum TextFieldSubtype: string
{
    /**
     * A single-line text input field.
     */
    case INPUT = 'input';

    /**
     * A multi-line text input field; uses the HTML textarea element.
     */
    case TEXTAREA = 'textarea';

    /**
     * A field for editing an email address.
     */
    case E_MAIL = 'email';

    /**
     * A field for entering a number; includes a spinner component.
     */
    case NUMBER = 'number';

    /**
     * A single-line text input field whose value is obscured.
     */
    case PASSWORD = 'password';

    /**
     * A field for entering a telephone number.
     */
    case TEL = 'tel';

    /**
     * A field for entering a URL.
     */
    case URL = 'url';
}
