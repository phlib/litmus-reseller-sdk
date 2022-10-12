<?php

declare(strict_types=1);

namespace Phlib\LitmusResellerSDK\Callback;

use Phlib\LitmusResellerSDK\Spam\SpamResult;

/**
 * @package Phlib\Litmus-Reseller-SDK
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 */
abstract class CallbackAbstract
{
    private int $Id;

    private string $ApiId;

    private bool $SupportsContentBlocking;

    private array $ResultImageSet;

    private SpamResult $SpamResult;

    private string $State;

    private string $CallbackUrl;

    /**
     * This code references the platform for the specific test result.
     * It will match the ApplicationName property of the results collection.
     */
    public function getApiId(): string
    {
        return $this->ApiId;
    }

    /**
     * Your custom callback URL.
     */
    public function getCallbackUrl(): string
    {
        return $this->CallbackUrl;
    }

    /**
     * This is the most important property, it's the unique identifier for your test.
     */
    public function getId(): int
    {
        return $this->Id;
    }

    public function getResultImageSet(): array
    {
        return $this->ResultImageSet;
    }

    public function getSpamResult(): SpamResult
    {
        return $this->SpamResult;
    }

    /**
     * Indicates the current status of your test.
     * By the time you receive a callback the most likely value is Completed.
     */
    public function getState(): string
    {
        return $this->State;
    }

    /**
     * This value indicates true if the requested client supports content blocking and false if it does not.
     * Content blocking clients, sometimes referred to as image blocking,
     * will return different result images for ImagesOn and ImagesOff.
     * This value will always be false for a spam test.
     */
    public function getSupportsContentBlocking(): bool
    {
        return $this->SupportsContentBlocking;
    }

    /**
     * This code references the platform for the specific test result.
     * It will match the ApplicationName property of the results collection.
     *
     * @param string $v The client application code.
     */
    public function setApiId(string $v): self
    {
        $this->ApiId = $v;

        return $this;
    }

    public function setCallbackUrl(string $v): self
    {
        $this->CallbackUrl = (string)$v;

        return $this;
    }

    /**
     * This is the most important property, it's the unique identifier for your test.
     */
    public function setId(int $v): self
    {
        $this->Id = $v;

        return $this;
    }

    /**
     * The ResultImageSet, as the name would suggest is the collection of images that makes up your completed test.
     * It consists of two main blocks ImagesOnUrls and ImagesOffUrls.
     * Each main block contains two sub blocks for WindowUrls and FullPageUrls.
     * Further, each capture block contains an ImageUrl and ThumbUrl.
     * For clients that do not support content blocking the outerblocks
     * (ImagesOnUrls and ImagesOffUrls) will be identical.
     * For clients who do support content blocking (SupportsContentBlocking == true)
     * the ImagesOffUrl will show the blocked versions and ImagesOnUrl will show the non-blocked versions.
     *
     * @param array $v The array of the result image set.
     */
    public function setResultImageSet(array $v): self
    {
        $this->ResultImageSet = $v;

        return $this;
    }

    /**
     * The SpamResult including state, score and SpamAssassin headers.
     *
     * @param array $v The array of the result spam set.
     */
    public function setSpamResult(array $v): self
    {
        $this->SpamResult = new SpamResult($v);

        return $this;
    }

    /**
     * Indicates the current status of your test.
     * By the time you receive a callback the most likely value is Completed.
     *
     * @param string $v The state of the test.
     */
    public function setState(string $v): self
    {
        $this->State = $v;

        return $this;
    }

    /**
     * This value indicates true if the requested client supports content blocking and false if it does not.
     * Content blocking clients, sometimes referred to as image blocking,
     * will return different result images for ImagesOn and ImagesOff.
     * This value will always be false for a spam test.
     */
    public function setSupportsContentBlocking(bool $v): self
    {
        $this->SupportsContentBlocking = $v;

        return $this;
    }
}
