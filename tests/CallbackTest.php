<?php

namespace Phlib\LitmusResellerSDK\Test;

use Phlib\LitmusResellerSDK\CallbackAbstract;
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

    protected function setUp(): void
    {
        $this->path = __DIR__ . '/Fixtures';

        $xmlCallback = file_get_contents($this->path . '/EmailCallbackOutlook2010.xml');
        $this->emailCallback = CallbackAbstract::hydrateXmlCallback($xmlCallback);

        $xmlCallback = file_get_contents($this->path . '/SpamCallbackSpamAssassin.xml');
        $this->spamCallback = CallbackAbstract::hydrateXmlCallback($xmlCallback);
    }

    protected function tearDown(): void
    {
        $this->path = null;
        $this->emailCallback = null;
        $this->spamCallback = null;
    }

    public function testSingleton(): void
    {
        static::assertInstanceOf(EmailCallback::class, $this->emailCallback);
        static::assertInstanceOf(SpamCallback::class, $this->spamCallback);
    }

    public function testGetters(): void
    {
        static::assertIsString($this->emailCallback->getApiId());
        static::assertIsString($this->emailCallback->getCallbackUrl());
        static::assertIsBool($this->emailCallback->getSupportsContentBlocking());
        static::assertIsString($this->emailCallback->getState());
        static::assertEquals('mail', $this->emailCallback->getType());
        static::assertEquals('spam', $this->spamCallback->getType());
    }

    public function testResultImageSet(): void
    {
        // spam callback
        static::assertIsArray($this->spamCallback->getResultImageSet());
        static::assertCount(0, $this->spamCallback->getResultImageSet());

        // email callback
        static::assertIsArray($this->spamCallback->getResultImageSet());
    }

    public function testSpamResult(): void
    {
        // spam callback
        static::assertInstanceOf(SpamResult::class, $this->spamCallback->getSpamResult());
        static::assertIsArray($this->spamCallback->getSpamResult()->getSpamHeaders());
        static::assertIsBool($this->spamCallback->getSpamResult()->getIsSpam());
        static::assertIsFloat($this->spamCallback->getSpamResult()->getSpamScore());

        // email callback
        static::assertNull($this->emailCallback->getSpamResult()->getSpamScore());
        static::assertCount(0, $this->emailCallback->getSpamResult()->getSpamHeaders());
    }

    public function testSpamHeaders(): void
    {
        foreach ($this->spamCallback->getSpamResult()->getSpamHeaders() as $spamHeader) {
            static::assertInstanceOf(SpamHeader::class, $spamHeader);
            static::assertIsString($spamHeader->getKey());
            static::assertIsString($spamHeader->getDescription());
            static::assertIsString($spamHeader->getRating());
        }
    }
}
