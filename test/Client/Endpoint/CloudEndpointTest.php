<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\CloudEndpoint;
use CedricZiel\MattermostPhp\Client\Model\CloudCustomer;
use CedricZiel\MattermostPhp\Client\Model\Installation;
use CedricZiel\MattermostPhp\Client\Model\Invoice;
use CedricZiel\MattermostPhp\Client\Model\PaymentSetupIntent;
use CedricZiel\MattermostPhp\Client\Model\Product;
use CedricZiel\MattermostPhp\Client\Model\ProductLimits;
use CedricZiel\MattermostPhp\Client\Model\Subscription;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(CloudEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(ProductLimits::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Product::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PaymentSetupIntent::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(CloudCustomer::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Subscription::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Installation::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Invoice::class)]
class CloudEndpointTest extends ClientTestCase
{
    public CloudEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new CloudEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getCloudLimitsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['messages' => 'test-messages']);

        $result = $this->endpoint->getCloudLimits();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/cloud/limits');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ProductLimits::class, $result);
    }

    #[Test]
    public function getCloudProductsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'name' => 'test-name', 'description' => 'test-description', 'price_per_seat' => 'test-price_per_seat', 'add_ons' => []]]);

        $result = $this->endpoint->getCloudProducts();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/cloud/products');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Product::class, $result[0]);
    }

    #[Test]
    public function createCustomerPaymentBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'client_secret' => 'test-client_secret']);

        $result = $this->endpoint->createCustomerPayment();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/cloud/payment');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PaymentSetupIntent::class, $result);
    }

    #[Test]
    public function confirmCustomerPaymentBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $stripe_setup_intent_id = 'test-stripe_setup_intent_id';

        $this->endpoint->confirmCustomerPayment($stripe_setup_intent_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/cloud/payment/confirm');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getCloudCustomerBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'creator_id' => 'test-creator_id', 'create_at' => 1234567890, 'email' => 'test-email', 'name' => 'test-name', 'num_employees' => 'test-num_employees', 'contact_first_name' => 'test-contact_first_name', 'contact_last_name' => 'test-contact_last_name']);

        $result = $this->endpoint->getCloudCustomer();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/cloud/customer');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\CloudCustomer::class, $result);
    }

    #[Test]
    public function getSubscriptionBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'customer_id' => 'test-customer_id', 'product_id' => 'test-product_id', 'add_ons' => [], 'start_at' => 1234567890, 'end_at' => 1234567890, 'create_at' => 1234567890, 'seats' => 1234567890, 'dns' => 'test-dns']);

        $result = $this->endpoint->getSubscription();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/cloud/subscription');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Subscription::class, $result);
    }

    #[Test]
    public function getEndpointForInstallationInformationBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'state' => 'test-state']);

        $result = $this->endpoint->getEndpointForInstallationInformation();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/cloud/installation');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Installation::class, $result);
    }

    #[Test]
    public function getInvoicesForSubscriptionBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'number' => 'test-number', 'create_at' => 1234567890, 'total' => 1234567890, 'tax' => 1234567890, 'status' => 'test-status', 'period_start' => 1234567890, 'period_end' => 1234567890, 'subscription_id' => 'test-subscription_id', 'item' => []]]);

        $result = $this->endpoint->getInvoicesForSubscription();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/cloud/subscription/invoices');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Invoice::class, $result[0]);
    }
}
