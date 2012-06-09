<?php

namespace Yzalis\Components\Litmus\Page;

use Yzalis\Components\Litmus\Base\BaseTest;
use Yzalis\Components\Litmus\Page\PageTest;
use Yzalis\Components\Litmus\Page\PageClient;

/**
 * PageTest class
 *
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 * @package   LitmusResellerAPI
 * @version   1.1
 * @access    public
 * @copyright Copyright (c) 2011, Yzalis
 */
class PageTest extends BaseTest
{
    /**
     * The title of the web page that will be test.
     *
     * @var array
     * @access private
     */
    private $Title;

    /**
     * This is the most important property. It's the unique identifer for your
     * test. You'll use it later to poll for updates for your test.
     *
     * @var
     * @access private
     */
    private $ID;

    /**
     * This property is used to test the API. If "true", all the result
     * screenshots will be the same.
     *
     * @var boolean
     * @access private
     */
    private $Sandbox;

    /**
     * This will be "Email" if you've created an email test or "Page" for web
     * page tests.
     *
     * @var string
     * @access private
     */
    private $TestType;

    /**
     * The URL of the web page that will be test.
     *
     * @var array
     * @access private
     */
    private $URL;

    /**
     * This will have a value of "waiting" when the test is created. This means
     * Litmus is waiting for your email to arrive. Once Litmus receives it,
     * it'll change the State to "processing" and when all results have
     * completed, it'll change to "complete".
     *
     * @var string
     * @access private
     */
    private $State;

    /**
     * This is an array of PageTestClient. This contains all the tested client.
     *
     * @var string
     * @access private
     */
    private $Results;

    /**
     * Get the unique identifier of the test.
     *
     * @return int
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Get an array of result PageTestClient.
     *
     * @return array
     */
    public function getResults()
    {
        return $this->Results;
    }

    /**
     * Get if the test is in sandbox environment.
     *
     * @return boolean
     */
    public function getSandbox()
    {
        return $this->Sandbox;
    }

    /**
     * Get the state of the test.
     *
     * @return string
     */
    public function getState()
    {
        return $this->State;
    }

    /**
     * Get the type of the test.
     *
     * @return string
     */
    public function getTestType()
    {
        return $this->TestType;
    }

    /**
     * Get the title of the tested web page.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * Get the url of the tested web page.
     *
     * @return string
     */
    public function getURL()
    {
        return $this->URL;
    }

    /**
     * Set the unique identifier of the test.
     *
     * @param string $value
     */
    public function setID($value)
    {
        $this->ID = $value;
    }

    /**
     * Set all the test clients results.
     *
     * @param array $values
     */
    public function setResults($values = array())
    {
        foreach ($values as $client_params) {
            $this->addResult(new PageClient($client_params));
        }
    }

    /**
     * Activate or disactivate the sandox mode.
     *
     * @param boolean $value
     */
    public function setSandbox($value)
    {
        $this->Sandbox = $value;
    }

    /**
     * Set the state of the test.
     *
     * @param boolean $value
     */
    public function setState($value)
    {
        $this->State = $value;
    }

    /**
     * Set the result type
     *
     * @param string $value
     */
    public function setTestType($value)
    {
        $this->TestType = $value;
    }

    /**
     * Set the web page title.
     *
     * @param string $value
     */
    public function setTitle($value)
    {
        $this->Title = $value;
    }

    /**
     * Set the webpage url to test.
     *
     * @param string $url
     */
    public function setURL($url)
    {
        $this->URL = $url;
    }

    /**
     * ?
     *
     * @param string $value
     */
    public function setUserGuid($value)
    {
        $this->UserGuid = $value;
    }

    /**
     * Initialize clients to request a free test.
     */
    public function initializeFreeTest()
    {
        foreach (array('ie7') as $application_name) {
            $PageClient = new PageClient();
            $PageClient->setApplicationName($application_name);
            $this->addResult($PageClient);
        }
    }

    /**
     * Add a PageClient object to the results array
     *
     * @param PageClient $PageClient
     */
    public function addResult(PageClient $PageClient)
    {
        $this->Results[] = $PageClient;
    }
}
