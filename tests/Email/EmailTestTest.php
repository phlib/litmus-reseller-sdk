<?php

namespace Phlib\LitmusResellerSDK\Test\Email;

use Phlib\LitmusResellerSDK\Email\EmailClient;
use Phlib\LitmusResellerSDK\Email\EmailTest;
use PHPUnit\Framework\TestCase;

/**
 * @package Phlib\Litmus-Reseller-SDK
 */
class EmailTestTest extends TestCase
{
    public function testCreateEmailTest(): void
    {
        $EmailTest = new EmailTest();

        static::assertFalse($EmailTest->getSandbox());
        $EmailTest->setSandbox(true);
        static::assertTrue($EmailTest->getSandbox());

        static::assertIsArray($EmailTest->getResults());
        static::assertCount(0, $EmailTest->getResults());
    }

    /**
     * @dataProvider dataCreateFromResult
     */
    public function testCreateFromResult(\stdClass $apiResult): void
    {
        $emailTest = new EmailTest((array)$apiResult);

        // Check properties have been set
        foreach ($apiResult as $prop => $expected) {
            if ($prop === 'Results') {
                // `Results` isn't a scalar value
                continue;
            }
            $actual = $emailTest->{'get' . $prop}();
            static::assertSame($expected, $actual);
        }

        // Only care that Results is an array of EmailClient
        $actualResults = $emailTest->getResults();
        static::assertCount(2, $actualResults);
        static::assertInstanceOf(EmailClient::class, $actualResults[0]);
    }

    public function dataCreateFromResult(): array
    {
        $waiting = require __DIR__ . '/_files/test-sandbox-waiting.php';
        $processing0 = require __DIR__ . '/_files/test-sandbox-processing-0.php';
        $processing1 = require __DIR__ . '/_files/test-sandbox-processing-1.php';
        $complete = require __DIR__ . '/_files/test-sandbox-complete.php';

        return [
            'waiting' => [$waiting],
            'processing0' => [$processing0],
            'processing1' => [$processing1],
            'complete' => [$complete],
        ];
    }
}
