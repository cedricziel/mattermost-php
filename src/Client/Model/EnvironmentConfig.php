<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class EnvironmentConfig
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
    ): EnvironmentConfig {
        $object = new self(
            ServiceSettings: isset($data['ServiceSettings']) ? (object) $data['ServiceSettings'] : null,
            TeamSettings: isset($data['TeamSettings']) ? (object) $data['TeamSettings'] : null,
            SqlSettings: isset($data['SqlSettings']) ? (object) $data['SqlSettings'] : null,
            LogSettings: isset($data['LogSettings']) ? (object) $data['LogSettings'] : null,
            PasswordSettings: isset($data['PasswordSettings']) ? (object) $data['PasswordSettings'] : null,
            FileSettings: isset($data['FileSettings']) ? (object) $data['FileSettings'] : null,
            EmailSettings: isset($data['EmailSettings']) ? (object) $data['EmailSettings'] : null,
            RateLimitSettings: isset($data['RateLimitSettings']) ? (object) $data['RateLimitSettings'] : null,
            PrivacySettings: isset($data['PrivacySettings']) ? (object) $data['PrivacySettings'] : null,
            SupportSettings: isset($data['SupportSettings']) ? (object) $data['SupportSettings'] : null,
            GitLabSettings: isset($data['GitLabSettings']) ? (object) $data['GitLabSettings'] : null,
            GoogleSettings: isset($data['GoogleSettings']) ? (object) $data['GoogleSettings'] : null,
            Office365Settings: isset($data['Office365Settings']) ? (object) $data['Office365Settings'] : null,
            LdapSettings: isset($data['LdapSettings']) ? (object) $data['LdapSettings'] : null,
            ComplianceSettings: isset($data['ComplianceSettings']) ? (object) $data['ComplianceSettings'] : null,
            LocalizationSettings: isset($data['LocalizationSettings']) ? (object) $data['LocalizationSettings'] : null,
            SamlSettings: isset($data['SamlSettings']) ? (object) $data['SamlSettings'] : null,
            NativeAppSettings: isset($data['NativeAppSettings']) ? (object) $data['NativeAppSettings'] : null,
            ClusterSettings: isset($data['ClusterSettings']) ? (object) $data['ClusterSettings'] : null,
            MetricsSettings: isset($data['MetricsSettings']) ? (object) $data['MetricsSettings'] : null,
            AnalyticsSettings: isset($data['AnalyticsSettings']) ? (object) $data['AnalyticsSettings'] : null,
        );
        return $object;
    }
}
