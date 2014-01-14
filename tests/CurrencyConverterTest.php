<?php

namespace Tests;

use Shipito\CurrencyConverter\Currency;
use Shipito\CurrencyConverter\CurrencyConverter;

require_once __DIR__ . '/../src/Currency.php';
require_once __DIR__ . '/../src/CurrencyConverter.php';

/**
 * @author David Moravek
 */
class CurrencyConverterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var CurrencyConverter
     */
    private $converter;

    protected function setUp()
    {
        $this->converter = new CurrencyConverter();
    }

    /**
     * @return array
     */
    public function dataValid()
    {
        return array(
            array(12, 'CZK', 'USD'),
            array(566.5, 'EUR', 'AUD'),
            array(1531, 'CAD', 'CZK'),
            array(122531, 'EUR', 'USD')
        );
    }

    /**
     * @dataProvider dataValid
     */
    public function testValid($amount, $from, $to)
    {
        $result = $this->converter->convert($amount, new Currency($from), new Currency($to));

        $this->assertInternalType('float', $result);
        $this->assertGreaterThan(0.0, $result);
    }

    /**
     * @return array
     */
    public function dataInvalid()
    {
        return array(
            array(12, 'CZK', 'CZK'),
            array(560, 'EUR', 'EUR'),
            array(1531, 'CAD', 'CAD')
        );
    }

    /**
     * @dataProvider dataInvalid
     */
    public function testInvalid($amount, $from, $to)
    {
        $result = $this->converter->convert($amount, new Currency($from), new Currency($to));

        $this->assertInternalType('bool', $result);
        $this->assertFalse($result);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNonNumericAmount()
    {
        $this->converter->convert('should not work', new Currency('CZK'), new Currency('USD'));
    }
}