<?php

declare(strict_types=1);

namespace Phlib\LitmusResellerSDK\Email;

use Phlib\LitmusResellerSDK\Spam\SpamHeader;

/**
 * EmailClient class
 *
 * @package Phlib\Litmus-Reseller-SDK
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 */
class EmailClient
{
    public string $ApplicationLongName;

    public string $ApplicationName;

    public int $AverageTimeToProcess;

    public bool $BusinessOrPopular;

    public ?bool $Completed;

    public ?bool $DesktopClient;

    public ?bool $FoundInSpam;

    public ?string $FullpageImage;

    public ?string $FullpageImageContentBlocking;

    public ?string $FullpageImageNoContentBlocking;

    public ?string $FullpageImageThumb;

    public ?string $FullpageImageThumbContentBlocking;

    public ?string $FullpageImageThumbNoContentBlocking;

    /**
     * @var int Cannot use property type declaration as the SOAP service expects `long`
     */
    public $Id;

    public ?string $PlatformLongName;

    public string $PlatformName;

    public ?string $RenderedHtmlUrl;

    public string $ResultType;

    public array $SpamHeaders;

    public float $SpamScore;

    public ?string $State;

    public int $Status;

    public bool $SupportsContentBlocking;

    public ?string $WindowImage;

    public ?string $WindowImageContentBlocking;

    public ?string $WindowImageNoContentBlocking;

    public ?string $WindowImageThumb;

    public ?string $WindowImageThumbContentBlocking;

    public ?string $WindowImageThumbNoContentBlocking;

    public function __construct(array $params = [])
    {
        $this->SpamHeaders = [];

        foreach ($params as $k => $v) {
            $this->{'set' . $k}($v);
        }
    }

    /**
     * Add a SpamHeader to the SpamHeaders array
     */
    public function addSpamHeader(SpamHeader $SpamHeader)
    {
        $this->SpamHeaders[] = $SpamHeader;

        return $this;
    }

    /**
     * Return the longer, friendlier name of this client that you can show to your users.
     */
    public function getApplicationLongName(): string
    {
        return $this->ApplicationLongName;
    }

    /**
     * Return a unique identifier for this client.
     */
    public function getApplicationName(): string
    {
        return $this->ApplicationName;
    }

    /**
     * Return the average amount of time (in seconds) it is currently taking to process a result in this client.
     */
    public function getAverageTimeToProcess(): int
    {
        return $this->AverageTimeToProcess;
    }

    public function getBusinessOrPopular(): bool
    {
        return $this->BusinessOrPopular;
    }

    /**
     * Return if the test is completed.
     */
    public function getCompleted(): ?bool
    {
        return $this->Completed;
    }

    /**
     * Desktop clients are those that run locally, on the desktop.
     * Examples include Outlook, Lotus Notes, Apple Mail and Thunderbird.
     * Email clients such as Gmail, AOL and Hotmail would have a DesktopClient value of false.
     */
    public function getDesktopClient(): ?bool
    {
        return $this->DesktopClient;
    }

    /**
     * Indicates if the email was found in this client's spam folder.
     * Since not all clients support this property, it may always be false for some cilents.
     */
    public function getFoundInSpam(): ?bool
    {
        return $this->FoundInSpam;
    }

    /**
     * The uri of a capture of the email opened in the client.
     * You should only use this property if SupportsContentBlocking is false.
     */
    public function getFullpageImage(): ?string
    {
        return $this->FullpageImage;
    }

    /**
     * The url of a capture of the email opened by the client with external content blocking enabled,
     * this is the "images off" capture. You should only use this property if SupportsContentBlocking is true.
     */
    public function getFullpageImageContentBlocking(): ?string
    {
        return $this->FullpageImageContentBlocking;
    }

    /**
     * The url of a capture of the email opened by the client with external content blocking disabled,
     * this is the "images on" capture. You should only use this property if SupportsContentBlocking is true.
     */
    public function getFullpageImageNoContentBlocking(): ?string
    {
        return $this->FullpageImageNoContentBlocking;
    }

    /**
     * Return the url of the full page image thumbnail with content blocking.
     */
    public function getFullpageImageThumb(): ?string
    {
        return $this->FullpageImageThumb;
    }

    /**
     * Return the url of the full page image thumbnail with content blocking.
     */
    public function getFullpageImageThumbContentBlocking(): ?string
    {
        return $this->FullpageImageThumbContentBlocking;
    }

    /**
     * Return the url of the full page image thumbnail without content blocking.
     */
    public function getFullpageImageThumbNoContentBlocking(): ?string
    {
        return $this->FullpageImageThumbNoContentBlocking;
    }

    /**
     * Return the unique identifier of this client test.
     */
    public function getId(): int
    {
        return $this->Id;
    }

    /**
     * The long, friendly name of the platform this client is running on.
     */
    public function getPlatformLongName(): ?string
    {
        return $this->PlatformLongName;
    }

    /**
     * The shorter name of the platform, usually excludes the manufacturer of the operating system.
     */
    public function getPlatformName(): string
    {
        return $this->PlatformName;
    }

    /**
     * Reserved. Please ignore.
     */
    public function getRenderedHtmlUrl(): ?string
    {
        return $this->RenderedHtmlUrl;
    }

    /**
     * Return the result type of the client test. Contains either "email", "spam" or "page".
     */
    public function getResultType(): string
    {
        return $this->ResultType;
    }

    public function getSpamHeaders(): array
    {
        return $this->SpamHeaders;
    }

    /**
     * If the ResultType was equal to "spam", this property may contain a score
     * left by the spam filter this Client object represents.
     */
    public function getSpamScore(): float
    {
        return $this->SpamScore;
    }

