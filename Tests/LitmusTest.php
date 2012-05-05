<?php

namespace Litmus\Tests;

use Litmus\LitmusAPI;
use Litmus\Email\EmailTest;

class LitmusTest extends \PHPUnit_Framework_TestCase
{
    protected $apiKey;
    protected $apiPass;

    protected function setUp()
    {
        if (file_exists(__DIR__ . "/../parameters.ini")) {
            $ini_array = parse_ini_file(__DIR__ . "/../parameters.ini");
            $this->apiKey = $ini_array['apiKey'];
            $this->apiPass = $ini_array['apiPass'];
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
        $LitmusAPI = new LitmusAPI();
    }

	/**
     * @expectedException InvalidArgumentException
     */
    public function testApiPassException()
    {
        $LitmusAPI = new LitmusAPI('keykey');
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

        $LitmusAPI = new LitmusAPI('keykey', 'pwdpwd');
    }

    public function testgetSpamSeedAddresses()
    {
        if (!$this->apiKey || !$this->apiPass) {
            $this->markTestSkipped('You must provide your own Litmus API credentials to test connection.');
        }

        $LitmusAPI = new LitmusAPI($this->apiKey, $this->apiPass);
        $spamSeedAddresses = $LitmusAPI->getSpamSeedAddresses();
        $this->assertInternalType('array', $spamSeedAddresses);
        $this->assertNotCount(0, $spamSeedAddresses);
    }

    public function testGetEmailClients()
    {
        if (!$this->apiKey || !$this->apiPass) {
            $this->markTestSkipped('You must provide your own Litmus API credentials to test connection.');
        }

        $LitmusAPI = new LitmusAPI($this->apiKey, $this->apiPass);
        $clients = $LitmusAPI->getEmailClients();
        $this->assertInternalType('array', $clients);
    }
}