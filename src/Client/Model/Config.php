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
    ): Config {
        $object = new self(
            ServiceSettings: isset($data['ServiceSettings']) ? $data['ServiceSettings'] : null,
            TeamSettings: isset($data['TeamSettings']) ? $data['TeamSettings'] : null,
            SqlSettings: isset($data['SqlSettings']) ? $data['SqlSettings'] : null,
            LogSettings: isset($data['LogSettings']) ? $data['LogSettings'] : null,
            PasswordSettings: isset($data['PasswordSettings']) ? $data['PasswordSettings'] : null,
            FileSettings: isset($data['FileSettings']) ? $data['FileSettings'] : null,
            EmailSettings: isset($data['EmailSettings']) ? $data['EmailSettings'] : null,
            RateLimitSettings: isset($data['RateLimitSettings']) ? $data['RateLimitSettings'] : null,
            PrivacySettings: isset($data['PrivacySettings']) ? $data['PrivacySettings'] : null,
            SupportSettings: isset($data['SupportSettings']) ? $data['SupportSettings'] : null,
            GitLabSettings: isset($data['GitLabSettings']) ? $data['GitLabSettings'] : null,
            GoogleSettings: isset($data['GoogleSettings']) ? $data['GoogleSettings'] : null,
            Office365Settings: isset($data['Office365Settings']) ? $data['Office365Settings'] : null,
            LdapSettings: isset($data['LdapSettings']) ? $data['LdapSettings'] : null,
            ComplianceSettings: isset($data['ComplianceSettings']) ? $data['ComplianceSettings'] : null,
            LocalizationSettings: isset($data['LocalizationSettings']) ? $data['LocalizationSettings'] : null,
            SamlSettings: isset($data['SamlSettings']) ? $data['SamlSettings'] : null,
            NativeAppSettings: isset($data['NativeAppSettings']) ? $data['NativeAppSettings'] : null,
            ClusterSettings: isset($data['ClusterSettings']) ? $data['ClusterSettings'] : null,
            MetricsSettings: isset($data['MetricsSettings']) ? $data['MetricsSettings'] : null,
            AnalyticsSettings: isset($data['AnalyticsSettings']) ? $data['AnalyticsSettings'] : null,
        );
        return $object;
    }
}
