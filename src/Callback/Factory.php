<?php

declare(strict_types=1);

namespace Phlib\LitmusResellerSDK\Callback;

use Phlib\LitmusResellerSDK\Exception\InvalidArgumentException;
use Phlib\LitmusResellerSDK\Spam\SpamHeader;
use Phlib\LitmusResellerSDK\Spam\SpamResult;
use function Phlib\String\toBoolean;

/**
 * @package Phlib\Litmus-Reseller-SDK
 */
class Factory
{
    public function createFromXml(string $xmlCallback): CallbackAbstract
    {
        if (empty($xmlCallback)) {
            throw new InvalidArgumentException('You must provide a callback string.');
        }

        // convert the utf-16 to utf-8
        $xmlCallback = preg_replace('/(<\?xml[^?]+?)utf-16/i', '$1utf-8', $xmlCallback);
        $xml = simplexml_load_string($xmlCallback);

        $params = [
            (int)$xml->Id,
            (string)$xml->ApiId,
            toBoolean((string)$xml->SupportsContentBlocking),
            (string)$xml->State,
            (string)$xml->CallbackUrl,
        ];

        $callbackType = (string)$xml->attributes()->type;
        switch ($callbackType) {
            case 'mail':
                $params[] = (array)$xml->ResultImageSet;
                return new Email(...$params);
            case 'spam':
                $spamResult = $this->createSpamResult($xml->SpamResult);
                $params[] = $spamResult;
                return new Spam(...$params);
        }

        throw new InvalidArgumentException(sprintf('Unknown callback type "%s"', $callbackType));
    }

    private function createSpamResult(\SimpleXMLElement $xml): SpamResult
    {
        $spamHeaders = [];
        if (!empty($xml->SpamHeaders)) {
            foreach ($xml->SpamHeaders->SpamHeader as $spamHeader) {
                $spamHeaders[] = new SpamHeader(
                    (string)$spamHeader->Key,
                    (string)$spamHeader->Description,
                    (int)$spamHeader->Rating,
                );
            }
        }
        return new SpamResult(
            (float)$xml->SpamScore,
            toBoolean((string)$xml->IsSpam),
            $spamHeaders,
        );
    }
}
