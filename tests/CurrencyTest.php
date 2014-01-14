<?php

namespace Tests;

use Shipito\CurrencyConverter\Currency;

require_once __DIR__ . '/../src/Currency.php';

/**
 * @author David Moravek
 */
class CurrencyTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNonExistentCode()
    {
        new Currency('FCK');
    }

}