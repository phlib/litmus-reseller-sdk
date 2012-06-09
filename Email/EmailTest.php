<?php

namespace Yzalis\Components\Litmus\Email;

use Yzalis\Components\Litmus\Base\BaseTest;
use Yzalis\Components\Litmus\Email\EmailClient;

/**
 * EmailTest class
 *
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 * @package   LitmusResellerAPI
 * @version   1.1
 * @access    public
 * @copyright Copyright (c) 2011, Yzalis
 */
class EmailTest extends BaseTest
{
    /**
     * Reserved. Please ignore.
     *
     * @var string
     * @access private
     */
    private $Html;

    /**
     * This is the most important property. It's the unique identifer for your
     * test. You'll use it later to poll for updates for your test.
     *
     * @var
     * @access private
     */
    private $ID;

    /**
     * The InboxGuid will be used to construct the email address to send your
     * test email to. To form your email address, simply append
     * "@emailtests.com" to the InboxGUID value.
     *
     * @var string
     * @access private
     */
    private $InboxGUID;

    /**
     * This is an array of EmailTestClient. This contains all the tested client.
     *
     * @var array
     * @access private
     */
    private $Results = array();

    /**
     * This property is used to test the API. If "true", all the result
     * screenshots will be the same.
     *
     * @var boolean
     * @access private
     */
    private $Sandbox = false;

    /**
     * Once you've sent an email, this will contain your email's raw source
     * code. At this stage, it's empty.
     *
     * @var string
     * @access private
     */
    private $Source;

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
     * Once you've sent an email, this will contain your email's subject.
     *
     * @var string
     * @access private
     */
    private $Subject;

    /**
     * This will be "Email" if you've created an email test or "Page" for web
     * page tests.
     *
     * @var string
     * @access private
     */
    private $TestType;

    /**
     *
     *
     * @var string
     * @access private
     */
    private $UserGuid;

    /**
     * This is the url you can use to download all the screenshots of this test.
     *
     * @var string
     * @access private
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
     * Set the unique inbox global unique identifier.
     *
     * @param string $value
     */
    public function setInboxGUID($value)
    {
        $this->InboxGUID = $value;
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
    }

    /**
     * Set the sandbox mode.
     *
     * @param boolean $value
     */
    public function setSandbox($value)
    {
        $this->Sandbox = $value;
    }

    /**
     * Set the source code of the tested email
     *
     * @param string $value
     */
    public function setSource($value)
    {
        $this->Source = $value;
    }

    /**
     * Set the state of the test.
     *
     * @param string $value
     */
    public function setState($value)
    {
        $this->State = $value;
    }

    /**
     * Set the subject of the tested email.
     *
     * @param string $value
     */
    public function setSubject($value)
    {
        $this->Subject = $value;
    }

    /**
     * Set the test type result
     *
     * @param string $value
     */
    public function setTestType($value)
    {
        $this->TestType = $value;
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
     * Set the url of the screesnhots zip file.
     *
     * @param string $value
     */
    public function setZipFile($value)
    {
        $this->ZipFile = $value;
    }

    /**
     * Add an EmailClient to the Results array
     */
    public function addResult(EmailClient $EmailClient)
    {
        $this->Results[] = $EmailClient;
    }

    /**
     * Initialize clients to request a free test.
     */
    public function initializeFreeTest()
    {
          foreach (array('gmailnew', 'ol2003') as $client_name) {
              $LitmusClient = new EmailClient();
              $LitmusClient->setApplicationName($client_name);
              $this->addResult($LitmusClient);
          }
    }
}
