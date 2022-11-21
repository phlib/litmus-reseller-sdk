<?php

declare(strict_types=1);

namespace Phlib\LitmusResellerSDK\Email;

/**
 * @package Phlib\Litmus-Reseller-SDK
 */
class EmailTest
{
    private ?string $Html;

    private int $ID;

    private string $InboxGUID;

    private array $Results = [];

    private bool $Sandbox = false;

    private string $Source;

    private string $State;

    private string $Subject;

    private string $TestType;

    private ?string $UserGuid;

    private string $ZipFile;

    public function __construct(array $values = [])
    {
        foreach ($values as $property => $value) {
            // Only set expected properties
            if (!property_exists($this, $property)) {
                continue;
            }

            if ($property === 'Results' && is_array($value)) {
                foreach ($value as &$result) {
                    // Data from API results will be \stdClass
                    if (!($result instanceof EmailClient)) {
                        $result = new EmailClient((array)$result);
                    }
                }
            }

            $this->{$property} = $value;
        }
    }

    /**
     * Reserved. Please ignore.
     */
    public function getHtml(): ?string
    {
        return $this->Html;
    }

    /**
     * Get the unique identifier of the test.
     * This is the most important property; it's the identifier used to poll for updates for the test.
     */
    public function getID(): int
    {
        return $this->ID;
    }

    /**
     * The InboxGuid is the mailbox part of the email address to send the test email.
     * To form the email address, append "@emailtests.com" to this value.
     */
    public function getInboxGUID(): string
    {
        return $this->InboxGUID;
    }

    /**
     * Array of EmailClient results
     */
    public function getResults(): array
    {
        return $this->Results;
    }

    /**
     * True if the test is in sandbox environment
     */
    public function getSandbox(): bool
    {
        return $this->Sandbox;
    }

    /**
     * Get the source of the tested email
     */
    public function getSource(): string
    {
        return $this->Source;
    }

    /**
     * This will have a value of "waiting" when the test is created. This means
     * Litmus is waiting for your email to arrive. Once Litmus receives it,
     * it'll change the State to "processing" and when all results have
     * completed, it'll change to "complete".
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
     * Get the test type, i.e. "email"
     */
    public function getTestType(): string
    {
        return $this->TestType;
    }

    public function getUserGuid(): ?string
    {
        return $this->UserGuid;
    }

    /**
     * URL for all the screenshots of this test
     */
    public function getZipFile(): string
    {
        return $this->ZipFile;
    }
}
