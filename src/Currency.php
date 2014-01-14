<?php

namespace Shipito\CurrencyConverter;

/**
 * @author David Moravek
 */
class Currency
{

    /**
     * @var array
     */
    public static $currencies = array(
        'USD' => 'US Dollar',
        'EUR' => 'Euro',
        'JPY' => 'Japanese Yen',
        'GBP' => 'British Pound Sterling',
        'CHF' => 'Swiss Franc',
        'AUD' => 'Australian Dollar',
        'CAD' => 'Canadian Dollar',
        'SEK' => 'Swedish Krona',
        'HKD' => 'Hong Kong Dollar',
        'NOK' => 'Norwegian Krone',
        'BTC' => 'Bitcoin',
        'AED' => 'United Arab Emirates Dirham',
        'ANG' => 'Netherlands Antillean Guilder',
        'ARS' => 'Argentine Peso',
        'BDT' => 'Bangladeshi Taka',
        'BGN' => 'Bulgarian Lev',
        'BHD' => 'Bahraini Dinar',
        'BND' => 'Brunei Dollar',
        'BOB' => 'Bolivian Boliviano',
        'BRL' => 'Brazilian Real',
        'BWP' => 'Botswanan Pula',
        'CLP' => 'Chilean Peso',
        'CNY' => 'Chinese Yuan',
        'COP' => 'Colombian Peso',
        'CRC' => 'Costa Rican Colón',
        'CZK' => 'Czech Republic Koruna',
        'DKK' => 'Danish Krone',
        'DOP' => 'Dominican Peso',
        'DZD' => 'Algerian Dinar',
        'EEK' => 'Estonian Kroon',
        'EGP' => 'Egyptian Pound',
        'FJD' => 'Fijian Dollar',
        'HNL' => 'Honduran Lempira',
        'HRK' => 'Croatian Kuna',
        'HUF' => 'Hungarian Forint',
        'IDR' => 'Indonesian Rupiah',
        'ILS' => 'Israeli New Sheqel',
        'INR' => 'Indian Rupee',
        'JMD' => 'Jamaican Dollar',
        'JOD' => 'Jordanian Dinar',
        'KES' => 'Kenyan Shilling',
        'KRW' => 'South Korean Won',
        'KWD' => 'Kuwaiti Dinar',
        'KYD' => 'Cayman Islands Dollar',
        'KZT' => 'Kazakhstani Tenge',
        'LBP' => 'Lebanese Pound',
        'LKR' => 'Sri Lankan Rupee',
        'LTL' => 'Lithuanian Litas',
        'LVL' => 'Latvian Lats',
        'MAD' => 'Moroccan Dirham',
        'MDL' => 'Moldovan Leu',
        'MKD' => 'Macedonian Denar',
        'MUR' => 'Mauritian Rupee',
        'MVR' => 'Maldivian Rufiyaa',
        'MXN' => 'Mexican Peso',
        'MYR' => 'Malaysian Ringgit',
        'NAD' => 'Namibian Dollar',
        'NGN' => 'Nigerian Naira',
        'NIO' => 'Nicaraguan Córdoba',
        'NPR' => 'Nepalese Rupee',
        'NZD' => 'New Zealand Dollar',
        'OMR' => 'Omani Rial',
        'PEN' => 'Peruvian Nuevo Sol',
        'PGK' => 'Papua New Guinean Kina',
        'PHP' => 'Philippine Peso',
        'PKR' => 'Pakistani Rupee',
        'PLN' => 'Polish Zloty',
        'PYG' => 'Paraguayan Guarani',
        'QAR' => 'Qatari Rial',
        'RON' => 'Romanian Leu',
        'RSD' => 'Serbian Dinar',
        'RUB' => 'Russian Ruble',
        'SAR' => 'Saudi Riyal',
        'SCR' => 'Seychellois Rupee',
        'SGD' => 'Singapore Dollar',
        'SKK' => 'Slovak Koruna',
        'SLL' => 'Sierra Leonean Leone',
        'SVC' => 'Salvadoran Colón',
        'THB' => 'Thai Baht',
        'TND' => 'Tunisian Dinar',
        'TRY' => 'Turkish Lira',
        'TTD' => 'Trinidad and Tobago Dollar',
        'TWD' => 'New Taiwan Dollar',
        'TZS' => 'Tanzanian Shilling',
        'UAH' => 'Ukrainian Hryvnia',
        'UGX' => 'Ugandan Shilling',
        'UYU' => 'Uruguayan Peso',
        'UZS' => 'Uzbekistan Som',
        'VEF' => 'Venezuelan Bolívar',
        'VND' => 'Vietnamese Dong',
        'XOF' => 'CFA Franc BCEAO',
        'YER' => 'Yemeni Rial',
        'ZAR' => 'South African Rand',
        'ZMK' => 'Zambian Kwacha'
    );

    /**
     * @var string
     */
    private $code;

    public function __construct($code)
    {
        if (!array_key_exists($code, static::$currencies)) {
            throw new \InvalidArgumentException(sprintf('Currency with code \'%s\' does not exist.', $code));
        }

        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return static::$currencies[$this->code];
    }

}