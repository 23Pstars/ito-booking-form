<?php

/**
 * LRsoft Corp.
 * http://lrsoft.co.id
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
        <h3>Defaults</h3>
        <p>Currency ID: <input type="number" class="tiny-text" name="' . $this->get_field_name('default_currency') . '" value="' . $default_currency . '"></p>
        <p>Departure ID: <input type="number" class="tiny-text" name="' . $this->get_field_name('default_fb_departure') . '" value="' . $default_fb_departure . '"></p>
        <p>Arrival ID: <input type="number" class="tiny-text" name="' . $this->get_field_name('default_fb_arrival') . '" value="' . $default_fb_arrival . '"></p>
        <p>Max Adult: <input type="number" class="tiny-text" name="' . $this->get_field_name('fb_max_adult') . '" value="' . $fb_max_adult . '"></p>
        <p>Max Child: <input type="number" class="tiny-text" name="' . $this->get_field_name('fb_max_child') . '" value="' . $fb_max_child . '"></p>
        <p>Max Infant: <input type="number" class="tiny-text" name="' . $this->get_field_name('fb_max_infant') . '" value="' . $fb_max_infant . '"></p>
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
            'fb_max_infant' => $new_instance['fb_max_infant']
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


    public function form($instance)
    {

    }

    public function update($new_instance, $old_instance)
    {

    }
}

add_action('widgets_init', function () {
    register_widget('ito_booking_form_tour_widget');
});