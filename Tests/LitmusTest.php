<?php

namespace Litmus\Tests;

use Litmus\LitmusAPI;

class LitmusTest extends \PHPUnit_Framework_TestCase
{
    protected $path;

    protected function setUp()
    {
        $this->path = __DIR__ . '/Fixtures';
    }

    protected function tearDown()
    {
        $this->path = null;
    }

	/**
     * @expectedException InvalidArgumentException
     */
    public function testApiKeyException()
    {
        $LitmusAPI = new LitmusAPI();
    }

	/**
     * @expectedException InvalidArgumentException
     */
    public function testApiPassException()
    {
        $LitmusAPI = new LitmusAPI('keykey');
    }
}