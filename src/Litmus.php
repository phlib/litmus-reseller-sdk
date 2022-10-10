<?php

namespace Phlib\LitmusResellerSDK;

use Phlib\LitmusResellerSDK\Base\BaseClient;
use Phlib\LitmusResellerSDK\Email\EmailClient;
use Phlib\LitmusResellerSDK\Email\EmailTest;
use Phlib\LitmusResellerSDK\Page\PageClient;
use Phlib\LitmusResellerSDK\Page\PageTest;

/**
 * Litmus class. This is the core class for the Litmus Reseller API
 *
 * @package Phlib\Litmus-Reseller-SDK
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 */
class Litmus
{
    /**
     * API Key for authentication
     *
     * @var string
     */
    private $apiKey;

    /**
     * Identification for HTTP headers
     *
     * @var string
     */
    private $apiPass;

    /**
     * API endpoint
     *
     * @var string
     */
    private $apiUrl = 'https://soapapi.litmusapp.com/2010-06-21/api.asmx?wsdl';

    /**
     * Identification for HTTP headers
     *
     * @var string
     */
    private $soapClient;

    /**
     * Create and configure a new LitmusAPI object with your credentials
     *
     * @param string $apiKey  Your own API Key.
     * @param string $apiPass Your own API Password.
     */
    public function __construct($apiKey = null, $apiPass = null)
    {
        $this->setApiCredentials($apiKey, $apiPass)->setupSoapClient();
    }

    /**
     * Retrieve all the email clients
     *
     * @return array All the available email test clients
     */
    public function getEmailClients()
    {
        $result = $this->soapClient->__soapCall('GetEmailTestClients', [$this->getApiKey(), $this->getApiPass()]);
        $clients = [];

        foreach ($result as $params) {
            $clients[] = new EmailClient($params);
        }

        return $clients;
    }

    /**
     * Returns all the page test clients
     *
     * @return array Page test clients
     */
    public function getPageClients()
    {
        $result = $this->soapClient->__soapCall('GetPageTestClients', [$this->getApiKey(), $this->getApiPass()]);
        $clients = [];

        foreach ($result as $params) {
            $clients[] = new PageClient($params);
        }

        return $clients;
    }

    /**
     * Create an Email Test
     *
     * @param  string    $EmailTest EmailTest object with values filled in
     *
     * @return EmailTest The EmailTest object response from the API.
     */
    public function createEmailTest($EmailTest)
    {
        $result = $this->soapClient->__soapCall('CreateEmailTest', [
            $this->getApiKey(),
            $this->getApiPass(),
            $EmailTest,
        ]);

        return new EmailTest($result);
    }

    /**
     * Create a PageTest
     *
     * @param  string   $PageTest PageTest object with values filled in
     *
     * @return PageTest The PageTest object response from the API
     */
    public function createPageTest($PageTest)
    {
        $result = $this->soapClient->__soapCall('CreatePageTest', [
            $this->getApiKey(),
            $this->getApiPass(),
            $PageTest,
        ]);

        return new PageTest($result);
    }

    /**
     * Fetch an email test.
     *
     * @param  string    $id The unique identifier of the email test (as returned by createEmailTest()).
     *
     * @return EmailTest The EmailTest object with data filled in.
     */
    public function getEmailTest($id)
    {
        $result = $this->soapClient->__soapCall('GetEmailTest', [
            $this->getApiKey(),
            $this->getApiPass(),
            $id,
        ]);

        return new EmailTest($result);
    }

    /**
     * Fetch a page test
     *
     * @param  string   $id The unique identifier of the page test (as returned by createPageTest())
     *
     * @return PageTest The PageTest object with data filled in
     */
    public function getPageTest($id)
    {
        $result = $this->soapClient->__soapCall('GetPageTest', [
            $this->getApiKey(),
            $this->getApiPass(),
        ]);

        return new PageTest($result);
    }

    /**
     * Retreive the spam addresses to send your email
     *
     * @return array The array with data filled in
     */
    public function getSpamSeedAddresses()
    {
        $result = $this->soapClient->__soapCall('GetSpamSeedAddresses', [
            $this->getApiKey(),
            $this->getApiPass(),
        ]);

        return $result;
    }

    /**
     * Gets the result of one email or page client
     *
     * @param  string                   $id ID of the individual result
     *
     * @return PageTestClient/EmailTest Client with the data
     */
    public function getResult($id)
    {
        $LitmusClient = new BaseClient($this->soapClient->__soapCall('GetResult', [
            $this->getApiKey(),
            $this->getApiPass(),
            $id,
        ]));

        if ($LitmusClient->getResultType() == 'page') {
            return new PageClient($LitmusClient);
        }
        return new EmailClient($LitmusClient);
    }

    /**
     * Initialize and store the connection
     *
     * @return $this
     */
    private function setupSoapClient()
    {
        $this->soapClient = new \SoapClient($this->getApiUrl());

        return $this;
    }

    /**
     * Configure the credentials to authorize the connection
     *
     * @param string $key
     * @param string $pass
     *
     * @return $this
     */
    private function setApiCredentials($key, $pass)
    {
        if ($key === null || strlen($key) == 0 || !is_string($key)) {
            throw new \InvalidArgumentException('You must specify an API Key (string) .');
        }

        if ($pass === null || strlen($pass) == 0 || !is_string($pass)) {
            throw new \InvalidArgumentException('You must specify an API Password (string) .');
        }

        $this->apiKey = $key;
        $this->apiPass = $pass;

        return $this;
    }

    /**
     * Configure API endpoint url
     *
     * @param string $v
     *
     * @return $this
     */
    private function setApiUrl($v)
    {
        $this->apiUrl = $v;

        return $this;
    }

    /**
     * This is your own API Key provided by Litmus
     *
     * @return string The API Key
     */
    private function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * This is your own API Pass provided by Litmus
     *
     * @return string The API Pass
     */
    private function getApiPass()
    {
        return $this->apiPass;
    }

    /**
     * This is the Litmus endpoint
     *
     * @return string The Url
     */
    private function getApiUrl()
    {
        return $this->apiUrl;
    }
}
