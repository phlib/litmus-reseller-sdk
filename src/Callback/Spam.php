<?php

declare(strict_types=1);

namespace Phlib\LitmusResellerSDK\Callback;

use Phlib\LitmusResellerSDK\Spam\SpamResult;

/**
 * @package Phlib\Litmus-Reseller-SDK
 */
class Spam extends CallbackAbstract
{
    private SpamResult $spamResult;

    public function __construct(
        int $id,
        string $apiId,
        bool $supportsContentBlocking,
        string $state,
        string $callbackUrl,
        SpamResult $spamResult
    ) {
        parent::__construct(
            $id,
            $apiId,
            $supportsContentBlocking,
            $state,
            $callbackUrl
        );

        $this->spamResult = $spamResult;
    }

    public function getSpamResult(): SpamResult
    {
        return $this->spamResult;
    }
}
