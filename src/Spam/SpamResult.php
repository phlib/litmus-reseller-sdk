<?php

declare(strict_types=1);

namespace Phlib\LitmusResellerSDK\Spam;

/**
 * @package Phlib\Litmus-Reseller-SDK
 */
class SpamResult
{
    private float $SpamScore;

    private bool $IsSpam;

    private array $SpamHeaders;

    public function __construct(
        float $spamScore,
        bool $isSpam,
        array $spamHeaders
    ) {
        $this->SpamScore = $spamScore;
        $this->IsSpam = $isSpam;
        $this->SpamHeaders = $spamHeaders;
    }

    public function getSpamScore(): float
    {
        return $this->SpamScore;
    }

    public function getIsSpam(): bool
    {
        return $this->IsSpam;
    }

    public function getSpamHeaders(): array
    {
        return $this->SpamHeaders;
    }
}
