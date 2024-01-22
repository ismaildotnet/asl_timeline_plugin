<?php
/**
 * This animation settings for timeline
 *
 * PHP version 7.4.1
 *
 * @category Basefile
 * @package  General
 * @author   Alchemy Software Limited <wordpress@alchemy-bd.com>
 * @license  GPL v2 or later
 * @link     alchemy-bd.com
 */
namespace atwb\settings;
/**
 * This function will register section and settings field
 *
 * @return null
 */
function timeline_load_Animation_settings()
{
    add_settings_section('animation', 'Animation', 'atwb\settings\Animation_Section_callback', 'timeline-settings-animation');

    add_settings_field('timeline_odd_item_animation_name', 'Timeline odd item animation name', 'atwb\settings\animationselectCallback', 'timeline-settings-animation', 'animation', array('setting_id' => 'timeline_odd_item_animation_name'));
    add_settings_field('timeline_even_item_animation_name', 'Timeline even item animation name', 'atwb\settings\animationselectCallback', 'timeline-settings-animation', 'animation', array('setting_id' => 'timeline_even_item_animation_name'));
    add_settings_field('timeline_item_animate_duration', 'Timeline item animate duration', 'atwb\settings\animateNumberCallBack', 'timeline-settings-animation', 'animation', array('setting_id' => 'timeline_item_animate_duration'));
    add_settings_field('timeline_item_animate_delay', 'Timeline item animate delay', 'atwb\settings\animateNumberCallBack', 'timeline-settings-animation', 'animation', array('setting_id' => 'timeline_item_animate_delay'));
    add_settings_field('timeline_item_animate_repeat', 'Timeline item animate repeat', 'atwb\settings\animateNumberCallBack', 'timeline-settings-animation', 'animation', array('setting_id' => 'timeline_item_animate_repeat'));
}
/**
 * The Animation load html function call back function
 * 
 * @param mixed $args is arguemnt of settings field
 * 
 * @return null
 */
function animationselectCallback($args)
{
    $animationNames = array(
        "slideInDown",
        "slideInUp",
        "slideInLeft",
        "slideInRight",
    );
    $setting_id = $args['setting_id'];
    // Get the option value
    $value = get_option($setting_id, ''); // Default color
    // Output the select picker input
    echo  '<select name="' . esc_attr($setting_id) . '" class="timeline_select">';
    echo '<option value="">--No animation--</option>';
    foreach ($animationNames as $animate) {
        $selected = selected($animate, $value, false);
        echo '<option value="' . esc_attr($animate) . '" ' . $selected . '>' . $animate . '</option>';
    }
    echo '</select>';
}
/**
 * The Animation load html function call back function
 * 
 * @param mixed $args is arguemnt of settings field
 * 
 * @return null
 */
function animateNumberCallBack($args)
{
    $setting_id = $args['setting_id'];
    switch ($setting_id) {
    case 'timeline_item_animate_duration':
            $value = get_option($setting_id, ''); // Default color
            echo '<select name="' . esc_attr($setting_id) . '" class="timeline_select">';
            echo '<option value="">--select seconds--</option>';
        for ($i = 1; $i <= 5; $i++) {
                $selected = selected($i . 's', $value, false);
                echo '<option value="' . esc_attr($i) . 's" ' . $selected . '>' . $i . 's</option>';
        }
            echo '</select>';
        break;
    case 'timeline_item_animate_delay':
            $value = get_option($setting_id, ''); // Default color
            echo '<select name="' . esc_attr($setting_id) . '" class="timeline_select">';
            echo '<option value="">--select seconds--</option>';
        for ($i = 1; $i <= 5; $i++) {
                $selected = selected($i . 's', $value, false);
                echo '<option value="' . esc_attr($i) . 's" ' . $selected . '>' . $i . 's</option>';
        }
            echo ese_html('</select>');
        break;
    case 'timeline_item_animate_repeat':
            $value = get_option($setting_id, ''); // Default color
            echo '<select name="' . esc_attr($setting_id) . '" class="timeline_select">';
            echo '<option value="">--select repeats--</option>';
        for ($i = 1; $i <= 5; $i++) {
                $selected = selected($i, $value, false);
                echo '<option value="' . esc_attr($i) . '" ' . $selected . '>' . $i . '</option>';
        }
            echo '</select>';
        break;
    default:
        break;
    }
}
/**
 * The Animation load html function call back function
 * 
 * @return null
 */
function Animation_Section_callback()
{
    // Description for the color section
    echo esc_html("<p>animation section</p>");
}