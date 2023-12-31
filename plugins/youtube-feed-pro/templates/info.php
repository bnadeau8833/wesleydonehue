<div class="sby_info sby_info_<?php use SmashBalloon\YouTubeFeed\Pro\SBY_Display_Elements_Pro;

echo $context; ?>">

	<?php if ( SBY_Display_Elements_Pro::should_show_element( 'title', $context, $settings ) ) : ?>
		<p class="sby_video_title_wrap" <?php echo $video_title_attr; ?>>
			<span class="sby_video_title"><?php echo sby_esc_html_with_br( $title ); ?></span>
		</p>
	<?php endif; ?>

	<?php if ( SBY_Display_Elements_Pro::should_show_element( 'meta', $context, $settings ) ) : ?>
		<p class="sby_meta" <?php echo $sby_meta_color_styles; ?>>

			<?php if ( SBY_Display_Elements_Pro::should_show_element( 'user', $context, $settings ) ) : ?>
				<span class="sby_username_wrap" <?php echo $sby_meta_size_color_styles; echo $username_attr; ?>>
					<span class="sby_username"><?php echo esc_html( $username ); ?></span>
				</span>
			<?php endif; ?>
			<?php if ( SBY_Display_Elements_Pro::should_show_element( 'views', $context, $settings ) ) : ?>
				<span class="sby_view_count_wrap" <?php echo $sby_meta_size_color_styles; echo $views_attr; ?>>
					<span class="sby_view_count"><?php echo $views_count_string; ?></span>
				</span>
			<?php endif; ?>
			<?php if ( SBY_Display_Elements_Pro::should_show_element( 'date', $context, $settings ) ) : ?>
				<span class="sby_date_wrap" <?php echo $date_attr; ?>>
					<span class="sby_date sby_live_broadcast_type_<?php echo esc_attr( $live_broadcast_type ); ?>"><?php echo $formatted_date_string; ?></span>
				</span>
			<?php endif; ?>
		</p>
	<?php endif; ?>

	<?php if ( $live_broadcast_type !== 'none'
	           && SBY_Display_Elements_Pro::should_show_element( 'countdown', $context, $settings ) ) : ?>
		<p class="sby_ls_message_wrap" <?php echo $countdown_attr; ?>>
			<span class="sby_ls_message"><?php echo $live_streaming_time_string; ?></span>
		</p>
	<?php endif; ?>

	<?php if ( SBY_Display_Elements_Pro::should_show_element( 'stats', $context, $settings ) ) : ?>
		<p class="sby_stats" <?php echo $stats_attr; ?>>
            <span class="sby_likes" <?php echo $sby_meta_size_color_styles; ?>>
                <?php echo SBY_Display_Elements_Pro::get_icon( 'likes', $icon_type, $sby_meta_size_color_styles ); ?>
                <span class="sby_like_count"><?php echo $likes_count; ?></span>
            </span>
			<span class="sby_comments" <?php echo $sby_meta_size_color_styles; ?>>
                <?php echo SBY_Display_Elements_Pro::get_icon( 'comments', $icon_type, $sby_meta_size_color_styles ); ?>
                <span class="sby_comment_count"><?php echo $comments_count; ?></span>
            </span>
		</p>
	<?php endif; ?>

	<?php if ( SBY_Display_Elements_Pro::should_show_element( 'description', $context, $settings ) ) : ?>
		<p class="sby_caption_wrap sby_item_caption_wrap" <?php echo $description_attr; ?>>
			<span class="sby_caption" <?php echo $sby_info_styles; ?>><?php echo sby_esc_html_with_br( $caption ); ?></span><span class="sby_expand"> <a href="#"><span class="sby_more">...</span></a></span>
		</p>
    <?php endif; ?>
</div>