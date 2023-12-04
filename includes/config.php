<?php
    $allvariables = array(
        "timeline_border_color",
        "timeline_top_border_color",
        "timeline_odd_item_icon_color",
        "timeline_odd_item_icon_background_color",
        "timeline_odd_item_text_color",
        "timeline_odd_item_background_color",
        "timeline_odd_item_border_color",
        "timeline_even_item_icon_color",
        "timeline_even_item_icon_background_color",
        "timeline_even_item_text_color",
        "timeline_even_item_background_color",
        "timeline_even_item_border_color",
        "timeline_odd_item_title_color",
        "timeline_even_item_title_color",
    );
     echo '<style type="text/css"> :root{';
        foreach($allvariables as $field){
            $option_value = get_option($field);
            $sanitized_value = sanitize_hex_color($option_value); // Adjust based on the type of value
                echo '--'.$field.':'. $sanitized_value.';';
        }
        echo '--timeline_item_title_font_size:'. get_option('timeline_item_title_font_size', 30).'px;';
     echo '}</style>';

?>