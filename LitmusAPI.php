<?php

namespace Litmus;

use Litmus\Base\BaseClient;
use Litmus\Email\EmailClient;
use Litmus\Email\EmailTest;
use Litmus\Page\PageClient;
use Litmus\Page\PageTest;

/**
 * LitmusAPI class
 *
 * Core class for the Litmus API.
 *
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 * @package   LitmusAPI
 * @version   1.1
 * @access    public
 * @copyright Copyright (c) 2011, Yzalis
 */
class LitmusAPI
{
    /**
     * API Key for authentication.
     *
     * @var string
     * @access private
     */
    private $api_key;

    /**
     * Identification for HTTP headers.
     *
     * @var string
     * @access private
     */
    private $api_pass;

    /**
     * Identification for HTTP headers.
     *
     * @var string
     * @access private
     */
    private $soap_client;

    /**
     * Create and configure a new LitmusAPI object with your credentials.
     *
     * @param string $api_key Your own API Key.
     * @param string $api_pass Your own API Password.
     * @access public
     */
    function __construct($api_key = null, $api_pass = null)
    {
        if (!class_exists('SoapClient')) {
            throw new \RuntimeException('PHP SoapClient library is required.');
        }

        $this->setApiCredentials($api_key, $api_pass);

        $this->setupSoapClient();
    }

    /**
     * Retrieve all the email clients.
     *
     * @return array All the available email test clients.
     * @access public
     */
    public function getEmailClients()
    {
        $result = $this->soap_client->__soapCall("GetEmailTestClients", array($this->getApiKey(), $this->getApiPass()));
        $clients = array();

        foreach ($result as $params)
        {
            $clients[] = new EmailClient($params);
        }

        return $clients;
    }

    /**
     * Returns all the page test clients
     *
     * @return array Page test clients
     * @access public
     */
    public function getPageClients()
    {
        $result = $this->soap_client->__soapCall('GetPageTestClients', array($this->getApiKey(), $this->getApiPass()));
        $clients = array();

        foreach ($result as $params) {
            $clients[] = new PageClient($params);
        }

        return $clients;
    }

    /**
     * Create an Email Test
     *
     * @param string $EmailTest EmailTest object with values filled in
     * @return EmailTest The EmailTest object response from the API.
     * @access public
     */
    public function createEmailTest($EmailTest)
    {
        $result = $this->soap_client->__soapCall('CreateEmailTest', array($this->getApiKey(), $this->getApiPass(), $EmailTest));
        
        return new EmailTest($result);
    }

    /**
     * Create a PageTest
     *
     * @param string $PageTest PageTest object with values filled in
     * @return PageTest The PageTest object response from the API
     */
    public function createPageTest($PageTest)
    {
        $result = $this->soap_client->__soapCall('CreatePageTest', array($this->getApiKey(), $this->getApiPass(), $PageTest));

        return new PageTest($result);
    }

    /**
     * Fetch an email test.
     *
     * @param string $id The unique identifier of the email test (as returned by createEmailTest()).
     * @return EmailTest The EmailTest object with data filled in.
     * @access public
     */
    public function getEmailTest($id)
    {
        $result = $this->soap_client->__soapCall('GetEmailTest', array($this->getApiKey(), $this->getApiPass(), $id));

        return new EmailTest($result);
    }

    /**
     * Fetch a page test
     *
     * @param string $id The unique identifier of the page test (as returned by createPageTest())
     * @return PageTest The PageTest object with data filled in.
     * @access public
     */
    public function getPageTest($id)
    {
        $result = $this->soap_client->__soapCall('GetPageTest', array($this->getApiKey(), $this->getApiPass()));

        return new PageTest($result);
    }

    /**
     * Retreive the spam addresses to send your email
     *
     * @return array The array with data filled in.
     * @access public
     */
    public function getSpamSeedAddresses()
    {
        $result = $this->soap_client->__soapCall('GetSpamSeedAddresses', array($this->getApiKey(), $this->getApiPass()));
        
        return $result;
    }

    /**
     * Gets the result of one email or page client.
     *
     * @param string $id ID of the individual result.
     * @return PageTestClient/EmailTest Client with the data.
     * @access public
     */
    public function getResult($id)
    {
        $LitmusClient = new BaseClient($this->soap_client->__soapCall('GetResult', array($this->getApiKey(), $this->getApiPass(), $id)));
        
        if ($LitmusClient->getResultType() == "page") {
            return new PageClient($LitmusClient);
        } else {
            return new EmailClient($LitmusClient);
        }
    }

    /**
     * Initialize and store the connection.
     *
     * @access private
     */
    private function setupSoapClient()
    {
        $this->soap_client = new \SoapClient("https://soapapi.litmusapp.com/2010-06-21/api.asmx?wsdl");
    }

    /**
     * Configure the credentials to authorize the connection.
     *
     * @param string $key
     * @param string $pass
     * @access private
     */
    private function setApiCredentials($key, $pass)
    {
        if (is_null($key) || strlen($key) == 0 || !is_string($key)) {
          throw new \InvalidArgumentException('You must specify an API Key (string).');
        }

        if (is_null($pass) || strlen($pass) == 0 || !is_string($pass)) {
          throw new \InvalidArgumentException('You must specify an API Password (string).');
        }

        $this->api_key  = $key;
        $this->api_pass = $pass;
    }

    /**
     * This is your own API Key provided by Litmus
     *
     * @return string The API Key
     * @access private
     */
    private function getApiKey()
    {
        return $this->api_key;
    }

    /**
     * This is your own API Pass provided by Litmus
     *
     * @return string The API Pass
     * @access private
     */
    private function getApiPass()
    {
        return $this->api_pass;
    }
}