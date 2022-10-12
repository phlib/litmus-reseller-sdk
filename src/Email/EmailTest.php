<?php

declare(strict_types=1);

namespace Phlib\LitmusResellerSDK\Email;

/**
 * EmailTest class
 *
 * @package Phlib\Litmus-Reseller-SDK
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 */
class EmailTest
{
    private string $Html;

    /**
     * This is the most important property. It's the unique identifer for your
     * test. You'll use it later to poll for updates for your test.
     */
    private int $ID;

    /**
     * The InboxGuid will be used to construct the email address to send your
     * test email to. To form your email address, simply append
     * "@emailtests.com" to the InboxGUID value.
     */
    private string $InboxGUID;

    /**
     * This is an array of EmailTestClient. This contains all the tested client.
     */
    private array $Results = [];

    /**
     * This property is used to test the API. If "true", all the result
     * screenshots will be the same.
     */
    private bool $Sandbox = false;

    /**
     * Once you've sent an email, this will contain your email's raw source
     * code. At this stage, it's empty.
     */
    private string $Source;

    /**
     * This will have a value of "waiting" when the test is created. This means
     * Litmus is waiting for your email to arrive. Once Litmus receives it,
     * it'll change the State to "processing" and when all results have
     * completed, it'll change to "complete".
     */
    private string $State;

    /**
     * Once you've sent an email, this will contain your email's subject.
     */
    private string $Subject;

    /**
     * This will be "Email" if you've created an email test or "Page" for web
     * page tests.
     */
    private string $TestType;

    private string $UserGuid;

    /**
     * This is the url you can use to download all the screenshots of this test.
     */
    private string $ZipFile;

    public function __construct(array $values = [])
    {
        if (!empty($values)) {
            foreach ($values as $key => $value) {
                $this->{'set' . $key}($value);
            }
        }
    }

    /**
     * Reserved. Please ignore.
     */
    public function getHtml(): string
    {
        return $this->Html;
    }

    /**
     * Get the unique identifier of the test.
     */
    public function getID(): int
    {
        return $this->ID;
    }

    /**
     * Get the inbox global unique identifier
     */
    public function getInboxGUID(): string
    {
        return $this->InboxGUID;
    }

    /**
     * Get an array of result EmailTestClient.
     */
    public function getResults(): array
    {
        return $this->Results;
    }

    /**
     * Get if the test is in sandbox environment.
     */
    public function getSandbox(): bool
    {
        return $this->Sandbox;
    }

    /**
     * Get the source of the tested email.
     */
    public function getSource(): string
    {
        return $this->Source;
    }

    /**
     * Get the state of the test.
     */
    public function getState(): string
    {
        return $this->State;
    }

    /**
     * Get the subject of your tested email
     */
    public function getSubject(): string
    {
        return $this->Subject;
    }

    /**
     * Get the test type.
     */
    public function getTestType(): string
    {
        return $this->TestType;
    }

    public function getUserGuid(): string
    {
        return $this->UserGuid;
    }

    /**
     * Get the url of the screenshot zip file.
     */
    public function getZipFile(): string
    {
        return $this->ZipFile;
    }

    /**
     * Reserved. Please ignore.
     */
    public function setHtml(string $value): self
    {
        $this->Html = $value;

        return $this;
    }

    /**
     * Set the unique identifier of the test.
     */
    public function setID(int $value): self
    {
        $this->ID = $value;

        return $this;
    }

    /**
     * Set the unique inbox global unique identifier.
     */
    public function setInboxGUID(string $value): self
    {
        $this->InboxGUID = $value;

        return $this;
    }

    /**
     * Set all the test client results
     */
    public function setResults(array $values): self
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
    public function setSandbox(bool $value): self
    {
        $this->Sandbox = $value;

        return $this;
    }

    /**
     * Set the source code of the tested email
     */
    public function setSource(string $value): self
    {
        $this->Source = $value;

        return $this;
    }

    /**
     * Set the state of the test.
     */
    public function setState(string $value): self
    {
        $this->State = $value;

        return $this;
    }

    /**
     * Set the subject of the tested email.
     */
    public function setSubject(string $value): self
    {
        $this->Subject = $value;

        return $this;
    }

    /**
     * Set the test type result
     */
    public function setTestType(string $value): self
    {
        $this->TestType = $value;

        return $this;
    }

    /**
     * ?
     */
    public function setUserGuid(string $value): self
    {
        $this->UserGuid = $value;

        return $this;
    }

    /**
     * Set the url of the screesnhots zip file.
     */
    public function setZipFile(string $value): self
    {
        $this->ZipFile = $value;

        return $this;
    }

    /**
     * Add an EmailClient to the Results array
     */
    public function addResult(EmailClient $EmailClient): self
    {
        $this->Results[] = $EmailClient;

        return $this;
    }
}
