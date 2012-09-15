<?php

namespace Litmus\Base;

/**
 * BaseTest class
 *
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 */
class BaseTest
{
    /**
     * Construct a LitmusTest object with an array of values if it's provided.
     *
     * @param $values array
     */
    public function __construct($values = array())
    {
        if (!empty($values)) {
            foreach ($values as $key => $value) {
                $this->{'set' . $key}($value);
            }
        }
    }
}
