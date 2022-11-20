<?php

declare(strict_types=1);

namespace Phlib\LitmusResellerSDK\Test;

use Phlib\LitmusResellerSDK\Litmus;
use PHPUnit\Framework\TestCase;

/**
 * @package Phlib\Litmus-Reseller-SDK
 * @group integration
 */
class IntegrationTest extends TestCase
{
    protected function setUp(): void
    {
        if (!getenv('INTEGRATION_ENABLED')) {
            static::markTestSkipped('You must provide your own Litmus API credentials to test connection.');
        }

        parent::setUp();
    }

    public function testGetSpamSeedAddresses(): void
    {
        $litmusAPI = new Litmus(getenv('LITMUS_API_KEY'), getenv('LITMUS_API_PASS'));
        $spamSeedAddresses = $litmusAPI->getSpamSeedAddresses();
        static::assertIsArray($spamSeedAddresses);
        static::assertNotCount(0, $spamSeedAddresses);
    }

    public function testGetEmailClients(): void
    {
        $litmusAPI = new Litmus(getenv('LITMUS_API_KEY'), getenv('LITMUS_API_PASS'));
        $clients = $litmusAPI->getEmailClients();
        static::assertIsArray($clients);
    }
}