    /**
     * Return the current state of the result test, it can be either "pending", "complete" or "error".
     */
    public function getState(): ?string
    {
        return $this->State;
    }

    /**
     * Represents a client's current status. A status of 0 indicates all is
     * well, no delays. A status of 1 indicate the client is running slower than
     * usual, expect delays of up to 15 minutes. A status of 2 indicate the
     * client is currently unavailable, you should avoid ordering new tests for
     * this client, but any ordered tests will be honored when the client
     * recovers.
     */
    public function getStatus(): int
    {
        return $this->Status;
    }

    /**
     * Return if the client test support content blocking.
     */
    public function getSupportsContentBlocking(): bool
    {
        return $this->SupportsContentBlocking;
    }

    /**
     * Return the url of the window image.
     */
    public function getWindowImage(): ?string
    {
        return $this->WindowImage;
    }

    /**
     * The url of a capture of the client's inbox with external content blocking disabled,
     * this is the "images on" capture. You should only use this property if SupportsContentBlocking is true.
     */
    public function getWindowImageContentBlocking(): ?string
    {
        return $this->WindowImageContentBlocking;
    }

    /**
     * The url of a capture of the client's inbox with external content blocking enabled,
     * this is the "images off" capture. You should only use this property if SupportsContentBlocking is true.
     */
    public function getWindowImageNoContentBlocking(): ?string
    {
        return $this->WindowImageNoContentBlocking;
    }

    /**
     * Return the url of the window image thumbnail.
     */
    public function getWindowImageThumb(): ?string
    {
        return $this->WindowImageThumb;
    }

    /**
     * Return the url of the window image thumbnail with content blocking.
     */
    public function getWindowImageThumbContentBlocking(): ?string
    {
        return $this->WindowImageThumbContentBlocking;
    }

    /**
     * Return the url of the window image thumbnail without content blocking.
     */
    public function getWindowImageThumbNoContentBlocking(): ?string
    {
        return $this->WindowImageThumbNoContentBlocking;
    }

    public function setApplicationLongName(string $value): self
    {
        $this->ApplicationLongName = $value;

        return $this;
    }

    public function setApplicationName(string $value): self
    {
        $this->ApplicationName = $value;

        return $this;
    }

    public function setAverageTimeToProcess(int $value): self
    {
        $this->AverageTimeToProcess = $value;

        return $this;
    }

    public function setBusinessOrPopular(bool $value): self
    {
        $this->BusinessOrPopular = $value;

        return $this;
    }

    public function setCompleted(?bool $value): self
    {
        $this->Completed = $value;

        return $this;
    }

    public function setDesktopClient(?bool $value): self
    {
        $this->DesktopClient = $value;

        return $this;
    }

    public function setFoundInSpam(?bool $value): self
    {
        $this->FoundInSpam = $value;

        return $this;
    }

    public function setFullpageImage(?string $value): self
    {
        $this->FullpageImage = $value;

        return $this;
    }

    public function setFullpageImageContentBlocking(?string $value): self
    {
        $this->FullpageImageContentBlocking = $value;

        return $this;
    }

    public function setFullpageImageNoContentBlocking(?string $value): self
    {
        $this->FullpageImageNoContentBlocking = $value;

        return $this;
    }

    public function setFullpageImageThumb(?string $value): self
    {
        $this->FullpageImageThumb = $value;

        return $this;
    }

    public function setFullpageImageThumbContentBlocking(?string $value): self
    {
        $this->FullpageImageThumbContentBlocking = $value;

        return $this;
    }

    public function setFullpageImageThumbNoContentBlocking(?string $value): self
    {
        $this->FullpageImageThumbNoContentBlocking = $value;

        return $this;
    }

    public function setId(int $value): self
    {
        $this->Id = $value;

        return $this;
    }

    public function setPlatformLongName(?string $value): self
    {
        $this->PlatformLongName = $value;

        return $this;
    }

    public function setPlatformName(string $value): self
    {
        $this->PlatformName = $value;

        return $this;
    }

    public function setRenderedHtmlUrl(?string $value): self
    {
        $this->RenderedHtmlUrl = $value;

        return $this;
    }

    public function setResultType(string $value): self
    {
        $this->ResultType = $value;

        return $this;
    }

    public function setSpamHeaders(array $values): self
    {
        foreach ($values as $spam_header_params) {
            $this->addSpamHeader(new SpamHeader(
                $spam_header_params['Key'],
                $spam_header_params['Description'],
                $spam_header_params['Rating'],
            ));
        }

        return $this;
    }

    public function setSpamScore(float $value): self
    {
        $this->SpamScore = $value;

        return $this;
    }

    public function setState(?string $value): self
    {
        $this->State = $value;

        return $this;
    }

    public function setStatus(int $value): self
    {
        $this->Status = $value;

        return $this;
    }

    public function setSupportsContentBlocking(bool $value): self
    {
        $this->SupportsContentBlocking = $value;

        return $this;
    }

    public function setWindowImage(?string $value): self
    {
        $this->WindowImage = $value;

        return $this;
    }

    public function setWindowImageContentBlocking(?string $value): self
    {
        $this->WindowImageContentBlocking = $value;

        return $this;
    }

    public function setWindowImageNoContentBlocking(?string $value): self
    {
        $this->WindowImageNoContentBlocking = $value;

        return $this;
    }

    public function setWindowImagethumb(?string $value): self
    {
        $this->WindowImageThumb = $value;

        return $this;
    }

    public function setWindowImageThumbContentBlocking(?string $value): self
    {
        $this->WindowImageThumbContentBlocking = $value;

        return $this;
    }

    public function setWindowImageThumbNoContentBlocking(?string $value): self
    {
        $this->WindowImageThumbNoContentBlocking = $value;

        return $this;
    }
}
