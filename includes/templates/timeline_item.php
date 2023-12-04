<?php 
$post_id = get_the_ID();
$timeline_icon = get_post_meta($post_id, 'timeline_icon', true);
$timeline_date = get_post_meta( $post_id, 'timeline_date', true);
$dateTime = new DateTime($timeline_date);
$formattedDate = $dateTime->format('F j, Y');
?>
<div class="timeline_item_area">
        <div class="timeline_icon">
            <span class="dashicons <?php echo esc_attr($timeline_icon)?>"></span>
        </div>
        <div class="timeline_date">
                <span><?php echo esc_attr( $formattedDate )?></span>
        </div>
        <div class="timeline_item">
               <div class="timeline_thumbnail">
                        <?php echo the_post_thumbnail() ?>
               </div>
                <div class="timeline_title">
                   <?php echo the_title();?>
                </div>
               <div class="timeline_content">
                        <p><?php the_content(); ?></p>
                </div>
        </div>
 </div>