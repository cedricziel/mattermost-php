<?php

namespace CedricZiel\MattermostPhp\Client;

class CloudEndpoint
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
     * Get cloud workspace limits
     */
    public function getCloudLimits(): array
    {
        $path = '/api/v4/cloud/limits';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get cloud products
     */
    public function getCloudProducts(): array
    {
        $path = '/api/v4/cloud/products';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Create a customer setup payment intent
     */
    public function createCustomerPayment(): array
    {
        $path = '/api/v4/cloud/payment';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Completes the payment setup intent
     */
    public function confirmCustomerPayment(): array
    {
        $path = '/api/v4/cloud/payment/confirm';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get cloud customer
     */
    public function getCloudCustomer(): array
    {
        $path = '/api/v4/cloud/customer';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Update cloud customer
     */
    public function updateCloudCustomer(): array
    {
        $path = '/api/v4/cloud/customer';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Update cloud customer address
     */
    public function updateCloudCustomerAddress(): array
    {
        $path = '/api/v4/cloud/customer/address';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get cloud subscription
     */
    public function getSubscription(): array
    {
        $path = '/api/v4/cloud/subscription';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * GET endpoint for Installation information
     */
    public function getEndpointForInstallationInformation(): array
    {
        $path = '/api/v4/cloud/installation';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get cloud subscription invoices
     */
    public function getInvoicesForSubscription(): array
    {
        $path = '/api/v4/cloud/subscription/invoices';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get cloud invoice PDF
     */
    public function getInvoiceForSubscriptionAsPdf(
        /** Invoice ID */
        string $invoice_id,
    ): array
    {
        $path = '/api/v4/cloud/subscription/invoices/{invoice_id}/pdf';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['invoice_id'] = $invoice_id;
        return [];
    }

    /**
     * POST endpoint for CWS Webhooks
     */
    public function postEndpointForCwsWebhooks(): array
    {
        $path = '/api/v4/cloud/webhook';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }
}
;