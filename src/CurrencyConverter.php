<?php

namespace Shipito\CurrencyConverter;

/**
 * @author David Moravek
 */
class CurrencyConverter
{

    const CONVERTER_URL = 'http://www.google.com/finance/converter';

    /**
     * @param float $amount
     * @param Currency $from
     * @param Currency $to
     * @return bool|float
     * @throws \InvalidArgumentException
     */
    public function convert($amount, Currency $from, Currency $to)
    {
        if (!is_numeric($amount)) {
            throw new \InvalidArgumentException('Amount must be a number.');
        }

        $queryParams = array(
            'a' => (float) $amount,
            'from' => $from->getCode(),
            'to' => $to->getCode()
        );

        $pattern = sprintf('/[.0-9]+ %s = ([.0-9]+) %s/', $from->getCode(), $to->getCode());
        $response = $this->query(self::CONVERTER_URL . '?' . http_build_query($queryParams));

        if (preg_match($pattern, strip_tags($response), $m)) {
            return (float) $m[1];
        };

        return false;
    }

    /**
     * @param $url
     * @return mixed
     */
    private function query($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        return $result;
    }

}