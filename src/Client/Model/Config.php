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
        array $data,
    ): static
    {
        $this->ServiceSettings = $data['ServiceSettings'];
        $this->TeamSettings = $data['TeamSettings'];
        $this->SqlSettings = $data['SqlSettings'];
        $this->LogSettings = $data['LogSettings'];
        $this->PasswordSettings = $data['PasswordSettings'];
        $this->FileSettings = $data['FileSettings'];
        $this->EmailSettings = $data['EmailSettings'];
        $this->RateLimitSettings = $data['RateLimitSettings'];
        $this->PrivacySettings = $data['PrivacySettings'];
        $this->SupportSettings = $data['SupportSettings'];
        $this->GitLabSettings = $data['GitLabSettings'];
        $this->GoogleSettings = $data['GoogleSettings'];
        $this->Office365Settings = $data['Office365Settings'];
        $this->LdapSettings = $data['LdapSettings'];
        $this->ComplianceSettings = $data['ComplianceSettings'];
        $this->LocalizationSettings = $data['LocalizationSettings'];
        $this->SamlSettings = $data['SamlSettings'];
        $this->NativeAppSettings = $data['NativeAppSettings'];
        $this->ClusterSettings = $data['ClusterSettings'];
        $this->MetricsSettings = $data['MetricsSettings'];
        $this->AnalyticsSettings = $data['AnalyticsSettings'];
        return $this;
    }
}
