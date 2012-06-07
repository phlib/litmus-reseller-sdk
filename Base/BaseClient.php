<?php

namespace Yzalis\Components\Litmus\Base;

/**
 * BaseClient class
 *
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 * @package   LitmusResellerAPI
 * @version   1.1
 * @access    public
 * @copyright Copyright (c) 2011, Yzalis
 */
class BaseClient
{
    public $ApplicationLongName;
    public $ApplicationName;
    public $AverageTimeToProcess;
    public $BusinessOrPopular;
    public $Completed;
    public $DesktopClient;
    public $FoundInSpam;
    public $FullpageImage;
    public $FullpageImageContentBlocking;
    public $FullpageImageNoContentBlocking;
    public $FullpageImageThumb;
    public $FullpageImageThumbContentBlocking;
    public $FullpageImageThumbNoContentBlocking;
    public $Id;
    public $PlatformLongName;
    public $PlatformName;
    public $RenderedHtmlUrl;
    public $ResultType;
    public $SpamHeaders;
    public $SpamScore;
    public $State;
    public $Status;
    public $SupportsContentBlocking;
    public $WindowImage;
    public $WindowImageContentBlocking;
    public $WindowImageNoContentBlocking;
    public $WindowImageThumb;
    public $WindowImageThumbContentBlocking;
    public $WindowImageThumbNoContentBlocking;

    /**
     * @param array $params
     */
    function __construct($params = array())
    {
        $this->SpamHeaders = array();

        if ($params != array()) {
            foreach ($params as $k => $v) {
                $this->{'set' . $k}($v);
            }
        }
    }

    /**
     * Add a SpamHeader to the SpamHeaders array
     */
    public function addSpamHeader(SpamHeader $SpamHeader)
    {
        $this->SpamHeaders[] = $SpamHeader;
    }

    /**
     * Return the longer, friendlier name of this client that you can show to your users.
     *
     * @return string
     */
    public function getApplicationLongName()
    {
        return $this->ApplicationLongName;
    }

    /**
     * Return a unique identifier for this client.
     *
     * @return string
     */
    public function getApplicationName()
    {
        return $this->ApplicationName;
    }

    /**
     * Return the average amount of time (in seconds) it is currently taking to process a result in this client.
     *
     * @return int
     */
    public function getAverageTimeToProcess()
    {
        return $this->AverageTimeToProcess;
    }

    /**
     *
     */
    public function getBusinessOrPopular()
    {
        return $this->BusinessOrPopular;
    }

    /**
     * Return if the test is completed.
     *
     * @return boolean
     */
    public function getCompleted()
    {
        return $this->Completed;
    }

    /**
     * Desktop clients are those that run locally, on the desktop. Examples include Outlook, Lotus Notes, Apple Mail and Thunderbird. Email clients such as Gmail, AOL and Hotmail would have a DesktopClient value of false.
     *
     * @return boolean
     */
    public function getDesktopClient()
    {
        return $this->DesktopClient;
    }

    /**
     * Indicates if the email was found in this client's spam folder. Since not all clients support this property, it may always be false for some cilents.
     *
     * @return boolean
     */
    public function getFoundInSpam()
    {
        return $this->FoundInSpam;
    }

    /**
     * The uri of a capture of the email opened in the client. You should only use this property if SupportsContentBlocking is false.
     *
     * @return string
     */
    public function getFullpageImage()
    {
        return $this->FullpageImage;
    }

    /**
     * The url of a capture of the email opened by the client with external content blocking enabled, this is the "images off" capture. You should only use this property if SupportsContentBlocking is true.
     *
     * @return string
     */
    public function getFullpageImageContentBlocking()
    {
        return $this->FullpageImageContentBlocking;
    }

    /**
     * The url of a capture of the email opened by the client with external content blocking disabled, this is the "images on" capture. You should only use this property if SupportsContentBlocking is true.
     *
     * @return string
     */
    public function getFullpageImageNoContentBlocking()
    {
        return $this->FullpageImageNoContentBlocking;
    }

    /**
     * Return the url of the full page image thumbnail with content blocking.
     *
     * @return string
     */
    public function getFullpageImageThumb()
    {
        return $this->FullpageImageThumb;
    }

    /**
     * Return the url of the full page image thumbnail with content blocking.
     *
     * @return string
     */
    public function getFullpageImageThumbContentBlocking()
    {
        return $this->FullpageImageThumbContentBlocking;
    }

    /**
     * Return the url of the full page image thumbnail without content blocking.
     *
     * @return string
     */
    public function getFullpageImageThumbNoContentBlocking()
    {
        return $this->FullpageImageThumbNoContentBlocking;
    }

    /**
     * Return the unique identifier of this client test.
     *
     * @return string
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * The long, friendly name of the platform this client is running on.
     *
     * @return string
     */
    public function getPlatformLongName()
    {
        return $this->PlatformLongName;
    }

    /**
     * The shorter name of the platform, usually excludes the manufacturer of the operating system.
     *
     * @return string
     */
    public function getPlatformName()
    {
        return $this->PlatformName;
    }

