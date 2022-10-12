<?php

declare(strict_types=1);

namespace Phlib\LitmusResellerSDK\Spam;

/**
 * SpamHeader class
 *
 * @package Phlib\Litmus-Reseller-SDK
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 */
class SpamHeader
{
    private string $Key;

    private string $Description;

    private int $Rating;

    public function __construct(
        string $key,
        string $description,
        int $rating
    ) {
        $this->Key = $key;
        $this->Description = $description;
        $this->Rating = $rating;
    }

    public function getKey(): string
    {
        return $this->Key;
    }

    public function getDescription(): string
    {
        return $this->Description;
    }

    public function getRating(): int
    {
        return $this->Rating;
    }
}
