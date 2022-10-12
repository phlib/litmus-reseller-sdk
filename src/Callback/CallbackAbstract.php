<?php

namespace Phlib\LitmusResellerSDK\Callback;

use Phlib\LitmusResellerSDK\Spam\SpamResult;

use function Phlib\String\toBoolean;

/**
 * @package Phlib\Litmus-Reseller-SDK
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 */
abstract class CallbackAbstract
{
    private static $instance;

    private $Id;

    private $ApiId;

    private $SupportsContentBlocking;

    private $ResultImageSet;

    private $SpamResult;

    private $State;

    private $Type;

    private $CallbackUrl;

    /**
     * Hydrate a CallBack object with a callback xml
     *
     * @param $xmlCallback SpamCallback or EmailCallback
     */
    public static function hydrateXmlCallback($xmlCallback)
    {
        if ($xmlCallback === null || empty($xmlCallback)) {
            throw new \InvalidArgumentException('You must provid a callback string.');
        }

        // convert the utf-16 to utf-8
        $xmlCallback = preg_replace('/(<\?xml[^?]+?)utf-16/i', '$1utf-8', $xmlCallback);
        $xml = simplexml_load_string($xmlCallback);

        $callbackType = (string)$xml->attributes()->type;
        switch ($callbackType) {
            case 'mail':
                $object = new Email();
                break;
            case 'spam':
                $object = new Spam();
                break;
            default:
                throw new \InvalidArgumentException(sprintf('Unknow callback type "%s"', $callbackType));
                break;
        }

        foreach ($xml as $key => $value) {
            $object->{'set' . $key}($value);
        }
        $object->setType($callbackType);

        self::$instance = $object;

        return self::$instance;
    }

    /**
     * This code references the platform for the specific test result.
     * It will match the ApplicationName property of the results collection.
     *
     * @return string
     */
    public function getApiId()
    {
        return $this->ApiId;
    }

    /**
     * Your custom callback URL.
     *
     * @return string
     */
    public function getCallbackUrl()
    {
        return $this->CallbackUrl;
    }

    /**
     * This is the most important property, it's the unique identifer for your test.
     *
     * @return string
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @return array
     */
    public function getResultImageSet()
    {
        return $this->ResultImageSet;
    }

    /**
     * @return array
     */
    public function getSpamResult()
    {
        return $this->SpamResult;
    }

    /**
     * Indicates the current status of your test.
     * By the time you receive a callback the most likely value is Completed.
     *
     * @return string
     */
    public function getState()
    {
        return $this->State;
    }

    /**
     * This value indicates true if the requested client supports content blocking and false if it does not.
     * Content blocking clients, sometimes referred to as image blocking,
     * will return different result images for ImagesOn and ImagesOff.
     * This value will always be false for a spam test.
     *
     * @return boolean
     */
    public function getSupportsContentBlocking()
    {
        return $this->SupportsContentBlocking;
    }

    /**
     * @return array
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * This code references the platform for the specific test result.
     * It will match the ApplicationName property of the results collection.
     *
     * @param string $v The client application code.
     */
    public function setApiId($v)
    {
        $this->ApiId = (string)$v;

        return $this;
    }

    /**
     * Your custom callback URL.
     *
     * @return string
     */
    public function setCallbackUrl($v)
    {
        $this->CallbackUrl = (string)$v;

        return $this;
    }

    /**
     * This is the most important property, it's the unique identifer for your test.
     *
     * @param string $v The unique identifier of the test.
     */
    public function setId($v)
    {
        $this->Id = (string)$v;

        return $this;
    }

    /**
     * The ResultImageSet, as the name would suggest is the collection of images that makes up your completed test.
     * It consists of two main blocks ImagesOnUrls and ImagesOffUrls.
     * Each main block contains two sub blocks for WindowUrls and FullPageUrls.
     * Further, each capture block contains an ImageUrl and ThumbUrl.
     * For clients that do not support content blocking the outerblocks
     * (ImagesOnUrls and ImagesOffUrls) will be identical.
     * For clients who do support content blocking (SupportsContentBlocking == true)
     * the ImagesOffUrl will show the blocked versions and ImagesOnUrl will show the non-blocked versions.
     *
     * @param array $v The array of the result image set.
     */
    public function setResultImageSet($v)
    {
        $this->ResultImageSet = (array)$v;

        return $this;
    }

    /**
     * The SpamResult including state, score and SpamAssassin headers.
     *
     * @param array $v The array of the result spam set.
     */
    public function setSpamResult($v)
    {
        $this->SpamResult = new SpamResult($v);

        return $this;
    }

    /**
     * Indicates the current status of your test.
     * By the time you receive a callback the most likely value is Completed.
     *
     * @param string $v The state of the test.
     */
    public function setState($v)
    {
        $this->State = (string)$v;

        return $this;
    }

    /**
     * This value indicates true if the requested client supports content blocking and false if it does not.
     * Content blocking clients, sometimes referred to as image blocking,
     * will return different result images for ImagesOn and ImagesOff.
     * This value will always be false for a spam test.
     *
     * @param boolean $v If the test support content blocking.
     */
    public function setSupportsContentBlocking($v)
    {
        $this->SupportsContentBlocking = toBoolean($v);

        return $this;
    }

    /**
     * @param string $v The state of the test.
     */
    public function setType($v)
    {
        $this->Type = (string)$v;

        return $this;
    }
}
