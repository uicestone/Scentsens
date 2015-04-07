<?php
/**
 * Widget Muffin Recent Comments
 *
 * @package Cake
 * @author Muffin group
 * @link http://muffingroup.com
 */

class Mfn_Recent_Comments_Widget extends WP_Widget {

	
	/* ---------------------------------------------------------------------------
	 * Constructor
	 * --------------------------------------------------------------------------- */
	function Mfn_Recent_Comments_Widget() {
		$widget_ops = array( 'classname' => 'widget_mfn_recent_comments', 'description' => __( 'The most recent comments.', 'mfn-opts' ) );
		$this->WP_Widget( 'widget_mfn_recent_comments', __( 'Muffin Recent Comments', 'mfn-opts' ), $widget_ops );
		$this->alt_option_name = 'widget_mfn_recent_comments';
	}
	
	
	/* ---------------------------------------------------------------------------
	 * Outputs the HTML for this widget.
	 * --------------------------------------------------------------------------- */
	function widget( $args, $instance ) {

		if ( ! isset( $args['widget_id'] ) ) $args['widget_id'] = null;
		extract( $args, EXTR_SKIP );

		echo $before_widget;
		
		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base);
		if( $title ) echo $before_title . $title . $after_title;
		
		$comments = get_comments( apply_filters( 'widget_comments_args', array( 'number' => intval( $instance['count']), 'status' => 'approve', 'post_status' => 'publish', 'post_type' => 'post' ) ) );
		
		if(is_array($comments))
		{           
			$output = '<div class="Recent_comments">';
				$output .= '<ul>';
					foreach($comments as $comment)
					{
						$url = get_permalink($comment->comment_post_ID).'#comment-'.$comment->comment_ID .'" title="'.$comment->comment_author .' | '.get_the_title($comment->comment_post_ID);						
						$date = new DateTime($comment->comment_date);
						$output .= '<li>';
							$output .= '<p><i class="icon-user"></i> <strong>'.strip_tags($comment->comment_author) .'</strong> commented on <a href="'. $url .'">'. get_the_title($comment->comment_post_ID) .'</a></p>';
							$output .= '<span class="date"><i class="icon-calendar-line"></i> '. $date->format('F j, Y') .'</span>';
						$output .= '</li>';						
					}
				$output .= '</ul>';
						
			$output .= '</div>'."\n";
		}
		echo $output;
		
		echo $after_widget;
	}


	/* ---------------------------------------------------------------------------
	 * Deals with the settings when they are saved by the admin.
	 * --------------------------------------------------------------------------- */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['count'] = (int) $new_instance['count'];
		
		return $instance;
	}

	
	/* ---------------------------------------------------------------------------
	 * Displays the form for this widget on the Widgets page of the WP Admin area.
	 * --------------------------------------------------------------------------- */
	function form( $instance ) {
		
		$title = isset( $instance['title']) ? esc_attr( $instance['title'] ) : '';
		$count = isset( $instance['count'] ) ? absint( $instance['count'] ) : 2;

		?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'mfn-opts' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php _e( 'Number of comments:', 'mfn-opts' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>" size="3"/>
			</p>
			
		<?php
	}
}
?>