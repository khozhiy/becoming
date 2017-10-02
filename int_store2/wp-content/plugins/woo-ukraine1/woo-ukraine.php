<?php
/*
Plugin Name: Woocommerce - Україна
Plugin URI: http://moomoo.com.ua/woo
Description: Додає валюту "гривня" у плагін woocommerce.
Author: Vitaliy 'mr.psiho' Kiyko
Version: 1.1.0
Author URI: http://moomoo.com.ua
*/

add_filter( 'woocommerce_currencies', 'moo_add_my_currency' );

function moo_add_my_currency( $currencies ) {
    $currencies['UAH'] = 'Ukrainian Hryvnia';
    asort($currencies);
    return $currencies;
}

add_filter('woocommerce_currency_symbol', 'moo_add_my_currency_symbol', 10, 2);

function moo_add_my_currency_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
        case 'UAH': $currency_symbol = 'грн'; break;
    }
    return $currency_symbol;
}

?>