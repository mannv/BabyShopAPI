<?php
/**
 * Created by PhpStorm.
 * User: anhmantk
 * Date: 1/18/18
 * Time: 10:52 PM
 */

if (!function_exists('format_currency')) {
    function format_currency($money, $currency = 'đ')
    {
        if($money == 0) {
            return '';
        }
        return number_format($money, 0, '', ',') . ' ' . $currency;
    }
}