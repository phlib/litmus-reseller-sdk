<?php

namespace Phlib\LitmusResellerSDK\Test\Callback;

use Phlib\LitmusResellerSDK\Callback\CallbackAbstract;
use Phlib\LitmusResellerSDK\Callback\Email;
use Phlib\LitmusResellerSDK\Callback\Spam;
use Phlib\LitmusResellerSDK\Spam\SpamHeader;
use Phlib\LitmusResellerSDK\Spam\SpamResult;
use PHPUnit\Framework\TestCase;

/**
 * @package Phlib\Litmus-Reseller-SDK
 */
class CallbackTest extends TestCase
{
    private const FILE_PATH = __DIR__ . '/_files/';

    /**
     * @dataProvider dataAll
     */
    public function testInstance(string $path, string $className): void
    {
        $result = $this->getCallbackResult($path);
        static::assertInstanceOf($className, $result);
    }

    /**
     * @dataProvider dataAll
     */
    public function testGetters(string $path, string $className, string $type): void
    {
        $result = $this->getCallbackResult($path);

        static::assertIsString($result->getApiId());
        static::assertIsString($result->getCallbackUrl());
        static::assertIsBool($result->getSupportsContentBlocking());
        static::assertIsString($result->getState());
        static::assertEquals($type, $result->getType());
    }

    /**
     * @dataProvider dataAll
     */
    public function testResultImageSet(string $path, string $className, string $type): void
    {
        $result = $this->getCallbackResult($path);

        static::assertIsArray($result->getResultImageSet());

        if ($type === 'spam') {
            static::assertCount(0, $result->getResultImageSet());
        }
    }

    /**
     * @dataProvider dataSpam
     */
    public function testSpamResult(string $path, bool $isSpam, float $score): void
    {
        $result = $this->getCallbackResult($path);

        static::assertInstanceOf(SpamResult::class, $result->getSpamResult());

        static::assertSame($isSpam, $result->getSpamResult()->getIsSpam());
        static::assertSame($score, $result->getSpamResult()->getSpamScore());
        static::assertIsArray($result->getSpamResult()->getSpamHeaders());
    }

    /**
     * @dataProvider dataSpam
     */
    public function testSpamHeaders(string $path, bool $isSpam, float $score, int $headerCount): void
    {
        $result = $this->getCallbackResult($path);

        $headers = $result->getSpamResult()->getSpamHeaders();
        static::assertCount($headerCount, $headers);

        foreach ($headers as $spamHeader) {
            static::assertInstanceOf(SpamHeader::class, $spamHeader);
            static::assertIsString($spamHeader->getKey());
            static::assertIsString($spamHeader->getDescription());
            static::assertIsString($spamHeader->getRating());
        }
    }

    public function dataEmail(): array
    {
        return [
            'emailGmail' => [
                'path' => self::FILE_PATH . 'EmailCallbackGmail.xml',
            ],
            'emailOutlook' => [
                'path' => self::FILE_PATH . 'EmailCallbackOutlook2010.xml',
            ],
        ];
    }

    public function dataSpam(): array
    {
        return [
            'spamFastmail' => [
                'path' => self::FILE_PATH . 'SpamCallbackFastMail.xml',
                'isSpam' => false,
                'score' => 0,
                'headerCount' => 0,
            ],
            'spamAssassin' => [
                'path' => self::FILE_PATH . 'SpamCallbackSpamAssassin.xml',
                'isSpam' => false,
                'score' => 0.8,
                'headerCount' => 2,
            ],
        ];
    }

    public function dataAll(): iterable
    {
        foreach ($this->dataEmail() as $name => $data) {
            yield $name => [
                $data['path'],
                Email::class,
                'mail',
            ];
        }

        foreach ($this->dataSpam() as $name => $data) {
            yield $name => [
                $data['path'],
                Spam::class,
                'spam',
            ];
        }
    }

    private function getCallbackResult(string $path): CallbackAbstract
    {
        $xml = file_get_contents($path);
        return CallbackAbstract::hydrateXmlCallback($xml);
    }
}
