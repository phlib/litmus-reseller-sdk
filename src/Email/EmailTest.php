<?php

namespace Phlib\LitmusResellerSDK\Email;

use Phlib\LitmusResellerSDK\Base\BaseTest;

/**
 * EmailTest class
 *
 * @package Phlib\Litmus-Reseller-SDK
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 */
class EmailTest extends BaseTest
{
    /**
     * Reserved. Please ignore.
     *
     * @var string
     */
    private $Html;

    /**
     * This is the most important property. It's the unique identifer for your
     * test. You'll use it later to poll for updates for your test.
     *
     * @var
     */
    private $ID;

    /**
     * The InboxGuid will be used to construct the email address to send your
     * test email to. To form your email address, simply append
     * "@emailtests.com" to the InboxGUID value.
     *
     * @var string
     */
    private $InboxGUID;

    /**
     * This is an array of EmailTestClient. This contains all the tested client.
     *
     * @var array
     */
    private $Results = [];

    /**
     * This property is used to test the API. If "true", all the result
     * screenshots will be the same.
     *
     * @var boolean
     */
    private $Sandbox = false;

    /**
     * Once you've sent an email, this will contain your email's raw source
     * code. At this stage, it's empty.
     *
     * @var string
     */
    private $Source;

    /**
     * This will have a value of "waiting" when the test is created. This means
     * Litmus is waiting for your email to arrive. Once Litmus receives it,
     * it'll change the State to "processing" and when all results have
     * completed, it'll change to "complete".
     *
     * @var string
     */
    private $State;

    /**
     * Once you've sent an email, this will contain your email's subject.
     *
     * @var string
     */
    private $Subject;

    /**
     * This will be "Email" if you've created an email test or "Page" for web
     * page tests.
     *
     * @var string
     */
    private $TestType;

    /**
     * @var string
     */
    private $UserGuid;

    /**
     * This is the url you can use to download all the screenshots of this test.
     *
     * @var string
     */
    private $ZipFile;

    /**
     * Reserved. Please ignore.
     *
     * @return string
     */
    public function getHtml()
    {
        return $this->Html;
    }

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
     * Get the inbox global unique identifier
     *
     * @return string
     */
    public function getInboxGUID()
    {
        return $this->InboxGUID;
    }

    /**
     * Get an array of result EmailTestClient.
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
     * Get the source of the tested email.
     *
     * @return string
     */
    public function getSource()
    {
        return $this->Source;
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
     * Get the subject of your tested email
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->Subject;
    }

    /**
     * Get the test type.
     *
     * @return string
     */
    public function getTestType()
    {
        return $this->TestType;
    }

    /**
     * ?
     *
     * @return string
     */
    public function getUserGuid()
    {
        return $this->UserGuid;
    }

    /**
     * Get the url of the screenshot zip file.
     *
     * @return string
     */
    public function getZipFile()
    {
        return $this->ZipFile;
    }

    /**
     * Reserved. Please ignore.
     *
     * @param string $value
     */
    public function setHtml($value)
    {
        $this->Html = $value;

        return $this;
    }

    /**
     * Set the unique identifier of the test.
     *
     * @param string $value
     */
    public function setID($value)
    {
        $this->ID = $value;

        return $this;
    }

    /**
     * Set the unique inbox global unique identifier.
     *
     * @param string $value
     */
    public function setInboxGUID($value)
    {
        $this->InboxGUID = $value;

        return $this;
    }

    /**
     * Set all the test client results
     *
     * @param array $values
     */
    public function setResults($values)
    {
        foreach ($values as $client_params) {
            $this->addResult(new EmailClient($client_params));
        }

        return $this;
    }

    /**
     * Set the sandbox mode.
     *
     * @param boolean $value
     */
    public function setSandbox($value)
    {
        $this->Sandbox = $value;

        return $this;
    }

    /**
     * Set the source code of the tested email
     *
     * @param string $value
     */
    public function setSource($value)
    {
        $this->Source = $value;

        return $this;
    }

    /**
     * Set the state of the test.
     *
     * @param string $value
     */
    public function setState($value)
    {
        $this->State = $value;

        return $this;
    }

    /**
     * Set the subject of the tested email.
     *
     * @param string $value
     */
    public function setSubject($value)
    {
        $this->Subject = $value;

        return $this;
    }

    /**
     * Set the test type result
     *
     * @param string $value
     */
    public function setTestType($value)
    {
        $this->TestType = $value;

        return $this;
    }

    /**
     * ?
     *
     * @param string $value
     */
    public function setUserGuid($value)
    {
        $this->UserGuid = $value;

        return $this;
    }

    /**
     * Set the url of the screesnhots zip file.
     *
     * @param string $value
     */
    public function setZipFile($value)
    {
        $this->ZipFile = $value;

        return $this;
    }

    /**
     * Add an EmailClient to the Results array
     */
    public function addResult(EmailClient $EmailClient)
    {
        $this->Results[] = $EmailClient;

        return $this;
    }

    /**
     * Initialize clients to request a free test.
     */
    public function initializeFreeTest()
    {
        foreach (['gmailnew', 'ol2003'] as $client_name) {
            $LitmusClient = new EmailClient();
            $LitmusClient->setApplicationName($client_name);
            $this->addResult($LitmusClient);
        }

        return $this;
    }
}
