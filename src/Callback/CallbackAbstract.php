<?php

declare(strict_types=1);

namespace Phlib\LitmusResellerSDK\Callback;

/**
 * @package Phlib\Litmus-Reseller-SDK
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 */
abstract class CallbackAbstract
{
    private int $Id;

    private string $ApiId;

    private bool $SupportsContentBlocking;

    private string $State;

    private string $CallbackUrl;

    public function __construct(
        int $id,
        string $apiId,
        bool $supportsContentBlocking,
        string $state,
        string $callbackUrl
    ) {
        $this->Id = $id;
        $this->ApiId = $apiId;
        $this->SupportsContentBlocking = $supportsContentBlocking;
        $this->State = $state;
        $this->CallbackUrl = $callbackUrl;
    }

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
}
