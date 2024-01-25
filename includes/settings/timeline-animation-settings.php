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
namespace ATWB\Settings;
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
class TimelineAnimationSettings{
    public function __construct(){
     $this-> timeline_load_Animation_settings();
    }
/**
 * This function will register section and settings field
 *
 * @return null
 */
function timeline_load_Animation_settings()
{
    add_settings_section('animation', 'Animation', array($this, 'Animation_Section_callback'), 'timeline-settings-animation');
    add_settings_field('timeline_odd_item_animation_name',  esc_html('Timeline odd item animation'), array($this, 'animationselectCallback'), 'timeline-settings-animation', 'animation', array('setting_id' => 'timeline_odd_item_animation_name'));
    add_settings_field('timeline_even_item_animation_name', esc_html('Timeline even item animation'), array($this, 'animationselectCallback'), 'timeline-settings-animation', 'animation', array('setting_id' => 'timeline_even_item_animation_name'));
    add_settings_field('timeline_item_animate_duration', esc_html('Timeline item animate duration'), array($this, 'animateNumberCallBack'), 'timeline-settings-animation', 'animation', array('setting_id' => 'timeline_item_animate_duration'));
    add_settings_field('timeline_item_animate_delay', esc_html('Timeline item animate delay'), array($this, 'animateNumberCallBack'), 'timeline-settings-animation', 'animation', array('setting_id' => 'timeline_item_animate_delay'));
    add_settings_field('timeline_item_animate_repeat', esc_html('Timeline item animate repeat'), array($this, 'animateNumberCallBack'), 'timeline-settings-animation', 'animation', array('setting_id' => 'timeline_item_animate_repeat'));
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
    ?>
    <select name="<?php echo esc_attr($setting_id)?>" class="timeline_select">
    <option value="">--No animation--</option>
    <?php
    foreach ($animationNames as $animate) {
        $selected = selected($animate, $value, false);
        ?>
        <option value="<?php echo esc_attr($animate)?>" <?php echo $selected?>><?php echo esc_html( $animate )?></option>
        <?php
    }?>
    </select>
    <?php
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
            $value = get_option($setting_id, ''); 
            ?>
            <select name="<?php echo esc_attr($setting_id)?>" class="timeline_select">
            <option value="">--select seconds--</option>
            <?php
        for ($i = 1; $i <= 5; $i++) {
                $selected = selected($i . 's', $value, false);
                ?>
               <option value="<?php echo esc_attr($i)?>s" <?php echo $selected?>><?php echo esc_html( $i .'s' )?></option>
                <?php
        }
        ?>
           </select>
           <?php
        break;
    case 'timeline_item_animate_delay':
            $value = get_option($setting_id, ''); // Default color
            ?>
            <select name="<?php echo esc_attr($setting_id)?>" class="timeline_select">
           <option value="">--select seconds--</option>
           <?php
        for ($i = 1; $i <= 5; $i++) {
                $selected = selected($i . 's', $value, false);
                ?>
                 <option value="<?php echo esc_attr($i)?>s" <?php echo $selected?>> <?php echo esc_html( $i .'s' )?></option>
                 <?php
                    }
                 ?>
            </select>
            <?php
        break;
    case 'timeline_item_animate_repeat':
            $value = get_option($setting_id, ''); ?>
            <select name="<?php echo esc_attr($setting_id)  ?>" class="timeline_select">
            <option value="">--select repeats--</option>
            <?php
        for ($i = 1; $i <= 5; $i++) {
                $selected = selected($i, $value, false);
                ?>
                <option value="<?php echo esc_attr($i)  ?>" <?php echo $selected?> > <?php echo esc_html( $i)?> </option>
                <?php
        }
        ?>
            </select>
            <?php
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
        echo esc_html("");
    }
}
new TimelineAnimationSettings();