    /**
     * Reserved. Please ignore.
     *
     * @return string
     */
    public function getRenderedHtmlUrl()
    {
        return $this->RenderedHtmlUrl;
    }

    /**
     * Return the result type of the client test. Contains either "email", "spam" or "page".
     *
     * @return string
     */
    public function getResultType()
    {
        return $this->ResultType;
    }

    /**
     *
     */
    public function getSpamHeaders()
    {
        return $this->SpamHeaders;
    }

    /**
     * If the ResultType was equal to "spam", this property may contain a score left by the spam filter this Client object represents.
     *
     * @return double
     */
    public function getSpamScore()
    {
        return $this->SpamScore;
    }

    /**
     * Return the current state of the result test, it can be either "pending", "complete" or "error".
     *
     * @return string
     */
    public function getState()
    {
        return $this->State;
    }

    /**
     * Represents a client's current status. A status of 0 indicates all is
     * well, no delays. A status of 1 indicate the client is running slower than
     * usual, expect delays of up to 15 minutes. A status of 2 indicate the
     * client is currently unavailable, you should avoid ordering new tests for
     * this client, but any ordered tests will be honored when the client
     * recovers.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * Return if the client test support content blocking.
     *
     * @return int
     */
    public function getSupportsContentBlocking()
    {
        return $this->SupportsContentBlocking;
    }

    /**
     * Return the url of the window image.
     *
     * @return string
     */
    public function getWindowImage()
    {
        return $this->WindowImage;
    }

    /**
     * The url of a capture of the client's inbox with external content blocking disabled, this is the "images on" capture. You should only use this property if SupportsContentBlocking is true.
     *
     * @return string
     */
    public function getWindowImageContentBlocking()
    {
        return $this->WindowImageContentBlocking;
    }

    /**
     * The url of a capture of the client's inbox with external content blocking enabled, this is the "images off" capture. You should only use this property if SupportsContentBlocking is true.
     *
     * @return string
     */
    public function getWindowImageNoContentBlocking()
    {
        return $this->WindowImageNoContentBlocking;
    }

    /**
     * Return the url of the window image thumbnail.
     *
     * @return string
     */
    public function getWindowImageThumb()
    {
        return $this->WindowImageThumb;
    }

    /**
     * Return the url of the window image thumbnail with content blocking.
     *
     * @return string
     */
    public function getWindowImageThumbContentBlocking()
    {
        return $this->WindowImageThumbContentBlocking;
    }

    /**
     * Return the url of the window image thumbnail without content blocking.
     *
     * @return string
     */
    public function getWindowImageThumbNoContentBlocking()
    {
        return $this->WindowImageThumbNoContentBlocking;
    }

    /**
     *
     *
     * @return
     */
    public function setApplicationLongName($value)
    {
        $this->ApplicationLongName = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setApplicationName($value)
    {
        $this->ApplicationName = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setAverageTimeToProcess($value)
    {
        $this->AverageTimeToProcess = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setBusinessOrPopular($value)
    {
        $this->BusinessOrPopular = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setCompleted($value)
    {
        $this->Completed = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setDesktopClient($value)
    {
        $this->DesktopClient = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setFoundInSpam($value)
    {
        $this->FoundInSpam = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setFullpageImage($value)
    {
        $this->FullpageImage = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setFullpageImageContentBlocking($value)
    {
        $this->FullpageImageContentBlocking = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setFullpageImageNoContentBlocking($value)
    {
        $this->FullpageImageNoContentBlocking = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setFullpageImageThumb($value)
    {
        $this->FullpageImageThumb = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setFullpageImageThumbContentBlocking($value)
    {
        $this->FullpageImageThumbContentBlocking = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setFullpageImageThumbNoContentBlocking($value)
    {
        $this->FullpageImageThumbNoContentBlocking = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setId($value)
    {
        $this->Id = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setPlatformLongName($value)
    {
        $this->PlatformLongName = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setPlatformName($value)
    {
        $this->PlatformName = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setRenderedHtmlUrl($value)
    {
        $this->RenderedHtmlUrl = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setResultType($value)
    {
        $this->ResultType = $value;
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
     *
     *
     * @return
     */
    public function setSpamScore($value)
    {
        $this->SpamScore = (double)$value;
    }

    /**
     *
     *
     * @return
     */
    public function setState($value)
    {
        $this->State = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setStatus($value)
    {
        $this->Status = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setSupportsContentBlocking($value)
    {
        $this->SupportsContentBlocking = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setWindowImage($value)
    {
        $this->WindowImage = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setWindowImageContentBlocking($value)
    {
        $this->WindowImageContentBlocking = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setWindowImageNoContentBlocking($value)
    {
        $this->WindowImageNoContentBlocking = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setWindowImagethumb($value)
    {
        $this->WindowImageThumb = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setWindowImageThumbContentBlocking($value)
    {
        $this->WindowImageThumbContentBlocking = $value;
    }

    /**
     *
     *
     * @return
     */
    public function setWindowImageThumbNoContentBlocking($value)
    {
        $this->WindowImageThumbNoContentBlocking = $value;
    }
}