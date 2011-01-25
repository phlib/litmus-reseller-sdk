<?php

/*
 * LitmusClients class
 *
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 * @package   LitmusAPI
 * @version   1.0
 * @access    public
 * @copyright Copyright (c) 2011, Yzalis
 */
class LitmusClient
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

    /*
     * @param array $params 
     */
    function __construct($params = array())
    {
        if ($params != array())
        {
            foreach ($params as $k => $v)
            {
                $this->$k = $v;
            }
        }
    }

    /*
     * Return the longer, friendlier name of this client that you can show to your users.
     *
     * @return string
     */
    public function getApplicationLongName()
    {
        return $this->ApplicationLongName;
    }

    /*
     * Return a unique identifier for this client.
     *
     * @return string
     */
    public function getApplicationName()
    {
        return $this->ApplicationName;
    }

    /*
     * Return the average amount of time (in seconds) it is currently taking to process a result in this client.
     *
     * @return int
     */
    public function getAverageTimeToProcess()
    {
        return $this->AverageTimeToProcess;
    }

    public function getBusinessOrPopular()
    {
        return $this->BusinessOrPopular;
    }

    /*
     * Return if the test is completed.
     *
     * @return boolean
     */
    public function getCompleted()
    {
        return $this->Completed;
    }

    /*
     * Desktop clients are those that run locally, on the desktop. Examples include Outlook, Lotus Notes, Apple Mail and Thunderbird. Email clients such as Gmail, AOL and Hotmail would have a DesktopClient value of false.
     *
     * @return boolean
     */
    public function getDesktopClient()
    {
        return $this->DesktopClient;
    }

    /*
     * Indicates if the email was found in this client's spam folder. Since not all clients support this property, it may always be false for some cilents.
     *
     * @return boolean
     */
    public function getFoundInSpam()
    {
        return $this->FoundInSpam;
    }

    /*
     * The uri of a capture of the email opened in the client. You should only use this property if SupportsContentBlocking is false.
     *
     * @return string
     */
    public function getFullpageImage()
    {
        return $this->FullpageImage;
    }

    /*
     * The url of a capture of the email opened by the client with external content blocking enabled, this is the "images off" capture. You should only use this property if SupportsContentBlocking is true.
     *
     * @return string
     */
    public function getFullpageImageContentBlocking()
    {
        return $this->FullpageImageContentBlocking;
    }

    /*
     * The url of a capture of the email opened by the client with external content blocking disabled, this is the "images on" capture. You should only use this property if SupportsContentBlocking is true.
     *
     * @return string
     */
    public function getFullpageImageNoContentBlocking()
    {
        return $this->FullpageImageNoContentBlocking;
    }

    /*
     * Return the url of the full page image thumbnail with content blocking.
     *
     * @return string
     */
    public function getFullpageImageThumb()
    {
        return $this->FullpageImageThumb;
    }

    /*
     * Return the url of the full page image thumbnail with content blocking.
     *
     * @return string
     */
    public function getFullpageImageThumbContentBlocking()
    {
        return $this->FullpageImageThumbContentBlocking;
    }

    /*
     * Return the url of the full page image thumbnail without content blocking.
     *
     * @return string
     */
    public function getFullpageImageThumbNoContentBlocking()
    {
        return $this->FullpageImageThumbNoContentBlocking;
    }

    /*
     * Return the unique identifier of this client test.
     *
     * @return string
     */
    public function getId()
    {
        return $this->Id;
    }

    /*
     * The long, friendly name of the platform this client is running on.
     *
     * @return string
     */
    public function getPlatformLongName()
    {
        return $this->PlatformLongName;
    }

    /*
     * The shorter name of the platform, usually excludes the manufacturer of the operating system.
     *
     * @return string
     */
    public function getPlatformName()
    {
        return $this->PlatformName;
    }

    /*
     * Reserved. Please ignore.
     *
     * @return string
     */
    public function getRenderedHtmlUrl()
    {
        return $this->RenderedHtmlUrl;
    }

    /*
     * Return the result type of the client test. Contains either "email", "spam" or "page".
     *
     * @return string
     */
    public function getResultType()
    {
        return $this->ResultType;
    }

    /*
     *
     *
     * @return
     */
    public function getSpamHeaders()
    {
        return $this->SpamHeaders;
    }

    /*
     * If the ResultType was equal to "spam", this property may contain a score left by the spam filter this Client object represents.
     *
     * @return double
     */
    public function getSpamScore()
    {
        return $this->SpamScore;
    }

    /*
     * Return the current state of the result test, it can be either "pending", "complete" or "error".
     *
     * @return string
     */
    public function getState()
    {
        return $this->State;
    }

    /*
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

     /*
     * Return if the client test support content blocking.
     *
     * @return int
     */
    public function getSupportsContentBlocking()
    {
        return $this->SupportsContentBlocking;
    }

    /*
     * Return the url of the window image.
     *
     * @return string
     */
    public function getWindowImage()
    {
        return $this->WindowImage;
    }

    /*
     * The url of a capture of the client's inbox with external content blocking disabled, this is the "images on" capture. You should only use this property if SupportsContentBlocking is true.
     *
     * @return string
     */
    public function getWindowImageContentBlocking()
    {
        return $this->WindowImageContentBlocking;
    }

    /*
     * The url of a capture of the client's inbox with external content blocking enabled, this is the "images off" capture. You should only use this property if SupportsContentBlocking is true.
     *
     * @return string
     */
    public function getWindowImageNoContentBlocking()
    {
        return $this->WindowImageNoContentBlocking;
    }

    /*
     * Return the url of the window image thumbnail.
     *
     * @return string
     */
    public function getWindowImageThumb()
    {
        return $this->WindowImageThumb;
    }

    /*
     * Return the url of the window image thumbnail with content blocking.
     *
     * @return string
     */
    public function getWindowImageThumbContentBlocking()
    {
        return $this->WindowImageThumbContentBlocking;
    }

    /*
     * Return the url of the window image thumbnail without content blocking.
     *
     * @return string 
     */
    public function getWindowImageThumbNoContentBlocking()
    {
        return $this->WindowImageThumbNoContentBlocking;
    }

    public function setApplicationLongName($value)
    {
        $this->ApplicationLongName = $value;
    }

    public function setApplicationName($value)
    {
        $this->ApplicationName = $value;
    }

    public function setAverasetimeToProcess($value)
    {
        $this->AverasetimeToProcess = $value;
    }

    public function setBusinessOrPopular($value)
    {
        $this->BusinessOrPopular = $value;
    }

    public function setCompleted($value)
    {
        $this->Completed = $value;
    }

    public function setDesktopClient($value)
    {
        $this->DesktopClient = $value;
    }

    public function setFoundInSpam($value)
    {
        $this->FoundInSpam = $value;
    }

    public function setFullpageImage($value)
    {
        $this->FullpageImage = $value;
    }

    public function setFullpageImageContentBlocking($value)
    {
        $this->FullpageImageContentBlocking = $value;
    }

    public function setFullpageImageNoContentBlocking($value)
    {
        $this->FullpageImageNoContentBlocking = $value;
    }

    public function setFullpageImasethumb($value)
    {
        $this->FullpageImasethumb = $value;
    }

    public function setFullpageImasethumbContentBlocking($value)
    {
        $this->FullpageImasethumbContentBlocking = $value;
    }

    public function setFullpageImasethumbNoContentBlocking($value)
    {
        $this->FullpageImasethumbNoContentBlocking = $value;
    }

    public function setId($value)
    {
        $this->Id = $value;
    }

    public function setPlatformLongName($value)
    {
        $this->PlatformLongName = $value;
    }

    public function setPlatformName($value)
    {
        $this->PlatformName = $value;
    }

    public function setRenderedHtmlUrl($value)
    {
        $this->RenderedHtmlUrl = $value;
    }

    public function setResultType($value)
    {
        $this->ResultType = $value;
    }

    public function setSpamHeaders($value)
    {
        $this->SpamHeaders = $value;
    }

    public function setSpamScore($value)
    {
        $this->SpamScore = $value;
    }

    public function setState($value)
    {
        $this->State = $value;
    }

    public function setStatus($value)
    {
        $this->Status = $value;
    }

    public function setSupportsContentBlocking($value)
    {
        $this->SupportsContentBlocking = $value;
    }

    public function setWindowImage($value)
    {
        $this->WindowImage = $value;
    }

    public function setWindowImageContentBlocking($value)
    {
        $this->WindowImageContentBlocking = $value;
    }

    public function setWindowImageNoContentBlocking($value)
    {
        $this->WindowImageNoContentBlocking = $value;
    }

    public function setWindowImasethumb($value)
    {
        $this->WindowImasethumb = $value;
    }

    public function setWindowImasethumbContentBlocking($value)
    {
        $this->WindowImasethumbContentBlocking = $value;
    }

    public function setWindowImasethumbNoContentBlocking($value)
    {
        $this->WindowImasethumbNoContentBlocking = $value;
    }
}

?>