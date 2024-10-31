<?php
/**
 * ribbon Widget
 *
 * @since 1.0.0
 *
 * @package promote
 */


if ( !class_exists( 'promote_ribbon_widget' ) ) {

	class promote_ribbon_widget extends WP_Widget {

		public function __construct() {
			parent::__construct(
				'promote-ribbon-widget',
				__( 'Promote - Ribbon widget', 'promote' ),
        // Widget description
				array(
          'description' => __( 'You can add use this widgte in any section', 'promote' ),
					'customize_selective_refresh' => true,
				)
			);
			add_action( 'admin_enqueue_scripts', array( $this, 'widget_scripts' ) );
		}

		/**
		 * Enqueue Widget Scripts
		 *
		 * @param $hook
		 */
		function widget_scripts( $hook ) {
			if ( $hook != 'widgets.php' ) {
				return;
			}
			wp_enqueue_media();
			wp_enqueue_script( 'promote_widget_media_script', PROMOTE_EXTEN_URL . 'assets/js/widget-media.js', false, '1.1', true );
			wp_enqueue_style( 'promote_widget_media_style', PROMOTE_EXTEN_URL . 'assets/js/promote_widgets_custom_css.css', 'admin_css' );

		}

		/**
		 * Display Widget
		 *
		 * @param $args
		 * @param $instance
		 */
		 function widget($args, $instance) {

				 extract($args);

				 echo $before_widget;

				 ?>


<div id="ribbon">

                <div class="row">
                    <div class="medium-6 small-12 columns ">
                      <?php if (!empty($instance['image_uri'])): ?>
                        <img src="<?php echo esc_url($instance['image_uri']); ?>" class="img-responsive center-block">
                      <?php endif;?>
                    </div>
                    <div class="medium-6 small-12 columns">
                       <?php if( !empty($instance['main_title']) ): ?>
                        <h3>
                          <?php echo apply_filters('widget_title', $instance['main_title']); ?>
                            <small class="heading heading-solid"></small>
                        </h3>
                        <?php endif;?>
                        <?php if (!empty($instance['text'])): ?>
                        <p>
                          <?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text'])); ?>

                        </p>
                        <?php endif;?>
                        <?php if( !empty($instance['box_uri1']) ):?>
                        <a href="<?php echo esc_url($instance['box_uri1']);?>"  class="hvr-shutter-out-vertical team_bt1" ><?php if( !empty($instance['link_text']) ):?> <?php echo $instance['link_text'];?><?php endif;?></a>
                        <?php endif;?>

                    </div>

                </div>
        </div>

  <?php
    echo $after_widget;}
      function update($new_instance, $old_instance) {
        $instance = $old_instance;
			     $instance['main_title'] = strip_tags($new_instance['main_title']);
			     $instance['text'] = stripslashes(wp_filter_post_kses($new_instance['text']));
           $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
           $instance['box_uri1'] = strip_tags( $new_instance['box_uri1'] );
           $instance['link_text'] = strip_tags( $new_instance['link_text'] );
           return $instance;

       }

       function form($instance) {
   	?>
    <p>
         <label for="<?php echo $this->get_field_id('main_title'); ?>"><?php _e(' Title', 'promote'); ?></label><br/>
         <input type="text" name="<?php echo $this->get_field_name('main_title'); ?>" id="<?php echo $this->get_field_id('main_title'); ?>" value="<?php if( !empty($instance['main_title']) ): echo $instance['main_title']; endif; ?>" class="widefat">
     </p>
    <p>
        <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text', 'promote'); ?></label><br/>
        <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"><?php if( !empty($instance['text']) ): echo htmlspecialchars_decode($instance['text']); endif; ?></textarea>
    </p>
    <div class="media-picker-wrap">
      <?php if(!empty($instance['image_uri'])) { ?>
        <img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['image_uri']); ?>" />
          <i class="fa fa-times media-picker-remove"></i>
      <?php } ?>
      <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'image_uri' ); ?>" name="<?php echo $this->get_field_name( 'image_uri' ); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" type="hidden" />
        <a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'image_uri' ).'mpick'; ?>"><?php _e('Select Image', 'promote') ?></a>
    </div>
    <p>
        <label for="<?php echo $this->get_field_id('link_text'); ?>"><?php _e('link text', 'promote'); ?></label><br/>
        <input type="text" name="<?php echo $this->get_field_name('link_text'); ?>" id="<?php echo $this->get_field_id('link_text'); ?>" value="<?php if( !empty($instance['link_text']) ): echo $instance['link_text']; endif; ?>" class="widefat">
    </p>
    <p>

      <label for="<?php echo $this->get_field_id('box_uri1'); ?>"><?php _e('Link ','promote'); ?></label><br />
      <input type="text" name="<?php echo $this->get_field_name('box_uri1'); ?>" id="<?php echo $this->get_field_id('box_uri1'); ?>" value="<?php if( !empty($instance['box_uri1']) ): echo esc_url($instance['box_uri1']); endif; ?>" class="widefat">
    </p>
    <?php
     }
       //ENQUEUE CSS
      }
    }
