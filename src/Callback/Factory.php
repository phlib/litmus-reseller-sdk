<?php

namespace Phlib\LitmusResellerSDK\Callback;

/**
 * @package Phlib\Litmus-Reseller-SDK
 */
class Factory
{
    public function createFromXml(string $xmlCallback): CallbackAbstract
    {
        if (empty($xmlCallback)) {
            throw new \InvalidArgumentException('You must provide a callback string.');
        }

        // convert the utf-16 to utf-8
        $xmlCallback = preg_replace('/(<\?xml[^?]+?)utf-16/i', '$1utf-8', $xmlCallback);
        $xml = simplexml_load_string($xmlCallback);

        $callbackType = (string)$xml->attributes()->type;
        switch ($callbackType) {
            case 'mail':
                $object = new Email();
                break;
            case 'spam':
                $object = new Spam();
                break;
            default:
                throw new \InvalidArgumentException(sprintf('Unknown callback type "%s"', $callbackType));
        }

        foreach ($xml as $key => $value) {
            $object->{'set' . $key}($value);
        }

        return $object;
    }
}
