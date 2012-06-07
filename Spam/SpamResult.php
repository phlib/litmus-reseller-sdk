<?php

namespace Yzalis\Components\Litmus\Spam;

/**
 * SpamResult class
 *
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 * @package   LitmusResellerAPI
 * @version   1.1
 * @access    public
 * @copyright Copyright (c) 2011, Yzalis
 */
class SpamResult
{
    private $SpamScore;
    private $IsSpam;
    private $SpamHeaders;

    /**
     * @param array $params
     */
    public function __construct($params = array())
    {
        $this->SpamHeaders = array();

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
    public function getSpamScore()
    {
      	return $this->SpamScore;
    }

    /**
     *
     *
     * @return string
     */
    public function getIsSpam()
    {
      	return $this->IsSpam;
    }

    /**
     *
     *
     * @return string
     */
    public function getSpamHeaders()
    {
      	return $this->SpamHeaders;
    }

    /**
     *
     *
     * @param string $v The spam score.
     */
    public function setSpamScore($v)
    {
      $this->SpamScore = (double)$v;
    }

    /**
     *
     *
     * @param string $v The spam state.
     */
    public function setIsSpam($v)
    {
      $this->IsSpam = (boolean)$v;
    }

    /**
     *
     *
     * @param string $values The spam headers.
     */
    public function setSpamHeaders($values)
    {
        foreach ($values as $spam_header_params) {
            $this->addSpamHeader(new SpamHeader($spam_header_params));
        }
    }

    /**
     * Add a SpamHeader to the SpamHeaders array
     */
    public function addSpamHeader(SpamHeader $SpamHeader)
    {
        $this->SpamHeaders[] = $SpamHeader;
    }
}