<?php
function load_timeline_animation_settings(){
    add_settings_section('animation', 'Animation', 'animation_section_callback', 'timeline-settings-animation');


    add_settings_field('timeline_odd_item_animation_name', 'Timeline odd item animation name', 'animationselectCallback', 'timeline-settings-animation', 'animation', array('setting_id' => 'timeline_odd_item_animation_name'));
    add_settings_field('timeline_even_item_animation_name', 'Timeline even item animation name', 'animationselectCallback', 'timeline-settings-animation', 'animation', array('setting_id' => 'timeline_even_item_animation_name'));
    add_settings_field('timeline_item_animate_duration', 'Timeline item animate duration', 'animateNumberCallBack', 'timeline-settings-animation', 'animation', array('setting_id'=>'timeline_item_animate_duration'));
    add_settings_field('timeline_item_animate_delay', 'Timeline item animate delay', 'animateNumberCallBack', 'timeline-settings-animation', 'animation', array('setting_id'=>'timeline_item_animate_delay'));
    add_settings_field('timeline_item_animate_repeat', 'Timeline item animate repeat', 'animateNumberCallBack', 'timeline-settings-animation', 'animation', array('setting_id'=>'timeline_item_animate_repeat'));
}

function animationselectCallback($args){
    $animationNames = array(
        "slideInDown",
        "slideInUp",
        "slideInLeft",
        "slideInRight"
    );
    $setting_id = $args['setting_id'];
    // Get the option value
    $value = get_option($setting_id, ''); // Default color
    // Output the select picker input
    echo '<select name="' . esc_attr($setting_id) . '" class="timeline_select">';
    echo '<option value="">--No animation--</option>';
    foreach ($animationNames as $animate) {
        $selected = selected($animate, $value, false);
        echo '<option value="'  . esc_attr($animate) . '" ' . $selected . '>' . $animate . '</option>';
    }
    echo '</select>';
}


function animateNumberCallBack($args){
    $setting_id = $args['setting_id'];
    switch( $setting_id){
        case 'timeline_item_animate_duration':
            $value = get_option($setting_id, ''); // Default color
            echo '<select name="' . esc_attr($setting_id) . '" class="timeline_select">';
            echo '<option value="">--select seconds--</option>';
            for ($i=1; $i<=5 ; $i++) {
                $selected = selected($i.'s', $value, false);
                echo '<option value="'  . esc_attr($i) . 's" ' . $selected . '>' . $i . 's</option>';
            }
            echo '</select>';
        break;
        case 'timeline_item_animate_delay':
            $value = get_option($setting_id, ''); // Default color
            echo '<select name="' . esc_attr($setting_id) . '" class="timeline_select">';
            echo '<option value="">--select seconds--</option>';
            for ($i=1; $i<=5 ; $i++) {
                $selected = selected($i.'s', $value, false);
                echo '<option value="'  .  esc_attr($i) . 's" ' . $selected . '>' . $i . 's</option>';
            }
            echo '</select>';
        break;
        case 'timeline_item_animate_repeat':
            $value = get_option($setting_id, ''); // Default color
            echo '<select name="' . esc_attr($setting_id) . '" class="timeline_select">';
            echo '<option value="">--select repeats--</option>';
            for ($i=1; $i<=5 ; $i++) {
                $selected = selected($i, $value, false);
                echo '<option value="'  .  esc_attr($i) . '" ' . $selected . '>' . $i . '</option>';
            }
            echo '</select>';
            break;
        default:
        // Default action if $setting_id doesn't match any case
        break;
    }
}

function animation_section_callback() {
    // Description for the color section
    echo "<p>animation section</p>";
}
?>