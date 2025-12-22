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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return LdapSettings The hydrated instance
     */
    public static function hydrate(?array $data): LdapSettings
    {
        $data ??= [];

        return new self(
            Enable: $data['Enable'] ?? null,
            EnableSync: $data['EnableSync'] ?? null,
            LdapServer: $data['LdapServer'] ?? null,
            LdapPort: $data['LdapPort'] ?? null,
            ConnectionSecurity: $data['ConnectionSecurity'] ?? null,
            BaseDN: $data['BaseDN'] ?? null,
            BindUsername: $data['BindUsername'] ?? null,
            BindPassword: $data['BindPassword'] ?? null,
            MaximumLoginAttempts: $data['MaximumLoginAttempts'] ?? null,
            UserFilter: $data['UserFilter'] ?? null,
            GroupFilter: $data['GroupFilter'] ?? null,
            GuestFilter: $data['GuestFilter'] ?? null,
            EnableAdminFilter: $data['EnableAdminFilter'] ?? null,
            AdminFilter: $data['AdminFilter'] ?? null,
            GroupDisplayNameAttribute: $data['GroupDisplayNameAttribute'] ?? null,
            GroupIdAttribute: $data['GroupIdAttribute'] ?? null,
            FirstNameAttribute: $data['FirstNameAttribute'] ?? null,
            LastNameAttribute: $data['LastNameAttribute'] ?? null,
            EmailAttribute: $data['EmailAttribute'] ?? null,
            UsernameAttribute: $data['UsernameAttribute'] ?? null,
            NicknameAttribute: $data['NicknameAttribute'] ?? null,
            IdAttribute: $data['IdAttribute'] ?? null,
            PositionAttribute: $data['PositionAttribute'] ?? null,
            LoginIdAttribute: $data['LoginIdAttribute'] ?? null,
            PictureAttribute: $data['PictureAttribute'] ?? null,
            SyncIntervalMinutes: $data['SyncIntervalMinutes'] ?? null,
            SkipCertificateVerification: $data['SkipCertificateVerification'] ?? null,
            PublicCertificateFile: $data['PublicCertificateFile'] ?? null,
            PrivateKeyFile: $data['PrivateKeyFile'] ?? null,
            QueryTimeout: $data['QueryTimeout'] ?? null,
            MaxPageSize: $data['MaxPageSize'] ?? null,
            LoginFieldName: $data['LoginFieldName'] ?? null,
            LoginButtonColor: $data['LoginButtonColor'] ?? null,
            LoginButtonBorderColor: $data['LoginButtonBorderColor'] ?? null,
            LoginButtonTextColor: $data['LoginButtonTextColor'] ?? null,
        );
    }
}
