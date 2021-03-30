<?php

namespace Phlib\LitmusResellerSDK\Test;

use Phlib\LitmusResellerSDK\Base\BaseCallback;
use Phlib\LitmusResellerSDK\Email\EmailCallback;
use Phlib\LitmusResellerSDK\Spam\SpamCallback;
use Phlib\LitmusResellerSDK\Spam\SpamHeader;
use Phlib\LitmusResellerSDK\Spam\SpamResult;

/**
 * @package Phlib\Litmus-Reseller-SDK
 */
class CallbackTest extends \PHPUnit_Framework_TestCase
{
    protected $path;
    protected $spamCallback;
    protected $emailCallback;

    protected function setUp()
    {
        $this->path = __DIR__ . '/Fixtures';

        $xmlCallback = file_get_contents($this->path . '/EmailCallbackOutlook2010.xml');
        $this->emailCallback = BaseCallback::hydrateXmlCallback($xmlCallback);

        $xmlCallback = file_get_contents($this->path . '/SpamCallbackSpamAssassin.xml');
        $this->spamCallback = BaseCallback::hydrateXmlCallback($xmlCallback);
    }

    protected function tearDown()
    {
        $this->path = null;
        $this->emailCallback = null;
        $this->spamCallback = null;
    }

    public function testSingleton()
    {
        $this->assertInstanceOf(EmailCallback::class, $this->emailCallback);
        $this->assertInstanceOf(SpamCallback::class, $this->spamCallback);
    }

    public function testGetters()
    {
        $this->assertInternalType('string', $this->emailCallback->getApiId());
        $this->assertInternalType('string', $this->emailCallback->getCallbackUrl());
        $this->assertInternalType('boolean', $this->emailCallback->getSupportsContentBlocking());
        $this->assertInternalType('string', $this->emailCallback->getState());
        $this->assertEquals('mail', $this->emailCallback->getType());
        $this->assertEquals('spam', $this->spamCallback->getType());
    }

    public function testResultImageSet()
    {
        // spam callback
        $this->assertInternalType('array', $this->spamCallback->getResultImageSet());
        $this->assertCount(0, $this->spamCallback->getResultImageSet());

        // email callback
        $this->assertInternalType('array', $this->spamCallback->getResultImageSet());
    }

    public function testSpamResult()
    {
        // spam callback
        $this->assertInstanceOf(SpamResult::class, $this->spamCallback->getSpamResult());
        $this->assertInternalType('array', $this->spamCallback->getSpamResult()->getSpamHeaders());
        $this->assertInternalType('boolean', $this->spamCallback->getSpamResult()->getIsSpam());
        $this->assertInternalType('float', $this->spamCallback->getSpamResult()->getSpamScore());

        // email callback
        $this->assertNull($this->emailCallback->getSpamResult()->getSpamScore());
        $this->assertCount(0, $this->emailCallback->getSpamResult()->getSpamHeaders());
    }

    public function testSpamHeaders()
    {
        foreach ($this->spamCallback->getSpamResult()->getSpamHeaders() as $spamHeader) {
            $this->assertInstanceOf(SpamHeader::class, $spamHeader);
            $this->assertInternalType('string', $spamHeader->getKey());
            $this->assertInternalType('string', $spamHeader->getDescription());
            $this->assertInternalType('string', $spamHeader->getRating());
        }
    }
}
