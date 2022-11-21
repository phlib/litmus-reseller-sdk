<?php

declare(strict_types=1);

namespace Phlib\LitmusResellerSDK;

use Phlib\LitmusResellerSDK\Email\EmailClient;
use Phlib\LitmusResellerSDK\Email\EmailTest;
use Phlib\LitmusResellerSDK\Exception\InvalidArgumentException;
use Phlib\LitmusResellerSDK\Exception\NotFoundException;

/**
 * @package Phlib\Litmus-Reseller-SDK
 */
class Litmus
{
    private const API_URL = 'https://soapapi.litmusapp.com/2010-06-21/api.asmx?wsdl';

    private string $apiKey;

    private string $apiPass;

    private \SoapClient $soapClient;

    public function __construct(string $apiKey, string $apiPass)
    {
        if (empty($apiKey)) {
            throw new InvalidArgumentException('You must specify an API key');
        }
        if (empty($apiPass)) {
            throw new InvalidArgumentException('You must specify an API password');
        }

        $this->apiKey = $apiKey;
        $this->apiPass = $apiPass;

        $this->soapClient = new \SoapClient(self::API_URL);
    }

    public function getEmailClients(): array
    {
        $result = $this->soapClient->__soapCall('GetEmailTestClients', [
            $this->apiKey,
            $this->apiPass,
        ]);
        $clients = [];

        /** @var \stdClass $params */
        foreach ($result as $params) {
            $clients[] = new EmailClient((array)$params);
        }

        return $clients;
    }

    public function createEmailTest(array $clientNames = [], bool $sandbox = false)
    {
        $clients = [];
        foreach ($clientNames as $applicationName) {
            $clients[] = new EmailClient([
                'ApplicationName' => $applicationName,
            ]);
        }

        $emailTest = new EmailTest([
            'Sandbox' => $sandbox,
            'Results' => $clients,
        ]);

        return $this->createEmailTestRaw($emailTest);
    }

    /**
     * @deprecated 3.0.0 This behaviour was previously available as `createEmailTest()`
     *     but left here for any implementations that need non-standard behaviour
     *     and may be removed in future if no use-cases are shown.
     * @see createEmailTest()
     */
    public function createEmailTestRaw(EmailTest $EmailTest): EmailTest
    {
        $result = $this->soapClient->__soapCall('CreateEmailTest', [
            $this->apiKey,
            $this->apiPass,
            $EmailTest,
        ]);

        return new EmailTest((array)$result);
    }

    /**
     * @param int $emailTestId The unique identifier of the email test (as returned by createEmailTest()).
     */
    public function getEmailTest(int $emailTestId): EmailTest
    {
        $result = $this->soapClient->__soapCall('GetEmailTest', [
            $this->apiKey,
            $this->apiPass,
            $emailTestId,
        ]);

        if ($result === null) {
            throw new NotFoundException('Email Test not found: ' . $emailTestId);
        }

        return new EmailTest((array)$result);
    }

    public function getSpamSeedAddresses(): array
    {
        $result = $this->soapClient->__soapCall('GetSpamSeedAddresses', [
            $this->apiKey,
            $this->apiPass,
        ]);

        return $result;
    }

    /**
     * @param int $emailClientResultId ID of the individual email client result
     */
    public function getResult(int $emailClientResultId): EmailClient
    {
        $result = $this->soapClient->__soapCall('GetResult', [
            $this->apiKey,
            $this->apiPass,
            $emailClientResultId,
        ]);

        if ($result === null) {
            throw new NotFoundException('Email Client result not found: ' . $emailClientResultId);
        }

        return new EmailClient((array)$result);
    }

    /**
     * @internal This method is not part of the BC promise. Used for DI for unit tests only.
     */
    public function setTestSoapClient(\SoapClient $soapClient): void
    {
        $this->soapClient = $soapClient;
    }
}
