<?php

declare(strict_types=1);

namespace Phlib\LitmusResellerSDK\Callback;

/**
 * @package Phlib\Litmus-Reseller-SDK
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 */
class Email extends CallbackAbstract
{
    private array $resultImageSet;

    public function __construct(
        int $id,
        string $apiId,
        bool $supportsContentBlocking,
        string $state,
        string $callbackUrl,
        array $resultImageSet
    ) {
        parent::__construct(
            $id,
            $apiId,
            $supportsContentBlocking,
            $state,
            $callbackUrl
        );

        $this->resultImageSet = $resultImageSet;
    }

    public function getResultImageSet(): array
    {
        return $this->resultImageSet;
    }
}
