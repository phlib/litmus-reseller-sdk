<?php

declare(strict_types=1);

namespace Phlib\LitmusResellerSDK\Test;

use Phlib\LitmusResellerSDK\Email\EmailClient;
use Phlib\LitmusResellerSDK\Email\EmailTest;
use Phlib\LitmusResellerSDK\Exception\NotFoundException;
use Phlib\LitmusResellerSDK\Litmus;
use PHPUnit\Framework\TestCase;

/**
 * @package Phlib\Litmus-Reseller-SDK
 */
class LitmusTest extends TestCase
{
    public function testApiKeyException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('You must specify an API key');
        new Litmus('', '');
    }

    public function testApiPassException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('You must specify an API password');
        new Litmus('keykey', '');
    }

    public function testGetEmailClients(): void
    {
        $apiKey = sha1(uniqid('key'));
        $apiPass = sha1(uniqid('pass'));
        $soapClient = $this->createMock(\SoapClient::class);

        $litmusAPI = new Litmus($apiKey, $apiPass);
        $litmusAPI->setTestSoapClient($soapClient);

        $available = require __DIR__ . '/_files/client-available.php';

        $soapClient->expects(static::once())
            ->method('__soapCall')
            ->with('GetEmailTestClients', [
                $apiKey,
                $apiPass,
            ])
            ->willReturn($available);

        $actual = $litmusAPI->getEmailClients();

        // Verify known clients
        /** @var EmailClient $actualMail */
        $actualMail = $actual[31];
        static::assertSame('email', $actualMail->getResultType());
        static::assertSame('gmailnew', $actualMail->getApplicationName());

        /** @var EmailClient $actualSpam */
        $actualSpam = $actual[30];
        static::assertSame('spam', $actualSpam->getResultType());
        static::assertSame('spamassassin3', $actualSpam->getApplicationName());
    }

    public function testGetSpamSeedAddresses(): void
    {
        $apiKey = sha1(uniqid('key'));
        $apiPass = sha1(uniqid('pass'));
        $soapClient = $this->createMock(\SoapClient::class);

        $litmusAPI = new Litmus($apiKey, $apiPass);
        $litmusAPI->setTestSoapClient($soapClient);

        $expected = [
            sha1(uniqid('one')) . '@tests.example.com',
            sha1(uniqid('two')) . '@tests.example.com',
            sha1(uniqid('three')) . '@tests.example.com',
        ];

        $soapClient->expects(static::once())
            ->method('__soapCall')
            ->with('GetSpamSeedAddresses', [
                $apiKey,
                $apiPass,
            ])
            ->willReturn($expected);

        $actual = $litmusAPI->getSpamSeedAddresses();

        static::assertSame($expected, $actual);
    }

    public function testCreateEmailTest(): void
    {
        $apiKey = sha1(uniqid('key'));
        $apiPass = sha1(uniqid('pass'));
        $soapClient = $this->createMock(\SoapClient::class);

        $litmusAPI = new Litmus($apiKey, $apiPass);
        $litmusAPI->setTestSoapClient($soapClient);

        $emailTestRequest = new EmailTest();
        $id = rand();
        $state = 'waiting';
        $apiResponse = (object)[
            'ID' => $id,
            'State' => $state,
        ];

        $soapClient->expects(static::once())
            ->method('__soapCall')
            ->with('CreateEmailTest', [
                $apiKey,
                $apiPass,
                $emailTestRequest,
            ])
            ->willReturn($apiResponse);

        $actual = $litmusAPI->createEmailTest($emailTestRequest);

        static::assertSame($id, $actual->getID());
        static::assertSame($state, $actual->getState());
    }

    public function testGetEmailTest(): void
    {
        $apiKey = sha1(uniqid('key'));
        $apiPass = sha1(uniqid('pass'));
        $soapClient = $this->createMock(\SoapClient::class);

        $litmusAPI = new Litmus($apiKey, $apiPass);
        $litmusAPI->setTestSoapClient($soapClient);

        $id = rand();
        $state = 'waiting';
        $apiResponse = (object)[
            'ID' => $id,
            'State' => $state,
        ];

        $soapClient->expects(static::once())
            ->method('__soapCall')
            ->with('GetEmailTest', [
                $apiKey,
                $apiPass,
                $id,
            ])
            ->willReturn($apiResponse);

        $actual = $litmusAPI->getEmailTest($id);

        static::assertSame($id, $actual->getID());
        static::assertSame($state, $actual->getState());
    }

    public function testGetEmailTestNotFound(): void
    {
        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage('Email Test not found');

        $apiKey = sha1(uniqid('key'));
        $apiPass = sha1(uniqid('pass'));
        $soapClient = $this->createMock(\SoapClient::class);

        $litmusAPI = new Litmus($apiKey, $apiPass);
        $litmusAPI->setTestSoapClient($soapClient);

        $id = rand();

        $soapClient->expects(static::once())
            ->method('__soapCall')
            ->with('GetEmailTest', [
                $apiKey,
                $apiPass,
                $id,
            ])
            ->willReturn(null);

        $litmusAPI->getEmailTest($id);
    }

    public function testGetResult(): void
    {
        $apiKey = sha1(uniqid('key'));
        $apiPass = sha1(uniqid('pass'));
        $soapClient = $this->createMock(\SoapClient::class);

        $litmusAPI = new Litmus($apiKey, $apiPass);
        $litmusAPI->setTestSoapClient($soapClient);

        $id = rand();
        $state = 'complete';
        $apiResponse = (object)[
            'Id' => $id,
            'State' => $state,
        ];

        $soapClient->expects(static::once())
            ->method('__soapCall')
            ->with('GetResult', [
                $apiKey,
                $apiPass,
                $id,
            ])
            ->willReturn($apiResponse);

        $actual = $litmusAPI->getResult($id);

        static::assertSame($id, $actual->getId());
        static::assertSame($state, $actual->getState());
    }

    public function testGetResultNotFound(): void
    {
        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage('Email Client result not found');

        $apiKey = sha1(uniqid('key'));
        $apiPass = sha1(uniqid('pass'));
        $soapClient = $this->createMock(\SoapClient::class);

        $litmusAPI = new Litmus($apiKey, $apiPass);
        $litmusAPI->setTestSoapClient($soapClient);

        $id = rand();

        $soapClient->expects(static::once())
            ->method('__soapCall')
            ->with('GetResult', [
                $apiKey,
                $apiPass,
                $id,
            ])
            ->willReturn(null);

        $litmusAPI->getResult($id);
    }
}
