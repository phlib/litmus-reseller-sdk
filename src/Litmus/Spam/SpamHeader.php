<?php

namespace Litmus\Spam;

/**
 * SpamHeader class
 *
 * @package Phlib\Litmus-Reseller-SDK
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 */
class SpamHeader
{
    private $Key;
    private $Description;
    private $Rating;

    /**
     * @param array $params
     */
    public function __construct($params = [])
    {
        if ($params != []) {
            foreach ($params as $k => $v) {
                $this->{'set' . $k}($v);
            }
        }
    }

    /**
     *
     *
     * @return string
     */
    public function getKey()
    {
          return $this->Key;
    }

    /**
     *
     *
     * @return string
     */
    public function getDescription()
    {
          return $this->Description;
    }

    /**
     *
     *
     * @return string
     */
    public function getRating()
    {
          return $this->Rating;
    }

    /**
     *
     *
     * @param string $v The key.
     */
    public function setKey($v)
    {
        $this->Key = (string)$v;

        return $this;
    }

    /**
     *
     *
     * @param string $v The description.
     */
    public function setDescription($v)
    {
        $this->Description = (string)$v;

        return $this;
    }

    /**
     *
     *
     * @param string $v The rating.
     */
    public function setRating($v)
    {
        $this->Rating = (string)$v;

        return $this;
    }
}
