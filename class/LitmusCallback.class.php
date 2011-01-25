<?php

/*
 * LitmusCallback class
 *
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 * @package   LitmusAPI
 * @version   1.0
 * @access    public
 * @copyright Copyright (c) 2011, Yzalis
 */
class LitmusCallback
{
    private $Type;
    private $Id;
    private $ApiId;
    private $SupportsContentBlocking;
    private $ResultImageSet;
    private $SpamResult;
    private $State;
    private $CallbackUrl;


    /*
     * Construct a LitmusCallBack object with a callback xml.
     *
     * @param $values array
     */
    function __construct($callback = null)
    {
      if (!is_null($callback) && !empty($callback))
      {
        try
        {
          # convert the utf-16 to utf-8
          $callback = preg_replace('/(<\?xml[^?]+?)utf-16/i', '$1utf-8', $callback);

          $xml = simplexml_load_string($callback);
          foreach ($xml as $key => $value)
          {
              $this->{'set' . $key}($value);
          }
          
          $this->setType($xml->{'@attributes'}->type);
        }
        catch (Exception $e)
        {
          return false;
        }
      }
    }

    /*
     *
     *
     * @return string
     */
    public function getApiId()
    {
      return $this->ApiId;
    }

    /*
     *
     *
     * @return string
     */
    public function getCallbackUrl()
    {
      return $this->CallbackUrl;
    }

    /*
     *
     *
     * @return string
     */
    public function getId()
    {
      return $this->Id;
    }

    /*
     *
     *
     * @return array
     */
    public function getResultImageSet()
    {
      return $this->ResultImageSet;
    }

    /*
     *
     *
     * @return array
     */
    public function getSpamResult()
    {
      return $this->SpamResult;
    }

    /*
     *
     *
     * @return string
     */
    public function getState()
    {
      return $this->State;
    }

    /*
     *
     *
     * @return boolean
     */
    public function getSupportsContentBlocking()
    {
      return $this->SupportsContentBlocking;
    }

    /*
     *
     *
     * @return string
     */
    public function getType()
    {
      return $this->Type;
    }

    /*
     *
     *
     * @param string $v The client application code.
     */
    public function setApiId($v)
    {
      $this->ApiId = (string)$v;
    }

    /*
     *
     *
     * @return string
     */
    public function setCallbackUrl($v)
    {
      $this->CallbackUrl = (string)$v;
    }

    /*
     *
     *
     * @param string $v The unique identifier of the test.
     */
    public function setId($v)
    {
      $this->Id = (string)$v;
    }

    /*
     *
     *
     * @param array $v The array of the result image set.
     */
    public function setResultImageSet($v)
    {
      $this->ResultImageSet = (array)$v;
    }

    /*
     *
     *
     * @param array $v The array of the result spam set.
     */
    public function setSpamResult($v)
    {
      $this->SpamResult = (array)$v;
    }

    /*
     *
     *
     * @param string $v The state of the test.
     */
    public function setState($v)
    {
      $this->State = (string)$v;
    }

    /*
     *
     *
     * @param boolean $v If the test support content blocking.
     */
    public function setSupportsContentBlocking($v)
    {
      $this->SupportsContentBlocking = (boolean)$v;
    }

    /*
     *
     *
     * @param string $v The type of the test.
     */
    public function setType($v)
    {
      $this->Type = (string)$v;
    }
    
}

?>
