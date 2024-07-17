<?php

/**
 * LRsoft Corp.
 * https://lrsoft.id
 *
 * Author : Zaf
 */
class ito_booking_form_fastboat_widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(false, 'ITO Form: Fastboat',
            array('description' => 'Fastboat Booking Form in portrait and landscape mode.')
        );
    }

    public function widget($args, $instance)
    {
        global $ito_booking_form;
        echo $ito_booking_form->get_booking_form_fastboat($instance);
    }

    public function form($instance)
    {
        $bank_data = isset($instance['bank_data']) ? $instance['bank_data'] : Helpers::path_bank_data;
        $form_title = isset($instance['form_title']) ? $instance['form_title'] : Helpers::form_fb_title;
        $form_mode = isset($instance['form_mode']) ? $instance['form_mode'] : Helpers::form_mode_portrait;
        $default_currency = isset($instance['default_currency']) ? $instance['default_currency'] : Helpers::default_currency;
        $default_fb_departure = isset($instance['default_fb_departure']) ? $instance['default_fb_departure'] : Helpers::default_fb_departure;
        $default_fb_arrival = isset($instance['default_fb_arrival']) ? $instance['default_fb_arrival'] : Helpers::default_fb_arrival;
        $fb_max_adult = isset($instance['fb_max_adult']) ? $instance['fb_max_adult'] : Helpers::fb_max_adult;
        $fb_max_child = isset($instance['fb_max_child']) ? $instance['fb_max_child'] : Helpers::fb_max_child;
        $fb_max_infant = isset($instance['fb_max_infant']) ? $instance['fb_max_infant'] : Helpers::fb_max_infant;
        $fb_show_notes = isset($instance['fb_show_notes']) ? $instance['fb_show_notes'] : '';
        echo '
        <p>Bank Data:&nbsp;
            <input type="text" class="widefat" name="' . $this->get_field_name('bank_data') . '" value="' . $bank_data . '"></p>
        <p>Title:&nbsp;
            <input type="text" class="widefat" name="' . $this->get_field_name('form_title') . '" value="' . $form_title . '"></p>
        <p>Mode:&nbsp;
            <select name="' . $this->get_field_name('form_mode') . '">
                <option value="' . Helpers::form_mode_portrait . '" ' . ($form_mode == Helpers::form_mode_portrait ? 'selected' : '') . '>Portrait</option>
                <option value="' . Helpers::form_mode_landscape . '" ' . ($form_mode == Helpers::form_mode_landscape ? 'selected' : '') . '>Landscape</option>
            </select></p>
        <p><label><input type="checkbox" name="' . $this->get_field_name('fb_show_notes') . '" ' . ($fb_show_notes == 'on' ? 'checked' : '') . '> Show notes?</label></p>
        <hr/>
        <strong>Defaults</strong>
        <p><input type="number" class="tiny-text" name="' . $this->get_field_name('default_currency') . '" value="' . $default_currency . '"> Currency ID</p>
        <p><input type="number" class="tiny-text" name="' . $this->get_field_name('default_fb_departure') . '" value="' . $default_fb_departure . '"> Departure ID</p>
        <p><input type="number" class="tiny-text" name="' . $this->get_field_name('default_fb_arrival') . '" value="' . $default_fb_arrival . '"> Arrival ID</p>
        <p><input type="number" class="tiny-text" name="' . $this->get_field_name('fb_max_adult') . '" value="' . $fb_max_adult . '"> Max Adult</p>
        <p><input type="number" class="tiny-text" name="' . $this->get_field_name('fb_max_child') . '" value="' . $fb_max_child . '"> Max Child</p>
        <p><input type="number" class="tiny-text" name="' . $this->get_field_name('fb_max_infant') . '" value="' . $fb_max_infant . '"> Max Infant</p>
        ';
    }

    public function update($new_instance, $old_instance)
    {
        return array(
            'bank_data' => $new_instance['bank_data'],
            'form_title' => $new_instance['form_title'],
            'form_mode' => $new_instance['form_mode'],
            'default_currency' => $new_instance['default_currency'],
            'default_fb_departure' => $new_instance['default_fb_departure'],
            'default_fb_arrival' => $new_instance['default_fb_arrival'],
            'fb_max_adult' => $new_instance['fb_max_adult'],
            'fb_max_child' => $new_instance['fb_max_child'],
            'fb_max_infant' => $new_instance['fb_max_infant'],
            'fb_show_notes' => $new_instance['fb_show_notes']
        );
    }
}

add_action('widgets_init', function () {
    register_widget('ito_booking_form_fastboat_widget');
});

