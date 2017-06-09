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

    const path_bank_data = 'http://lrse.dev';
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
}