<?php

/**
 * LRsoft Corp.
 * http://lrsoft.co.id
 *
 * Author : Zaf
 */
class ito_booking_form_shortcode
{
    public function __construct()
    {
        add_action('init', array($this, 'register_ito_booking_form_shortcode'));
    }

    public function register_ito_booking_form_shortcode()
    {
        global $ito_booking_form;

        add_shortcode(Helpers::shortcode_fastboat, function ($attributes) use ($ito_booking_form) {
            return $ito_booking_form->get_booking_form_fastboat(
                $ito_booking_form->sync_args(Helpers::$default_fb_args, $attributes)
            );
        });

        add_shortcode(Helpers::shortcode_tour, function ($attributes) use ($ito_booking_form) {
            return $ito_booking_form->get_booking_form_tour(
                $ito_booking_form->sync_args(Helpers::$default_tr_args, $attributes)
            );
        });

        add_shortcode(Helpers::shortcode_flight, function ($attributes) use ($ito_booking_form) {
            return $ito_booking_form->get_booking_form_flight(
                $ito_booking_form->sync_args(Helpers::$default_fl_args, $attributes)
            );
        });
    }

}

$ito_booking_form_shortcode = new ito_booking_form_shortcode();