<?php

declare(strict_types=1);

namespace Phlib\LitmusResellerSDK\Spam;

use function Phlib\String\toBoolean;

/**
 * SpamResult class
 *
 * @package Phlib\Litmus-Reseller-SDK
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 */
class SpamResult
{
    private float $SpamScore;

    private bool $IsSpam;

    private array $SpamHeaders;

    public function __construct(array $params = [])
    {
        $this->SpamHeaders = [];

        foreach ($params as $k => $v) {
            $this->{'set' . $k}($v);
        }
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

    public function setSpamScore(float $v): self
    {
        $this->SpamScore = $v;

        return $this;
    }

    public function setIsSpam(bool $v): self
    {
        $this->IsSpam = toBoolean($v);

        return $this;
    }

    public function setSpamHeaders(array $values): self
    {
        foreach ($values as $spam_header_params) {
            $this->addSpamHeader(new SpamHeader($spam_header_params));
        }

        return $this;
    }

    public function addSpamHeader(SpamHeader $SpamHeader): self
    {
        $this->SpamHeaders[] = $SpamHeader;

        return $this;
    }
}
