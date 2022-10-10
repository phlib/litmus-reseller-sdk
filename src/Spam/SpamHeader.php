<?php

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

    public function __construct(array $params = [])
    {
        if ($params != []) {
            foreach ($params as $k => $v) {
                $this->{'set' . $k}($v);
            }
        }
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

    public function setKey(string $v): self
    {
        $this->Key = $v;

        return $this;
    }

    public function setDescription(string $v): self
    {
        $this->Description = $v;

        return $this;
    }

    public function setRating(int $v): self
    {
        $this->Rating = $v;

        return $this;
    }
}
