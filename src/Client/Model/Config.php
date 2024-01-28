<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Config
{
    public ?\stdClass $ServiceSettings;
    public ?\stdClass $TeamSettings;
    public ?\stdClass $SqlSettings;
    public ?\stdClass $LogSettings;
    public ?\stdClass $PasswordSettings;
    public ?\stdClass $FileSettings;
    public ?\stdClass $EmailSettings;
    public ?\stdClass $RateLimitSettings;
    public ?\stdClass $PrivacySettings;
    public ?\stdClass $SupportSettings;
    public ?\stdClass $GitLabSettings;
    public ?\stdClass $GoogleSettings;
    public ?\stdClass $Office365Settings;
    public ?\stdClass $LdapSettings;
    public ?\stdClass $ComplianceSettings;
    public ?\stdClass $LocalizationSettings;
    public ?\stdClass $SamlSettings;
    public ?\stdClass $NativeAppSettings;
    public ?\stdClass $ClusterSettings;
    public ?\stdClass $MetricsSettings;
    public ?\stdClass $AnalyticsSettings;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var stdClass $data['ServiceSettings'] */
        if (isset($data['ServiceSettings'])) $this->ServiceSettings = (object) $data['ServiceSettings'];
        /** @var stdClass $data['TeamSettings'] */
        if (isset($data['TeamSettings'])) $this->TeamSettings = (object) $data['TeamSettings'];
        /** @var stdClass $data['SqlSettings'] */
        if (isset($data['SqlSettings'])) $this->SqlSettings = (object) $data['SqlSettings'];
        /** @var stdClass $data['LogSettings'] */
        if (isset($data['LogSettings'])) $this->LogSettings = (object) $data['LogSettings'];
        /** @var stdClass $data['PasswordSettings'] */
        if (isset($data['PasswordSettings'])) $this->PasswordSettings = (object) $data['PasswordSettings'];
        /** @var stdClass $data['FileSettings'] */
        if (isset($data['FileSettings'])) $this->FileSettings = (object) $data['FileSettings'];
        /** @var stdClass $data['EmailSettings'] */
        if (isset($data['EmailSettings'])) $this->EmailSettings = (object) $data['EmailSettings'];
        /** @var stdClass $data['RateLimitSettings'] */
        if (isset($data['RateLimitSettings'])) $this->RateLimitSettings = (object) $data['RateLimitSettings'];
        /** @var stdClass $data['PrivacySettings'] */
        if (isset($data['PrivacySettings'])) $this->PrivacySettings = (object) $data['PrivacySettings'];
        /** @var stdClass $data['SupportSettings'] */
        if (isset($data['SupportSettings'])) $this->SupportSettings = (object) $data['SupportSettings'];
        /** @var stdClass $data['GitLabSettings'] */
        if (isset($data['GitLabSettings'])) $this->GitLabSettings = (object) $data['GitLabSettings'];
        /** @var stdClass $data['GoogleSettings'] */
        if (isset($data['GoogleSettings'])) $this->GoogleSettings = (object) $data['GoogleSettings'];
        /** @var stdClass $data['Office365Settings'] */
        if (isset($data['Office365Settings'])) $this->Office365Settings = (object) $data['Office365Settings'];
        /** @var stdClass $data['LdapSettings'] */
        if (isset($data['LdapSettings'])) $this->LdapSettings = (object) $data['LdapSettings'];
        /** @var stdClass $data['ComplianceSettings'] */
        if (isset($data['ComplianceSettings'])) $this->ComplianceSettings = (object) $data['ComplianceSettings'];
        /** @var stdClass $data['LocalizationSettings'] */
        if (isset($data['LocalizationSettings'])) $this->LocalizationSettings = (object) $data['LocalizationSettings'];
        /** @var stdClass $data['SamlSettings'] */
        if (isset($data['SamlSettings'])) $this->SamlSettings = (object) $data['SamlSettings'];
        /** @var stdClass $data['NativeAppSettings'] */
        if (isset($data['NativeAppSettings'])) $this->NativeAppSettings = (object) $data['NativeAppSettings'];
        /** @var stdClass $data['ClusterSettings'] */
        if (isset($data['ClusterSettings'])) $this->ClusterSettings = (object) $data['ClusterSettings'];
        /** @var stdClass $data['MetricsSettings'] */
        if (isset($data['MetricsSettings'])) $this->MetricsSettings = (object) $data['MetricsSettings'];
        /** @var stdClass $data['AnalyticsSettings'] */
        if (isset($data['AnalyticsSettings'])) $this->AnalyticsSettings = (object) $data['AnalyticsSettings'];
        return $this;
    }
}
