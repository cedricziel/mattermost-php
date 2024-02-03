<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Config
{
    public function __construct(
        public ?\stdClass $ServiceSettings = null,
        public ?\stdClass $TeamSettings = null,
        public ?\stdClass $SqlSettings = null,
        public ?\stdClass $LogSettings = null,
        public ?\stdClass $PasswordSettings = null,
        public ?\stdClass $FileSettings = null,
        public ?\stdClass $EmailSettings = null,
        public ?\stdClass $RateLimitSettings = null,
        public ?\stdClass $PrivacySettings = null,
        public ?\stdClass $SupportSettings = null,
        public ?\stdClass $GitLabSettings = null,
        public ?\stdClass $GoogleSettings = null,
        public ?\stdClass $Office365Settings = null,
        public ?\stdClass $LdapSettings = null,
        public ?\stdClass $ComplianceSettings = null,
        public ?\stdClass $LocalizationSettings = null,
        public ?\stdClass $SamlSettings = null,
        public ?\stdClass $NativeAppSettings = null,
        public ?\stdClass $ClusterSettings = null,
        public ?\stdClass $MetricsSettings = null,
        public ?\stdClass $AnalyticsSettings = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            ServiceSettings: (object) $data['ServiceSettings'] ?? null,
            TeamSettings: (object) $data['TeamSettings'] ?? null,
            SqlSettings: (object) $data['SqlSettings'] ?? null,
            LogSettings: (object) $data['LogSettings'] ?? null,
            PasswordSettings: (object) $data['PasswordSettings'] ?? null,
            FileSettings: (object) $data['FileSettings'] ?? null,
            EmailSettings: (object) $data['EmailSettings'] ?? null,
            RateLimitSettings: (object) $data['RateLimitSettings'] ?? null,
            PrivacySettings: (object) $data['PrivacySettings'] ?? null,
            SupportSettings: (object) $data['SupportSettings'] ?? null,
            GitLabSettings: (object) $data['GitLabSettings'] ?? null,
            GoogleSettings: (object) $data['GoogleSettings'] ?? null,
            Office365Settings: (object) $data['Office365Settings'] ?? null,
            LdapSettings: (object) $data['LdapSettings'] ?? null,
            ComplianceSettings: (object) $data['ComplianceSettings'] ?? null,
            LocalizationSettings: (object) $data['LocalizationSettings'] ?? null,
            SamlSettings: (object) $data['SamlSettings'] ?? null,
            NativeAppSettings: (object) $data['NativeAppSettings'] ?? null,
            ClusterSettings: (object) $data['ClusterSettings'] ?? null,
            MetricsSettings: (object) $data['MetricsSettings'] ?? null,
            AnalyticsSettings: (object) $data['AnalyticsSettings'] ?? null,
        );
        return $object;
    }
}
