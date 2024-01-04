<?php

namespace CedricZiel\MattermostPhp\Form;

use CedricZiel\MattermostPhp\Call;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Field
{
    public function __construct(
        #[SerializedName('name')]
        public readonly string $name,
        #[SerializedName('type')]
        public readonly string $type,
        #[SerializedName('is_required')]
        public readonly bool $isRequired = false,
        #[SerializedName('readonly')]
        public readonly bool $isReadonly = false,
        #[SerializedName('value')]
        public readonly mixed $value = null,
        #[SerializedName('description')]
        public readonly string $description = '',
        #[SerializedName('label')]
        public readonly string $label = '',
        #[SerializedName('hint')]
        public readonly string $hint = '',
        #[SerializedName('position')]
        public readonly int $position = 0,
        #[SerializedName('modal_label')]
        public readonly string $modalLabel = '',
        #[SerializedName('multiselect')]
        public readonly bool $isMultiselect = false,
        #[SerializedName('refresh')]
        public readonly bool $isRefresh = false,
        /**
         * @var array<SelectOption>
         */
        #[SerializedName('options')]
        public readonly array $options = [],
        #[SerializedName('lookup')]
        public readonly ?Call $lookup = null,
        #[SerializedName('subtype')]
        public readonly string $subtype = '',
        #[SerializedName('min_length')]
        public readonly int $minLength = 0,
        #[SerializedName('max_length')]
        public readonly int $maxLength = 0,
    ) {
    }
}
