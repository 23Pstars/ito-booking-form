<?php
/**
 * Plugin Name:     ITO Booking Form
 * Plugin URI:      https://github.com/23Pstars/ito-booking-form
 * Description:     Booking form as WordPress widget for fastboat, tour, and flight from <a href="http://www.indotravelonline.com">Indo Travel Online</a>.
 * Version:         1.0.0
 * Author:          Zaf
 * Author URI:      http://lrsoft.co.id
 */

define('DS', DIRECTORY_SEPARATOR);
defined('ABSPATH') or die('No direct access');

include(plugin_dir_path(__FILE__) . 'inc/helpers.php');

class ITO_Booking_Form
{

    private $currency_lists = array();
    private $fb_region_lists = array();
    private $tr_city_lists = array();
    private $tr_activity_lists = array();

    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
    }

    public function sync_args($default, $args)
    {
        foreach ($default as $k => $v)
            $args[$k] = isset($args[$k]) ? $args[$k] : $v;

        return $args;
    }

    public function fetch_currency_lists($bank_data)
    {
        $this->currency_lists = json_decode(file_get_contents(
            $bank_data . DS . Helpers::path_currency . DS . Helpers::path_api . DS . 'rates?number=-1'));
    }

    public function fetch_fb_region_lists($bank_data)
    {
        $this->fb_region_lists = json_decode(file_get_contents(
            $bank_data . DS . Helpers::path_fastboat . DS . Helpers::path_api . DS . 'regions?number=-1'));
    }

    public function fetch_tr_city_lists($bank_data)
    {
        $_city_lists = array();
        $this->tr_city_lists = json_decode(file_get_contents(
            $bank_data . DS . Helpers::path_tour . DS . Helpers::path_api . DS . 'cities?number=-1'));
        foreach ($this->tr_city_lists as $_city)
            in_array($_city->nationality_title, $_city_lists) || $_city_lists[$_city->nationality_title][] = $_city;
        $this->tr_city_lists = $_city_lists;
    }

    public function fetch_tr_activity_lists($bank_data)
    {
        $this->tr_activity_lists = json_decode(file_get_contents(
            $bank_data . DS . Helpers::path_tour . DS . Helpers::path_api . DS . 'activities?number=-1'));
    }

    public function get_booking_form_tour($args = array())
    {
        $_args = $this->sync_args(array(
            'bank_data' => Helpers::path_bank_data,
            'form_title' => Helpers::form_tr_title,
            'form_mode' => Helpers::form_mode_portrait,
            'default_tr_city' => Helpers::default_tr_city,
            'default_tr_category' => Helpers::default_tr_category,
        ), $args);

        if (empty($this->tr_activity_lists))
            $this->fetch_tr_activity_lists($_args['bank_data']);

        if (empty($this->tr_city_lists))
            $this->fetch_tr_city_lists($_args['bank_data']);

        $_city_options = '';
        foreach ($this->tr_city_lists as $_nationality => $_cities) :
            $_city_options .= '<optgroup label="' . $_nationality . '">' . $_nationality . '</optgroup>';
            foreach ($_cities as $_city)
                $_city_options .= '<option value="' . $_city->city_id . '"' . ($_args['default_tr_city'] == $_city->city_id ? 'selected' : '') . '>' . $_city->city_title . '</option>';
        endforeach;

        $_activity_options = '';
        foreach ($this->tr_activity_lists as $_activity)
            $_activity_options .= '<option value="' . $_activity->category_id . '"' . ($_args['default_tr_category'] == $_activity->category_id ? 'selected' : '') . '>' . $_activity->category_title . '</option>';

        $_is_landscape = $_args['form_mode'] == Helpers::form_mode_landscape;

        $html = '
            <div class="tr-container">
                <h3 class="tr-title">' . $_args['form_title'] . '</h3>
                <form action="' . $_args['bank_data'] . '/tour/packages" method="get">
                    <div class="lrs-row">
                        <div class="lrs-col-sm-' . ($_is_landscape ? 3 : 12) . ' tr-cities">
                            <label class="lrs-form">Destination</label>
                            <select class="lrs-form expand" name="city_id">
                                <option value="-1">All Cities</option>
                                ' . $_city_options . '
                            </select>
                        </div>
                        <div class="lrs-col-sm-' . ($_is_landscape ? 3 : 12) . ' tr-activities">
                            <label class="lrs-form">Activities</label>
                            <select class="lrs-form expand" name="category_id">
                                <option value="-1">All Activities</option>
                                ' . $_activity_options . '
                            </select>
                        </div>
                        <div class="lrs-col-sm-' . ($_is_landscape ? 3 : 12) . ' tr-keywords">
                            <label class="lrs-form">Keywords</label>
                            <input type="text" class="lrs-form expand" name="keyword" placeholder="eg. Hotels, Places, etc." />
                        </div>
                        <div class="lrs-col-sm-' . ($_is_landscape ? 3 : 12) . ' tr-button">
                            <div class="lrs-row">
                                <div class="lrs-col-sm-12 lrs-col-lg-6">
                                    ' . ($_is_landscape ? '<label class="lrs-form">&nbsp;</label>' : '') . '
                                    <button class="lrs-btn lrs-btn-primary expand">
                                        Search &raquo;
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        ';
        return $html;
    }

    public function get_booking_form_fastboat($args = array())
    {

        $_args = $this->sync_args(array(
            'bank_data' => Helpers::path_bank_data,
            'form_title' => Helpers::form_fb_title,
            'form_mode' => Helpers::form_mode_portrait,
            'default_currency' => Helpers::default_currency,
            'default_fb_departure' => Helpers::default_fb_departure,
            'default_fb_arrival' => Helpers::default_fb_arrival,
            'fb_max_adult' => Helpers::fb_max_adult,
            'fb_max_child' => Helpers::fb_max_child,
            'fb_max_infant' => Helpers::fb_max_infant,
            'fb_show_notes' => ''
        ), $args);

        if (empty($this->currency_lists))
            $this->fetch_currency_lists($_args['bank_data']);

        if (empty($this->fb_region_lists))
            $this->fetch_fb_region_lists($_args['bank_data']);

        $_currency_options = '';
        foreach ($this->currency_lists as $_currency)
            $_currency_options .= '<option value="' . $_currency->currency_id . '" ' . ($_args['default_currency'] == $_currency->currency_id ? 'selected' : '') . '>' . $_currency->currency_name . ' (' . $_currency->currency_code . ')</option>';

        $_departure_region_options = '';
        $_arrival_region_options = '';
        foreach ($this->fb_region_lists as $_region) {
            $_departure_region_options .= '<option value="' . $_region->region_id . '" ' . ($_args['default_fb_departure'] == $_region->region_id ? 'selected' : '') . '>' . $_region->region_name . '</option>';
            $_arrival_region_options .= '<option value="' . $_region->region_id . '" ' . ($_args['default_fb_arrival'] == $_region->region_id ? 'selected' : '') . '>' . $_region->region_name . '</option>';
        }

        $_is_landscape = $_args['form_mode'] == Helpers::form_mode_landscape;

        $_fb_notes = $_args['fb_show_notes'] == 'on' ? '
        <div class="fb-note">
            <span>Note: </span>this trip is not recommended for Pregnant Women, People with Heart or Back problems, and other physical impediments.                        
        </div>
        ' : '';

        $html = '
            <div class="fb-container">
                
                <h3 class="fb-title">' . $_args['form_title'] . '</h3>
            
                <form action="' . $_args['bank_data'] . DS . Helpers::path_fastboat . '/select-boat/record-session" method="post">
                
                <div class="lrs-row">
                    <div class="lrs-col-sm-12 lrs-col-lg-' . ($_is_landscape ? 4 : 12) . '">
                        <div class="fb-routes">
                            <div class="fb-depart-region">
                                <label class="lrs-form inline" for="departure_region_id">Departure</label>
                                <select class="lrs-form expand" id="departure_region_id" name="departure_region_id">
                                    ' . $_departure_region_options . '
                                </select>
                            </div>
                            <div class="fb-arrival-region">
                                <label class="lrs-form inline" for="arrival_region_id">Arrival</label>
                                <select class="lrs-form expand" id="arrival_region_id" name="arrival_region_id">
                                    ' . $_arrival_region_options . '
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="lrs-col-sm-12 lrs-col-lg-' . ($_is_landscape ? 4 : 12) . '">
                        <div class="fb-dates">
                            <div class="lrs-row">
                                <div class="fb-depart-date lrs-col-sm-6">
                                <label for="departure_date">Depart</label>
                                    <input type="text" class="lrs-form expand" id="departure_date" name="departure_transfer_date"
                                           value="' . date('Y-m-d', mktime(0, 0, 0, date("m"), date("d") + 1, date("Y"))) . '"/>
                                </div>
                                <div class="fb-arrival-date lrs-col-sm-6">
                                    <label for="toggle_return">
                                        <input id="toggle_return" type="checkbox" checked />
                                        Return?
                                    </label>
                                    <div id="return_date_container">
                                        <input type="text" class="lrs-form expand" id="return_date" name="return_transfer_date"
                                               value="' . date('Y-m-d', mktime(0, 0, 0, date("m"), date("d") + 2, date("Y"))) . '"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fb-passengers lrs-row">
                            <div class="fb-adult lrs-col-sm-4">
                                <label for="number_of_adult">Adult</label>
                                <input type="number" class="lrs-form expand" id="number_of_adult" name="number_of_adult" min="1" value="1" max="' . $_args['fb_max_adult'] . '" />
                            </div>
                            <div class="fb-child lrs-col-sm-4">
                                <label for="number_of_child">Child</label>
                                <input type="number" class="lrs-form expand" id="number_of_child" name="number_of_child" min="0" value="0" max="' . $_args['fb_max_child'] . '" />
                            </div>
                            <div class="fb-infant lrs-col-sm-4">
                                <label for="number_of_infant">Infant</label>
                                <input type="number" class="lrs-form expand" id="number_of_infant" name="number_of_infant" min="0" value="0" max="' . $_args['fb_max_infant'] . '" />
                            </div>
                        </div>
                    </div>
                    <div class="lrs-col-sm-12 lrs-col-lg-' . ($_is_landscape ? 4 : 12) . '">
                        
                        <div class="fb-currencies">
                            <label for="currency_id">Preferred Currency</label>
                            <select class="lrs-form expand" id="currency_id" name="currency_id">
                                ' . $_currency_options . '
                            </select>
                        </div>
                        
                        <div class="lrs-row">
                            <div class="fb-button lrs-col-sm-4">
                                <button class="lrs-btn lrs-btn-primary expand">
                                    Search &raquo;
                                </button>                        
                            </div>
                            <div class="fb-lost-eticket lrs-col-sm-8">
                                <a href="' . $_args['bank_data'] . DS . Helpers::path_fastboat . '/e-ticket"><strong>Lost your e-Ticket?</strong></a>
                            </div>
                        </div>
                        
                        ' . $_fb_notes . '
            
                        <input type="hidden" id="fb_route_type" name="route_type" value="return" />
                    </div>
                </div>
        
                </form>
            </div>';
        return $html;

    }

    public function enqueue_assets()
    {
        wp_enqueue_script(Helpers::plugin_slug . '_moment', plugin_dir_url(__FILE__) . '/js/moment.js');
        wp_enqueue_script(Helpers::plugin_slug . '_pikaday', plugin_dir_url(__FILE__) . '/js/pikaday.js');
        wp_enqueue_script(Helpers::plugin_slug . '_script', plugin_dir_url(__FILE__) . '/js/script.js');

        wp_enqueue_style(Helpers::plugin_slug . '_lrs_css', plugin_dir_url(__FILE__) . '/css/lrs-css.min.css');
        wp_enqueue_style(Helpers::plugin_slug . '_pikaday', plugin_dir_url(__FILE__) . '/css/pikaday.css');
        wp_enqueue_style(Helpers::plugin_slug . '_style', plugin_dir_url(__FILE__) . '/css/style.min.css');
    }
}

$ito_booking_form = new ITO_Booking_Form();

include(plugin_dir_path(__FILE__) . 'inc/shortcodes.php');
include(plugin_dir_path(__FILE__) . 'inc/widgets.php');