<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class CloudEndpoint
{
    use \CedricZiel\MattermostPhp\Client\HttpClientTrait;

    public function __construct(
        protected string $baseUrl,
        ?\Psr\Http\Client\ClientInterface $httpClient = null,
        ?\Psr\Http\Message\RequestFactoryInterface $requestFactory = null,
    ) {
    }

    public function setBaseUrl(string $baseUrl): static
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * Get cloud workspace limits
     * Retrieve any cloud workspace limits applicable to this instance.
     * ##### Permissions
     * Must be authenticated and be licensed for Cloud.
     * __Minimum server version__: 7.0 __Note:__ This is intended for internal use and is subject to change.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getCloudLimits(): array
    {
        $path = '/api/v4/cloud/limits';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetCloudLimitsResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get cloud products
     * Retrieve a list of all products that are offered for Mattermost Cloud.
     * ##### Permissions
     * Must have `manage_system` permission and be licensed for Cloud.
     * __Minimum server version__: 5.28 __Note:__ This is intended for internal use and is subject to change.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getCloudProducts(): array
    {
        $path = '/api/v4/cloud/products';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetCloudProductsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Create a customer setup payment intent
     * Creates a customer setup payment intent for the given Mattermost cloud installation.
     *
     * ##### Permissions
     *
     * Must have `manage_system` permission and be licensed for Cloud.
     *
     * __Minimum server version__: 5.28
     * __Note:__: This is intended for internal use and is subject to change.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createCustomerPayment(): array
    {
        $path = '/api/v4/cloud/payment';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\CreateCustomerPaymentResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Completes the payment setup intent
     * Confirms the payment setup intent initiated when posting to `/cloud/payment`.
     * ##### Permissions
     * Must have `manage_system` permission and be licensed for Cloud.
     * __Minimum server version__: 5.28 __Note:__ This is intended for internal use and is subject to change.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function confirmCustomerPayment(): array
    {
        $path = '/api/v4/cloud/payment/confirm';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\ConfirmCustomerPaymentResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get cloud customer
     * Retrieves the customer information for the Mattermost Cloud customer bound to this installation.
     * ##### Permissions
     * Must have `manage_system` permission and be licensed for Cloud.
     * __Minimum server version__: 5.28 __Note:__ This is intended for internal use and is subject to change.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getCloudCustomer(): array
    {
        $path = '/api/v4/cloud/customer';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetCloudCustomerResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update cloud customer
     * Updates the customer information for the Mattermost Cloud customer bound to this installation.
     * ##### Permissions
     * Must have `manage_system` permission and be licensed for Cloud.
     * __Minimum server version__: 5.29 __Note:__ This is intended for internal use and is subject to change.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateCloudCustomer(
        \CedricZiel\MattermostPhp\Client\Model\UpdateCloudCustomerRequest $requestBody,
    ): array
    {
        $path = '/api/v4/cloud/customer';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\UpdateCloudCustomerResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update cloud customer address
     * Updates the company address for the Mattermost Cloud customer bound to this installation.
     * ##### Permissions
     * Must have `manage_system` permission and be licensed for Cloud.
     * __Minimum server version__: 5.29 __Note:__ This is intended for internal use and is subject to change.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateCloudCustomerAddress(
        \CedricZiel\MattermostPhp\Client\Model\UpdateCloudCustomerAddressRequest $requestBody,
    ): array
    {
        $path = '/api/v4/cloud/customer/address';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\UpdateCloudCustomerAddressResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get cloud subscription
     * Retrieves the subscription information for the Mattermost Cloud customer bound to this installation.
     * ##### Permissions
     * Must have `manage_system` permission and be licensed for Cloud.
     * __Minimum server version__: 5.28 __Note:__ This is intended for internal use and is subject to change.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getSubscription(): array
    {
        $path = '/api/v4/cloud/subscription';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetSubscriptionResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * GET endpoint for Installation information
     * An endpoint for fetching the installation information.
     * ##### Permissions
     * Must have `sysconsole_read_site_ip_filters` permission and be licensed for Cloud.
     * __Minimum server version__: 9.1 __Note:__ This is intended for internal use and is subject to change.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getEndpointForInstallationInformation(): array
    {
        $path = '/api/v4/cloud/installation';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetEndpointForInstallationInformationResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get cloud subscription invoices
     * Retrieves the invoices for the subscription bound to this installation.
     * ##### Permissions
     * Must have `manage_system` permission and be licensed for Cloud.
     * __Minimum server version__: 5.30 __Note:__ This is intended for internal use and is subject to change.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getInvoicesForSubscription(): array
    {
        $path = '/api/v4/cloud/subscription/invoices';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetInvoicesForSubscriptionResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get cloud invoice PDF
     * Retrieves the PDF for the invoice passed as parameter
     * ##### Permissions
     * Must have `manage_system` permission and be licensed for Cloud.
     * __Minimum server version__: 5.30 __Note:__ This is intended for internal use and is subject to change.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getInvoiceForSubscriptionAsPdf(
        /** Invoice ID */
        string $invoice_id,
    ): array
    {
        $path = '/api/v4/cloud/subscription/invoices/{invoice_id}/pdf';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['invoice_id'] = $invoice_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * POST endpoint for CWS Webhooks
     * An endpoint for processing webhooks from the Customer Portal
     * ##### Permissions
     * This endpoint should only be accessed by CWS, in a Mattermost Cloud instance
     * __Minimum server version__: 5.30 __Note:__ This is intended for internal use and is subject to change.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function postEndpointForCwsWebhooks(): array
    {
        $path = '/api/v4/cloud/webhook';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }
}
