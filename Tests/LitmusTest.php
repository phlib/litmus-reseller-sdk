<?php

namespace Yzalis\Components\Litmus\Tests;

use Yzalis\Components\Litmus\LitmusResellerAPI;
use Yzalis\Components\Litmus\Email\EmailTest;

class LitmusTest extends \PHPUnit_Framework_TestCase
{
    protected $apiKey;
    protected $apiPass;

    protected function setUp()
    {
        if (isset($_SERVER['apiKey'])) {
            $this->apiKey = $_SERVER['apiKey'];
        }
        if (isset($_SERVER['apiPass'])) {
            $this->apiPass = $_SERVER['apiPass'];
        }
    }

    protected function tearDown()
    {
        $this->apiKey = null;
        $this->apiPass = null;
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testApiKeyException()
    {
        $litmusAPI = new LitmusResellerAPI();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testApiPassException()
    {
        $litmusAPI = new LitmusResellerAPI('keykey');
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

        $litmusAPI = new LitmusResellerAPI('keykey', 'pwdpwd');
    }

    public function testgetSpamSeedAddresses()
    {
        if (!$this->apiKey || !$this->apiPass) {
            $this->markTestSkipped('You must provide your own Litmus API credentials to test connection.');
        }

        $litmusAPI = new LitmusResellerAPI($this->apiKey, $this->apiPass);
        $spamSeedAddresses = $litmusAPI->getSpamSeedAddresses();
        $this->assertInternalType('array', $spamSeedAddresses);
        $this->assertNotCount(0, $spamSeedAddresses);
    }

    public function testGetEmailClients()
    {
        if (!$this->apiKey || !$this->apiPass) {
            $this->markTestSkipped('You must provide your own Litmus API credentials to test connection.');
        }

        $litmusAPI = new LitmusResellerAPI($this->apiKey, $this->apiPass);
        $clients = $litmusAPI->getEmailClients();
        $this->assertInternalType('array', $clients);
    }
}
