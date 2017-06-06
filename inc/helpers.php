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

    const form_mode_portrait = 'portrait';
    const form_mode_landscape = 'landscape';
}