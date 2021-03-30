<?php

namespace Phlib\LitmusResellerSDK\Test;

use Phlib\LitmusResellerSDK\Litmus;
use Phlib\LitmusResellerSDK\Email\EmailTest;

/**
 * @package Phlib\Litmus-Reseller-SDK
 */
class LitmusTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     */
    public function testApiKeyException()
    {
        $litmusAPI = new Litmus();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testApiPassException()
    {
        $litmusAPI = new Litmus('keykey');
    }

    public function testCreateEmailTest()
    {
        $EmailTest = new EmailTest();

        $this->assertFalse($EmailTest->getSandbox());
        $EmailTest->setSandbox(true);
        $this->assertTrue($EmailTest->getSandbox());

        $this->assertInternalType('array', $EmailTest->getResults());
        $this->assertCount(0, $EmailTest->getResults());

        $EmailTest->initializeFreeTest();
        $this->assertCount(2, $EmailTest->getResults());
    }

    public function testGetSpamSeedAddresses()
    {
        if (!$_SERVER['apiKey'] || !$_SERVER['apiPass']) {
            $this->markTestSkipped('You must provide your own Litmus API credentials to test connection.');
        }

        $litmusAPI = new Litmus($_SERVER['apiKey'], $_SERVER['apiPass']);
        $spamSeedAddresses = $litmusAPI->getSpamSeedAddresses();
        $this->assertInternalType('array', $spamSeedAddresses);
        $this->assertNotCount(0, $spamSeedAddresses);
    }

    public function testGetEmailClients()
    {
        if (!$_SERVER['apiKey'] || !$_SERVER['apiPass']) {
            $this->markTestSkipped('You must provide your own Litmus API credentials to test connection.');
        }

        $litmusAPI = new Litmus($_SERVER['apiKey'], $_SERVER['apiPass']);
        $clients = $litmusAPI->getEmailClients();
        $this->assertInternalType('array', $clients);
    }
}
