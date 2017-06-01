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
        ';
    }

    public function update($new_instance, $old_instance)
    {
        add_option(Helpers::plugin_slug . '_fb_bank_data', $new_instance['bank_data']);
        return array(
            'bank_data' => $new_instance['bank_data'],
            'form_title' => $new_instance['form_title'],
            'form_mode' => $new_instance['form_mode']
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
            array('description' => 'Tour Booking Form in PORTRAIT mode.'));
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