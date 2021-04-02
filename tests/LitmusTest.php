<?php

namespace Phlib\LitmusResellerSDK\Test;

use Phlib\LitmusResellerSDK\Litmus;
use PHPUnit\Framework\TestCase;

/**
 * @package Phlib\Litmus-Reseller-SDK
 */
class LitmusTest extends TestCase
{
    public function testApiKeyException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Litmus();
    }

    public function testApiPassException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Litmus('keykey');
    }

    public function testGetSpamSeedAddresses(): void
    {
        if (!getenv('INTEGRATION_ENABLED')) {
            static::markTestSkipped('You must provide your own Litmus API credentials to test connection.');
        }

        $litmusAPI = new Litmus(getenv('LITMUS_API_KEY'), getenv('LITMUS_API_PASS'));
        $spamSeedAddresses = $litmusAPI->getSpamSeedAddresses();
        static::assertIsArray($spamSeedAddresses);
        static::assertNotCount(0, $spamSeedAddresses);
    }

    public function testGetEmailClients(): void
    {
        if (!getenv('INTEGRATION_ENABLED')) {
            static::markTestSkipped('You must provide your own Litmus API credentials to test connection.');
        }

        $litmusAPI = new Litmus(getenv('LITMUS_API_KEY'), getenv('LITMUS_API_PASS'));
        $clients = $litmusAPI->getEmailClients();
        static::assertIsArray($clients);
    }
}
