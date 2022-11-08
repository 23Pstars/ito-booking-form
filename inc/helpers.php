<?php

/**
 * LRsoft Corp.
 * http://lrsoft.co.id
 *
 * Author : Zaf
 */
class Helpers
{
    const plugin_name = 'ITO Booking Form';
    const plugin_slug = 'ito_booking_form';

    const path_bank_data = '-';
    const path_api = 'api';

    // currency
    const path_currency = 'currency';
    const default_currency = -1;

    // fastboat
    const form_fb_title = 'Fastboat Tickets';
    const path_fastboat = 'fastboat';
    const default_fb_departure = -1;
    const default_fb_arrival = -1;
    const fb_max_adult = 11;
    const fb_max_child = 7;
    const fb_max_infant = 5;

    // tour
    const form_tr_title = 'Activities';
    const path_tour = 'tour';
    const default_tr_city = -1;
    const default_tr_category = -1;

    // flight
    const form_fl_title = 'Flights';
    const path_flight = 'flight';
    const default_fl_departure = 'LOP';
    const default_fl_arrival = 'DPS';

    const form_mode_portrait = 'portrait';
    const form_mode_landscape = 'landscape';

    const shortcode_fastboat = 'itobf_fb';
    const shortcode_tour = 'itobf_tr';
    const shortcode_flight = 'itobf_fl';

    static $default_fb_args = array(
        'bank_data' => self::path_bank_data,
        'form_title' => self::form_fb_title,
        'form_mode' => self::form_mode_portrait,
        'default_currency' => self::default_currency,
        'default_fb_departure' => self::default_fb_departure,
        'default_fb_arrival' => self::default_fb_arrival,
        'fb_max_adult' => self::fb_max_adult,
        'fb_max_child' => self::fb_max_child,
        'fb_max_infant' => self::fb_max_infant,
        'fb_show_notes' => ''
    );

    static $default_tr_args = array(
        'bank_data' => self::path_bank_data,
        'form_title' => self::form_tr_title,
        'form_mode' => self::form_mode_portrait,
        'default_tr_city' => self::default_tr_city,
        'default_tr_category' => self::default_tr_category,
    );

    static $default_fl_args = array(
        'bank_data' => self::path_bank_data,
        'form_title' => self::form_fl_title,
        'form_mode' => self::form_mode_portrait,
        'default_currency' => self::default_currency,
        'default_fl_departure' => self::default_fl_departure,
        'default_fl_arrival' => self::default_fl_arrival,
        'fb_max_adult' => self::fb_max_adult,
        'fb_max_child' => self::fb_max_child
    );

    static $_lists_currencies = '[{"currency_id":"10","currency_sync_date":"2022-11-07 00:00:03","currency_sync_method":"automatic","currency_sync_adjust":"-9.5","currency_name":"Swiss Franc","currency_code":"CHF","currency_rate":"0.000069563560129598"},{"currency_id":"9","currency_sync_date":"2022-11-07 00:00:03","currency_sync_method":"automatic","currency_sync_adjust":"-9.5","currency_name":"Australian Dollar","currency_code":"AUD","currency_rate":"0.00010911808669656"},{"currency_id":"8","currency_sync_date":"2022-11-07 00:00:03","currency_sync_method":"automatic","currency_sync_adjust":"-9.5","currency_name":"Canadian Dollar","currency_code":"CAD","currency_rate":"0.000094388414791829"},{"currency_id":"7","currency_sync_date":"2022-11-07 00:00:03","currency_sync_method":"automatic","currency_sync_adjust":"-9.5","currency_name":"Euro","currency_code":"EUR","currency_rate":"0.000070454252991893"},{"currency_id":"5","currency_sync_date":"2022-11-07 00:00:03","currency_sync_method":"automatic","currency_sync_adjust":"-9.5","currency_name":"Japanese Yen","currency_code":"JPY","currency_rate":"0.01001463325407"},{"currency_id":"4","currency_sync_date":"2022-11-07 00:00:03","currency_sync_method":"automatic","currency_sync_adjust":"-9.5","currency_name":"US Dollar","currency_code":"USD","currency_rate":"0.000068893922234806"},{"currency_id":"3","currency_sync_date":"2022-11-07 00:00:03","currency_sync_method":"automatic","currency_sync_adjust":"-9.5","currency_name":"British Pound Sterling","currency_code":"GBP","currency_rate":"0.000061485765624123"},{"currency_id":"2","currency_sync_date":"2022-11-07 00:00:03","currency_sync_method":"automatic","currency_sync_adjust":"-9.5","currency_name":"Singapore Dollar","currency_code":"SGD","currency_rate":"0.000097881469562885"},{"currency_id":"1","currency_sync_date":"2022-11-07 00:00:03","currency_sync_method":"automatic","currency_sync_adjust":"0","currency_name":"Indonesian Rupiah","currency_code":"IDR","currency_rate":"1"}]';
    static $_lists_regions = '[{"region_id":"8","region_name":"Nusa Ceningan","region_priority":"0"},{"region_id":"7","region_name":"Nusa Penida","region_priority":"0"},{"region_id":"6","region_name":"Gili Meno","region_priority":"0"},{"region_id":"5","region_name":"Nusa Lembongan","region_priority":"0"},{"region_id":"4","region_name":"Lombok","region_priority":"0"},{"region_id":"3","region_name":"Bali","region_priority":"0"},{"region_id":"2","region_name":"Gili Air","region_priority":"0"},{"region_id":"1","region_name":"Gili Trawangan","region_priority":"0"}]';

}