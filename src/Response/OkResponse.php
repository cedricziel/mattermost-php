<?php

namespace CedricZiel\MattermostPhp\Response;

final class OkResponse extends CallResponse
{
    public function __construct(
        ?string $text = null,
        ?array $data = null,
        ?bool $refresh_bindings = null,
    ) {
        parent::__construct(
            type: CallResponse::TYPE_OK,
            text: $text,
            data: $data,
            refreshBindings: $refresh_bindings,
        );
    }
}