class ito_booking_form_tour_widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(false, 'ITO Form: Tour',
            array('description' => 'Tour Booking Form in portrait and landscape mode.'));
    }

    public function widget($args, $instance)
    {
        global $ito_booking_form;
        echo $ito_booking_form->get_booking_form_tour($instance);
    }

    public function form($instance)
    {
        $bank_data = isset($instance['bank_data']) ? $instance['bank_data'] : Helpers::path_bank_data;
        $form_title = isset($instance['form_title']) ? $instance['form_title'] : Helpers::form_tr_title;
        $form_mode = isset($instance['form_mode']) ? $instance['form_mode'] : Helpers::form_mode_portrait;
        $default_tr_city = isset($instance['default_tr_city']) ? $instance['default_tr_city'] : Helpers::default_tr_city;
        $default_tr_category = isset($instance['default_tr_category']) ? $instance['default_tr_category'] : Helpers::default_tr_category;
        echo '
        <p>Bank Data:&nbsp;
            <input type="text" class="widefat" name="' . $this->get_field_name('bank_data') . '" value="' . $bank_data . '"></p>
        <p>Title:&nbsp;
            <input type="text" class="widefat" name="' . $this->get_field_name('form_title') . '" value="' . $form_title . '"></p>
        <p>Mode:&nbsp;
            <select name="' . $this->get_field_name('form_mode') . '">
                <option value="' . Helpers::form_mode_portrait . '" ' . ($form_mode == Helpers::form_mode_portrait ? 'selected' : '') . '>Portrait</option>
                <option value="' . Helpers::form_mode_landscape . '" ' . ($form_mode == Helpers::form_mode_landscape ? 'selected' : '') . '>Landscape</option>
            </select></p>
        <hr/>
        <strong>Defaults</strong>
        <p><input type="number" class="tiny-text" name="' . $this->get_field_name('default_tr_city') . '" value="' . $default_tr_city . '"> City ID</p>
        <p><input type="number" class="tiny-text" name="' . $this->get_field_name('default_tr_category') . '" value="' . $default_tr_category . '"> Category ID</p>
        ';
    }

    public function update($new_instance, $old_instance)
    {
        return array(
            'bank_data' => $new_instance['bank_data'],
            'form_title' => $new_instance['form_title'],
            'form_mode' => $new_instance['form_mode'],
            'default_tr_city' => $new_instance['default_tr_city'],
            'default_tr_category' => $new_instance['default_tr_category']
        );
    }
}

add_action('widgets_init', function () {
    register_widget('ito_booking_form_tour_widget');
});

class ito_booking_form_flight_widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(false, 'ITO Form: Flight',
            array('description' => 'Flight Booking Form in portrait and landscape mode.')
        );
    }

    public function widget($args, $instance)
    {
        global $ito_booking_form;
        echo $ito_booking_form->get_booking_form_flight($instance);
    }

    public function form($instance)
    {
        $bank_data = isset($instance['bank_data']) ? $instance['bank_data'] : Helpers::path_bank_data;
        $form_title = isset($instance['form_title']) ? $instance['form_title'] : Helpers::form_fl_title;
        $form_mode = isset($instance['form_mode']) ? $instance['form_mode'] : Helpers::form_mode_portrait;
        $default_currency = isset($instance['default_currency']) ? $instance['default_currency'] : Helpers::default_currency;
        $default_fl_departure = isset($instance['default_fl_departure']) ? $instance['default_fl_departure'] : Helpers::default_fl_departure;
        $default_fl_arrival = isset($instance['default_fl_arrival']) ? $instance['default_fl_arrival'] : Helpers::default_fl_arrival;
        $fb_max_adult = isset($instance['fb_max_adult']) ? $instance['fb_max_adult'] : Helpers::fb_max_adult;
        $fb_max_child = isset($instance['fb_max_child']) ? $instance['fb_max_child'] : Helpers::fb_max_child;
        echo '
        <p>Bank Data:&nbsp;
            <input type="text" class="widefat" name="' . $this->get_field_name('bank_data') . '" value="' . $bank_data . '"></p>
        <p>Title:&nbsp;
            <input type="text" class="widefat" name="' . $this->get_field_name('form_title') . '" value="' . $form_title . '"></p>
        <p>Mode:&nbsp;
            <select name="' . $this->get_field_name('form_mode') . '">
                <option value="' . Helpers::form_mode_portrait . '" ' . ($form_mode == Helpers::form_mode_portrait ? 'selected' : '') . '>Portrait</option>
                <option value="' . Helpers::form_mode_landscape . '" ' . ($form_mode == Helpers::form_mode_landscape ? 'selected' : '') . '>Landscape</option>
            </select></p>
        <hr/>
        <strong>Defaults</strong>
        <p><input type="text" name="' . $this->get_field_name('default_fl_departure') . '" value="' . $default_fl_departure . '"> Departure Airport Code</p>
        <p><input type="text" name="' . $this->get_field_name('default_fl_arrival') . '" value="' . $default_fl_arrival . '"> Arrival Airport Code</p>
        <p><input type="number" class="tiny-text" name="' . $this->get_field_name('default_currency') . '" value="' . $default_currency . '"> Currency ID</p>
        <p><input type="number" class="tiny-text" name="' . $this->get_field_name('fb_max_adult') . '" value="' . $fb_max_adult . '"> Max Adult</p>
        <p><input type="number" class="tiny-text" name="' . $this->get_field_name('fb_max_child') . '" value="' . $fb_max_child . '"> Max Child</p>
        ';
    }

    public function update($new_instance, $old_instance)
    {
        return array(
            'bank_data' => $new_instance['bank_data'],
            'form_title' => $new_instance['form_title'],
            'form_mode' => $new_instance['form_mode'],
            'default_currency' => $new_instance['default_currency'],
            'default_fl_departure' => $new_instance['default_fl_departure'],
            'default_fl_arrival' => $new_instance['default_fl_arrival'],
            'fb_max_adult' => $new_instance['fb_max_adult'],
            'fb_max_child' => $new_instance['fb_max_child']
        );
    }
}

add_action('widgets_init', function () {
    register_widget('ito_booking_form_flight_widget');
});