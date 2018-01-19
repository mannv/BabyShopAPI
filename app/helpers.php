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
        return $money;
//        if ($money == 0) {
//            return '';
//        }
//        return number_format($money, 0, '', ',') . ' ' . $currency;
    }
}

if (!function_exists('banner_image')) {
    function banner_image($name)
    {
        return config('app.url') . '/storage/banner/' . $name;
    }
}

if (!function_exists('product_image')) {
    function product_image($name)
    {
        return config('app.url') . '/storage/images/' . $name;
    }
}