<?php

declare(strict_types=1);

namespace Phlib\LitmusResellerSDK;

use Phlib\LitmusResellerSDK\Email\EmailClient;
use Phlib\LitmusResellerSDK\Email\EmailTest;

/**
 * Litmus class. This is the core class for the Litmus Reseller API
 *
 * @package Phlib\Litmus-Reseller-SDK
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 */
class Litmus
{
    private string $apiKey;

    private string $apiPass;

    private string $apiUrl = 'https://soapapi.litmusapp.com/2010-06-21/api.asmx?wsdl';

    private \SoapClient $soapClient;

    public function __construct(?string $apiKey = null, ?string $apiPass = null)
    {
        $this->setApiCredentials($apiKey, $apiPass)->setupSoapClient();
    }

    public function getEmailClients(): array
    {
        $result = $this->soapClient->__soapCall('GetEmailTestClients', [$this->getApiKey(), $this->getApiPass()]);
        $clients = [];

        /** @var \stdClass $params */
        foreach ($result as $params) {
            $clients[] = new EmailClient((array)$params);
        }

        return $clients;
    }

    public function createEmailTest(EmailTest $EmailTest): EmailTest
    {
        $result = $this->soapClient->__soapCall('CreateEmailTest', [
            $this->getApiKey(),
            $this->getApiPass(),
            $EmailTest,
        ]);

        return new EmailTest($result);
    }

    /**
     * @param int $emailTestId The unique identifier of the email test (as returned by createEmailTest()).
     */
    public function getEmailTest(int $emailTestId): EmailTest
    {
        $result = $this->soapClient->__soapCall('GetEmailTest', [
            $this->getApiKey(),
            $this->getApiPass(),
            $emailTestId,
        ]);

        return new EmailTest($result);
    }

    public function getSpamSeedAddresses(): array
    {
        $result = $this->soapClient->__soapCall('GetSpamSeedAddresses', [
            $this->getApiKey(),
            $this->getApiPass(),
        ]);

        return $result;
    }

    /**
     * @param int $emailClientResultId ID of the individual email client result
     */
    public function getResult(int $emailClientResultId): EmailClient
    {
        return new EmailClient($this->soapClient->__soapCall('GetResult', [
            $this->getApiKey(),
            $this->getApiPass(),
            $emailClientResultId,
        ]));
    }

    private function setupSoapClient(): self
    {
        $this->soapClient = new \SoapClient($this->getApiUrl());

        return $this;
    }

    private function setApiCredentials(?string $key, ?string $pass): self
    {
        if (empty($key)) {
            throw new \InvalidArgumentException('You must specify an API Key (string) .');
        }

        if (empty($pass)) {
            throw new \InvalidArgumentException('You must specify an API Password (string) .');
        }

        $this->apiKey = $key;
        $this->apiPass = $pass;

        return $this;
    }

    private function setApiUrl(string $v): self
    {
        $this->apiUrl = $v;

        return $this;
    }

    private function getApiKey(): string
    {
        return $this->apiKey;
    }

    private function getApiPass(): string
    {
        return $this->apiPass;
    }

    private function getApiUrl(): string
    {
        return $this->apiUrl;
    }
}
