<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class LdapDiagnosticResult
{
    public function __construct(
        /** Name/type of the diagnostic test being performed */
        public ?string $test_name = null,
        /** The actual test value (filter string or attribute name) */
        public ?string $test_value = null,
        /** Number of entries found by the filter */
        public ?int $total_count = null,
        /** Optional success/info message */
        public ?string $message = null,
        /** Optional error message if test failed */
        public ?string $error = null,
        /** Array of sample LDAP entries found */
        public ?array $sample_results = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): LdapDiagnosticResult {
        $object = new self(
            test_name: isset($data['test_name']) ? $data['test_name'] : null,
            test_value: isset($data['test_value']) ? $data['test_value'] : null,
            total_count: isset($data['total_count']) ? $data['total_count'] : null,
            message: isset($data['message']) ? $data['message'] : null,
            error: isset($data['error']) ? $data['error'] : null,
            sample_results: isset($data['sample_results']) ? $data['sample_results'] : null,
        );
        return $object;
    }
}
