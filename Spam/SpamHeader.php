<?php

namespace Litmus\Spam;

/**
 * SpamHeader class
 *
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 * @package   LitmusAPI
 * @version   1.1
 * @access    public
 * @copyright Copyright (c) 2011, Yzalis
 */
class SpamHeader
{
	private $Key;
	private $Description;
	private $Rating;

    /**
     * @param array $params 
     */
    public function __construct($params = array())
    {
        if ($params != array()) {
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
    }

    /**
     * 
     *
     * @param string $v The description.
     */
    public function setDescription($v)
    {
      $this->Description = (string)$v;
    }

    /**
     * 
     *
     * @param string $v The rating.
     */
    public function setRating($v)
    {
      $this->Rating = (string)$v;
    }
}