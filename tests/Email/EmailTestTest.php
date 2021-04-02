<?php

namespace Phlib\LitmusResellerSDK\Test\Email;

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

        $EmailTest->initializeFreeTest();
        static::assertCount(2, $EmailTest->getResults());
    }
}
