<?php

namespace Phlib\LitmusResellerSDK\Test;

use Phlib\LitmusResellerSDK\Base\BaseCallback;
use Phlib\LitmusResellerSDK\Email\EmailCallback;
use Phlib\LitmusResellerSDK\Spam\SpamCallback;
use Phlib\LitmusResellerSDK\Spam\SpamHeader;
use Phlib\LitmusResellerSDK\Spam\SpamResult;
use PHPUnit\Framework\TestCase;

/**
 * @package Phlib\Litmus-Reseller-SDK
 */
class CallbackTest extends TestCase
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
        static::assertInstanceOf(EmailCallback::class, $this->emailCallback);
        static::assertInstanceOf(SpamCallback::class, $this->spamCallback);
    }

    public function testGetters()
    {
        static::assertInternalType('string', $this->emailCallback->getApiId());
        static::assertInternalType('string', $this->emailCallback->getCallbackUrl());
        static::assertInternalType('boolean', $this->emailCallback->getSupportsContentBlocking());
        static::assertInternalType('string', $this->emailCallback->getState());
        static::assertEquals('mail', $this->emailCallback->getType());
        static::assertEquals('spam', $this->spamCallback->getType());
    }

    public function testResultImageSet()
    {
        // spam callback
        static::assertInternalType('array', $this->spamCallback->getResultImageSet());
        static::assertCount(0, $this->spamCallback->getResultImageSet());

        // email callback
        static::assertInternalType('array', $this->spamCallback->getResultImageSet());
    }

    public function testSpamResult()
    {
        // spam callback
        static::assertInstanceOf(SpamResult::class, $this->spamCallback->getSpamResult());
        static::assertInternalType('array', $this->spamCallback->getSpamResult()->getSpamHeaders());
        static::assertInternalType('boolean', $this->spamCallback->getSpamResult()->getIsSpam());
        static::assertInternalType('float', $this->spamCallback->getSpamResult()->getSpamScore());

        // email callback
        static::assertNull($this->emailCallback->getSpamResult()->getSpamScore());
        static::assertCount(0, $this->emailCallback->getSpamResult()->getSpamHeaders());
    }

    public function testSpamHeaders()
    {
        foreach ($this->spamCallback->getSpamResult()->getSpamHeaders() as $spamHeader) {
            static::assertInstanceOf(SpamHeader::class, $spamHeader);
            static::assertInternalType('string', $spamHeader->getKey());
            static::assertInternalType('string', $spamHeader->getDescription());
            static::assertInternalType('string', $spamHeader->getRating());
        }
    }
}
