<?php

declare(strict_types=1);

namespace Phlib\LitmusResellerSDK\Test\Email;

use Phlib\LitmusResellerSDK\Email\EmailClient;
use PHPUnit\Framework\TestCase;

/**
 * @package Phlib\Litmus-Reseller-SDK
 */
class EmailClientTest extends TestCase
{
    /**
     * @dataProvider dataCreateFromResult
     */
    public function testCreateFromResult(\stdClass $apiResult): void
    {
        $emailClient = new EmailClient((array)$apiResult);

        // Check properties have been set
        foreach ($apiResult as $prop => $expected) {
            $actual = $emailClient->{'get' . $prop}();
            static::assertSame($expected, $actual);
        }
    }

    public function dataCreateFromResult(): array
    {
        $available = require __DIR__ . '/_files/client-available.php';

        // Verify expected clients
        $availableMail = $available[31];
        if ($availableMail->ResultType !== 'email' || $availableMail->ApplicationName !== 'gmailnew') {
            throw new \DomainException(
                'Unexpected test data for available mail client: ' . $availableMail->ApplicationName
            );
        }
        $availableSpam = $available[30];
        if ($availableSpam->ResultType !== 'spam' || $availableSpam->ApplicationName !== 'spamassassin3') {
            throw new \DomainException(
                'Unexpected test data for available spam client: ' . $availableSpam->ApplicationName
            );
        }

        $waiting = require __DIR__ . '/_files/test-sandbox-waiting.php';
        $processing0 = require __DIR__ . '/_files/test-sandbox-processing-0.php';
        $processing1 = require __DIR__ . '/_files/test-sandbox-processing-1.php';
        $complete = require __DIR__ . '/_files/test-sandbox-complete.php';
        $resultEmail = require __DIR__ . '/_files/client-sandbox-complete-email.php';
        $resultSpam = require __DIR__ . '/_files/client-sandbox-complete-spam.php';

        return [
            'availableMail' => [$availableMail],
            'availableSpam' => [$availableSpam],
            'waitingMail' => [$waiting->Results[0]],
            'waitingSpam' => [$waiting->Results[1]],
            'completeMail' => [$complete->Results[0]],
            'completeSpam' => [$complete->Results[1]],
            'resultMail' => [$resultEmail],
            'resultSpam' => [$resultSpam],
        ];
    }

    public function testCreateWithInvalidProperty(): void
    {
        $actual = new EmailClient([
            'NotAValidProperty' => 'some-value',
        ]);

        // No errors and object is created
        static::assertInstanceOf(EmailClient::class, $actual);
    }
}
