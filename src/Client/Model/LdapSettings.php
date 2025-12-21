<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class LdapSettings
{
    public function __construct(
        public ?bool $Enable = null,
        public ?bool $EnableSync = null,
        public ?string $LdapServer = null,
        public ?int $LdapPort = null,
        public ?string $ConnectionSecurity = null,
        public ?string $BaseDN = null,
        public ?string $BindUsername = null,
        public ?string $BindPassword = null,
        public ?int $MaximumLoginAttempts = null,
        public ?string $UserFilter = null,
        public ?string $GroupFilter = null,
        public ?string $GuestFilter = null,
        public ?bool $EnableAdminFilter = null,
        public ?string $AdminFilter = null,
        public ?string $GroupDisplayNameAttribute = null,
        public ?string $GroupIdAttribute = null,
        public ?string $FirstNameAttribute = null,
        public ?string $LastNameAttribute = null,
        public ?string $EmailAttribute = null,
        public ?string $UsernameAttribute = null,
        public ?string $NicknameAttribute = null,
        public ?string $IdAttribute = null,
        public ?string $PositionAttribute = null,
        public ?string $LoginIdAttribute = null,
        public ?string $PictureAttribute = null,
        public ?int $SyncIntervalMinutes = null,
        public ?bool $SkipCertificateVerification = null,
        public ?string $PublicCertificateFile = null,
        public ?string $PrivateKeyFile = null,
        public ?int $QueryTimeout = null,
        public ?int $MaxPageSize = null,
        public ?string $LoginFieldName = null,
        public ?string $LoginButtonColor = null,
        public ?string $LoginButtonBorderColor = null,
        public ?string $LoginButtonTextColor = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): LdapSettings {
        $object = new self(
            Enable: isset($data['Enable']) ? $data['Enable'] : null,
            EnableSync: isset($data['EnableSync']) ? $data['EnableSync'] : null,
            LdapServer: isset($data['LdapServer']) ? $data['LdapServer'] : null,
            LdapPort: isset($data['LdapPort']) ? $data['LdapPort'] : null,
            ConnectionSecurity: isset($data['ConnectionSecurity']) ? $data['ConnectionSecurity'] : null,
            BaseDN: isset($data['BaseDN']) ? $data['BaseDN'] : null,
            BindUsername: isset($data['BindUsername']) ? $data['BindUsername'] : null,
            BindPassword: isset($data['BindPassword']) ? $data['BindPassword'] : null,
            MaximumLoginAttempts: isset($data['MaximumLoginAttempts']) ? $data['MaximumLoginAttempts'] : null,
            UserFilter: isset($data['UserFilter']) ? $data['UserFilter'] : null,
            GroupFilter: isset($data['GroupFilter']) ? $data['GroupFilter'] : null,
            GuestFilter: isset($data['GuestFilter']) ? $data['GuestFilter'] : null,
            EnableAdminFilter: isset($data['EnableAdminFilter']) ? $data['EnableAdminFilter'] : null,
            AdminFilter: isset($data['AdminFilter']) ? $data['AdminFilter'] : null,
            GroupDisplayNameAttribute: isset($data['GroupDisplayNameAttribute']) ? $data['GroupDisplayNameAttribute'] : null,
            GroupIdAttribute: isset($data['GroupIdAttribute']) ? $data['GroupIdAttribute'] : null,
            FirstNameAttribute: isset($data['FirstNameAttribute']) ? $data['FirstNameAttribute'] : null,
            LastNameAttribute: isset($data['LastNameAttribute']) ? $data['LastNameAttribute'] : null,
            EmailAttribute: isset($data['EmailAttribute']) ? $data['EmailAttribute'] : null,
            UsernameAttribute: isset($data['UsernameAttribute']) ? $data['UsernameAttribute'] : null,
            NicknameAttribute: isset($data['NicknameAttribute']) ? $data['NicknameAttribute'] : null,
            IdAttribute: isset($data['IdAttribute']) ? $data['IdAttribute'] : null,
            PositionAttribute: isset($data['PositionAttribute']) ? $data['PositionAttribute'] : null,
            LoginIdAttribute: isset($data['LoginIdAttribute']) ? $data['LoginIdAttribute'] : null,
            PictureAttribute: isset($data['PictureAttribute']) ? $data['PictureAttribute'] : null,
            SyncIntervalMinutes: isset($data['SyncIntervalMinutes']) ? $data['SyncIntervalMinutes'] : null,
            SkipCertificateVerification: isset($data['SkipCertificateVerification']) ? $data['SkipCertificateVerification'] : null,
            PublicCertificateFile: isset($data['PublicCertificateFile']) ? $data['PublicCertificateFile'] : null,
            PrivateKeyFile: isset($data['PrivateKeyFile']) ? $data['PrivateKeyFile'] : null,
            QueryTimeout: isset($data['QueryTimeout']) ? $data['QueryTimeout'] : null,
            MaxPageSize: isset($data['MaxPageSize']) ? $data['MaxPageSize'] : null,
            LoginFieldName: isset($data['LoginFieldName']) ? $data['LoginFieldName'] : null,
            LoginButtonColor: isset($data['LoginButtonColor']) ? $data['LoginButtonColor'] : null,
            LoginButtonBorderColor: isset($data['LoginButtonBorderColor']) ? $data['LoginButtonBorderColor'] : null,
            LoginButtonTextColor: isset($data['LoginButtonTextColor']) ? $data['LoginButtonTextColor'] : null,
        );
        return $object;
    }
}
