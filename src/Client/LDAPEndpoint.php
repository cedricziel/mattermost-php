<?php

namespace CedricZiel\MattermostPhp\Client;

class LDAPEndpoint
{
    public function __construct(
        protected string $baseUrl,
        protected \Psr\Http\Client\ClientInterface $httpClient,
    ) {
    }

    public function setBaseUrl(string $baseUrl): static
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * Sync with LDAP
     */
    public function syncLdap(): array
    {
        $path = '/api/v4/ldap/sync';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Test LDAP configuration
     */
    public function testLdap(): array
    {
        $path = '/api/v4/ldap/test';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Migrate Id LDAP
     */
    public function migrateIdLdap(): array
    {
        $path = '/api/v4/ldap/migrateid';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Upload public certificate
     */
    public function uploadLdapPublicCertificate(): array
    {
        $path = '/api/v4/ldap/certificate/public';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Remove public certificate
     */
    public function deleteLdapPublicCertificate(): array
    {
        $path = '/api/v4/ldap/certificate/public';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Upload private key
     */
    public function uploadLdapPrivateCertificate(): array
    {
        $path = '/api/v4/ldap/certificate/private';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Remove private key
     */
    public function deleteLdapPrivateCertificate(): array
    {
        $path = '/api/v4/ldap/certificate/private';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Create memberships for LDAP configured channels and teams for this user
     */
    public function addUserToGroupSyncables(
        /** User Id */
        string $user_id,
    ): array
    {
        $path = '/api/v4/ldap/users/{user_id}/group_sync_memberships';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }
}
;