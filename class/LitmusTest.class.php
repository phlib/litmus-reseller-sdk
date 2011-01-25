<?php

/*
 * LitmusTest class
 *
 * @author    Benjamin Laugueux <benjamin@yzalis.com>
 * @package   LitmusAPI
 * @version   1.0
 * @access    public
 * @copyright Copyright (c) 2011, Yzalis
 */
class LitmusTest
{
    /*
     * Construct a LitmusTest object with an array of values if it's provided.
     *
     * @param $values array
     */
    function __construct($values = array())
    {
        if (!empty($values))
        {
            foreach ($values as $key => $value)
            {
                $this->{'set' . $key}($value);
            }
        }
    }
}

?>