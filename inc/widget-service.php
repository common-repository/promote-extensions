<?php
/**
 * service Widget
 *
 * @since 1.0.0
 *
 * @package promote
 */


if ( !class_exists( 'promote_service_widget' ) ) {

	class promote_service_widget extends WP_Widget {

		public function __construct() {
			parent::__construct(
				'promote-service-widget',
				__( 'Promote - Service widget', 'promote' ),
				array(
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
			wp_enqueue_script( 'wp-color-picker' );
			 wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_media();
			wp_enqueue_script( 'promote_widget_media_script', PROMOTE_EXTEN_URL . 'assets/js/widget-media.js', false, '1.1', true );
			wp_enqueue_style( 'promote_widget_media_style', PROMOTE_EXTEN_URL . 'assets/js/promote_widgets_custom_css.css', 'admin_css' );

		}
		function widget($args, $instance) {

 			 extract($args);

 			 echo $before_widget;

 			 ?>
			 <!--section head end-->
				  <?php if ( !empty($instance['main_title']) || !empty($instance['sub_title']) ):?>
						 <div class=" row mt50 mb50">
								 <div class="section-header wow fadeIn animated " data-wow-duration="1s">
									 <?php if( !empty($instance['main_title']) ): ?>
										 <h1 class="section-title wow fadeIn"   >
											 <?php echo apply_filters('widget_title', $instance['main_title']); ?>
										 </h1>
											 <div class="colored-line"></div>
									<?php endif;?>
									<?php if( !empty($instance['sub_title']) ): ?>
										 <div class="section-description">
												 <h2 ><?php echo apply_filters('widget_title', $instance['sub_title']); ?></h2>
										 </div>
									 <?php endif;?>
								 </div><!--section head end-->
						 </div><!--row end-->
				 <?php endif; ?>
 					<div class="row mt50">
						<?php	if (!empty($instance['icon1']) || !empty($instance['title1']) || !empty($instance['text1']) || !empty($instance['image_uri1'])): ?>
                    <!-- feature one start -->
              <div class="matchhe large-4 medium-6 small-12 columns mb35 ">
                <div class="content-box content-box-center content-box-icon-o ">
                      <?php if (!empty($instance['icon1'])): ?>
                          <span class="color-primary border-primary" style="color:<?php echo esc_attr($instance['icon_color1']); ?>;"><i class="fa <?php echo esc_attr($instance['icon1']); ?> " aria-hidden="true"></i></span>
                      <?php endif;?>

                      <?php if (!empty($instance['image_uri1'])): ?>
                            <img src="<?php echo esc_url($instance['image_uri1']); ?> " alt=""/>
											<?php endif;?>
											<?php if (!empty($instance['title1'])): ?>
												<h5><?php echo apply_filters('widget_title', $instance['title1']); ?></h5>
											<?php endif;?>
											<?php if (!empty($instance['text1'])): ?>
                          <p><?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text1'])); ?></p>
											<?php endif;?>
                  </div>
                </div>
                <!-- feature one end -->
							<?php endif; ?>

							<?php	if (!empty($instance['icon2']) || !empty($instance['title2']) || !empty($instance['text2']) || !empty($instance['image_uri2'])): ?>
	                    <!-- feature two start -->
	              <div class="matchhe large-4 medium-6 small-12 columns mb35 ">
	                <div class="content-box content-box-center content-box-icon-o ">
	                      <?php if (!empty($instance['icon2'])): ?>
	                          <span class="color-primary border-primary" style="color:<?php echo esc_attr($instance['icon_color2']); ?>;"><i class="fa <?php echo esc_attr($instance['icon2']); ?> " aria-hidden="true"></i></span>
	                      <?php endif;?>

	                      <?php if (!empty($instance['image_uri2'])): ?>
	                            <img src="<?php echo esc_url($instance['image_uri2']); ?> " alt=""/>
												<?php endif;?>
												<?php if (!empty($instance['title2'])): ?>
													<h5><?php echo apply_filters('widget_title', $instance['title2']); ?></h5>
												<?php endif;?>
												<?php if (!empty($instance['text2'])): ?>
	                          <p><?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text2'])); ?></p>
												<?php endif;?>
	                  </div>
	                </div>
	                <!-- feature two end -->
								<?php endif; ?>

								<?php	if (!empty($instance['icon3']) || !empty($instance['title3']) || !empty($instance['text3']) || !empty($instance['image_uri3'])): ?>
		                    <!-- feature three start -->
		              <div class="matchhe large-4 medium-6 small-12 columns mb35 ">
		                <div class="content-box content-box-center content-box-icon-o ">
		                      <?php if (!empty($instance['icon3'])): ?>
		                          <span class="color-primary border-primary" style="color:<?php echo esc_attr($instance['icon_color3']); ?>;" ><i class="fa <?php echo esc_attr($instance['icon3']); ?> " aria-hidden="true"></i></span>
		                      <?php endif;?>

		                      <?php if (!empty($instance['image_uri3'])): ?>
		                            <img src="<?php echo esc_url($instance['image_uri3']); ?> " alt=""/>
													<?php endif;?>
													<?php if (!empty($instance['title3'])): ?>
														<h5><?php echo apply_filters('widget_title', $instance['title3']); ?></h5>
													<?php endif;?>
													<?php if (!empty($instance['text3'])): ?>
		                          <p><?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text3'])); ?></p>
													<?php endif;?>
		                  </div>
		                </div>
		                <!-- feature three end -->
									<?php endif; ?>
        </div><!--row end-->

<?php
        echo $after_widget;


    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;

		/*section title */
				$instance['main_title'] = strip_tags($new_instance['main_title']);
				$instance['sub_title'] = strip_tags($new_instance['sub_title']);
		/*Box 1 */
        $instance['icon1'] = strip_tags( $new_instance['icon1'] );
				$instance['icon_color1'] = strip_tags($new_instance['icon_color1']);
				$instance['image_uri1'] = strip_tags( $new_instance['image_uri1'] );
        $instance['title1'] = strip_tags($new_instance['title1']);
				$instance['text1'] = stripslashes(wp_filter_post_kses($new_instance['text1']));

		/*Box 2 */
        $instance['icon2'] = strip_tags( $new_instance['icon2'] );
				$instance['icon_color2'] = strip_tags($new_instance['icon_color2']);
				$instance['image_uri2'] = strip_tags( $new_instance['image_uri2'] );
        $instance['title2'] = strip_tags($new_instance['title2']);
				$instance['text2'] = stripslashes(wp_filter_post_kses($new_instance['text2']));


		/*Box 3 */
        $instance['icon3'] = strip_tags( $new_instance['icon3'] );
				$instance['icon_color3'] = strip_tags($new_instance['icon_color3']);
				$instance['image_uri3'] = strip_tags( $new_instance['image_uri3'] );
        $instance['title3'] = strip_tags($new_instance['title3']);
				$instance['text3'] = stripslashes(wp_filter_post_kses($new_instance['text3']));


        return $instance;

    }

    function form($instance) {
	?>
	<p>
			 <label for="<?php echo $this->get_field_id('main_title'); ?>"><?php _e('Main Title', 'promote'); ?></label><br/>
			 <input type="text" name="<?php echo $this->get_field_name('main_title'); ?>" id="<?php echo $this->get_field_id('main_title'); ?>" value="<?php if( !empty($instance['main_title']) ): echo $instance['main_title']; endif; ?>" class="widefat">
	 </p>

	 <p>
			 <label for="<?php echo $this->get_field_id('sub_title'); ?>"><?php _e('Sub Title', 'promote'); ?></label><br/>
			 <input type="text" name="<?php echo $this->get_field_name('sub_title'); ?>" id="<?php echo $this->get_field_id('sub_title'); ?>" value="<?php if( !empty($instance['sub_title']) ): echo $instance['sub_title']; endif; ?>" class="widefat">
	 </p>

         <h5><?php _e('For font-awesome icon visit ', 'promote') ?><a href="<?php echo esc_url('https://fortawesome.github.io/Font-Awesome/icons/');?>"><?php _e('font-awesome','promote')?></a></h5>
        <!--BLOCK 1 START-->
        <div class="accordion_promote">
          <h4> <?php _e('Block 1', 'promote') ?></h4>
          <div class="pane_promote">
        	<p>
            <label for="<?php echo $this->get_field_id('icon1'); ?>"><?php _e('Icon', 'promote'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('icon1'); ?>" id="<?php echo $this->get_field_id('icon1'); ?>" value="<?php if( !empty($instance['icon1']) ): echo $instance['icon1']; endif; ?>" class="widefat">
        	</p>
					<p>
				<label for="<?php echo $this->get_field_id( 'icon_color1' ); ?>" class="icon-color"><?php _e('Icon Color', 'promote') ?></label>
				<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'icon_color1' ); ?>" name="<?php echo $this->get_field_name( 'icon_color1' ); ?>" value="<?php echo $instance['icon_color1']; ?>" type="text" />
			</p>
	         <h5> <?php _e('or you can use your own logo instead', 'promote') ?></h5>
        <div class="media-picker-wrap">
          <?php if(!empty($instance['image_uri1'])) { ?>
            <img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['image_uri1']); ?>" />
              <i class="fa fa-times media-picker-remove"></i>
          <?php } ?>
          <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'image_uri1' ); ?>" name="<?php echo $this->get_field_name( 'image_uri1' ); ?>" value="<?php if( !empty($instance['image_uri1']) ): echo $instance['image_uri1']; endif; ?>" type="hidden" />
          	<a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'image_uri1' ).'mpick'; ?>"><?php _e('Select Image', 'promote') ?></a>
        </div>

        <p>
            <label for="<?php echo $this->get_field_id('title1'); ?>"><?php _e('Title', 'promote'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title1'); ?>" id="<?php echo $this->get_field_id('title1'); ?>" value="<?php if( !empty($instance['title1']) ): echo $instance['title1']; endif; ?>" class="widefat">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('text1'); ?>"><?php _e('Text', 'promote'); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text1'); ?>" id="<?php echo $this->get_field_id('text1'); ?>"><?php if( !empty($instance['text1']) ): echo htmlspecialchars_decode($instance['text1']); endif; ?></textarea>
        </p>

    </div>


         <!--BLOCK 2 START-->
    	<h4> <?php _e('Block 2', 'promote') ?></h4>
      <div class="pane_promote">
        <p>
            <label for="<?php echo $this->get_field_id('icon2'); ?>"><?php _e('Icon', 'promote'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('icon2'); ?>" id="<?php echo $this->get_field_id('icon2'); ?>" value="<?php if( !empty($instance['icon2']) ): echo $instance['icon2']; endif; ?>" class="widefat">
        </p>
				<p>
			<label for="<?php echo $this->get_field_id( 'icon_color2' ); ?>" class="icon-color"><?php _e('Icon Color', 'promote') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'icon_color2' ); ?>" name="<?php echo $this->get_field_name( 'icon_color2' ); ?>" value="<?php echo $instance['icon_color2']; ?>" type="text" />
				</p>
				 <h5> <?php _e('or you can use your own logo instead', 'promote') ?></h5>
        <div class="media-picker-wrap">
          <?php if(!empty($instance['image_uri2'])) { ?>
            <img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['image_uri2']); ?>" />
            <i class="fa fa-times media-picker-remove"></i>
          <?php } ?>
          <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'image_uri2' ); ?>" name="<?php echo $this->get_field_name( 'image_uri2' ); ?>" value="<?php if( !empty($instance['image_uri2']) ): echo $instance['image_uri2']; endif; ?>" type="hidden" />
          <a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'image_uri2' ).'mpick'; ?>"><?php _e('Select Image', 'promote') ?></a>
        </div>
        <p>
            <label for="<?php echo $this->get_field_id('title2'); ?>"><?php _e('Title', 'promote'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title2'); ?>" id="<?php echo $this->get_field_id('title2'); ?>" value="<?php if( !empty($instance['title2']) ): echo $instance['title2']; endif; ?>" class="widefat">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text2'); ?>"><?php _e('Text', 'promote'); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text2'); ?>" id="<?php echo $this->get_field_id('text2'); ?>"><?php if( !empty($instance['text2']) ): echo htmlspecialchars_decode($instance['text2']); endif; ?></textarea>
        </p>

      </div>

         <!--BLOCK 3 START-->
      <h4> <?php _e('Block 3', 'promote') ?></h4>
        <div class="pane_promote">
        	<p>
            <label for="<?php echo $this->get_field_id('icon3'); ?>"><?php _e('Icon', 'promote'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('icon3'); ?>" id="<?php echo $this->get_field_id('icon3'); ?>" value="<?php if( !empty($instance['icon3']) ): echo $instance['icon3']; endif; ?>" class="widefat">
        	</p>
					<p>
				<label for="<?php echo $this->get_field_id( 'icon_color3' ); ?>" class="icon-color"><?php _e('Icon Color', 'promote') ?></label>
				<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'icon_color3' ); ?>" name="<?php echo $this->get_field_name( 'icon_color3' ); ?>" value="<?php echo $instance['icon_color3']; ?>" type="text" />
					</p>
	         <h5> <?php _e('or you can use your own logo instead', 'promote') ?></h5>
        <div class="media-picker-wrap">
          <?php if(!empty($instance['image_uri3'])) { ?>
            <img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['image_uri3']); ?>" />
            <i class="fa fa-times media-picker-remove"></i>
          <?php } ?>
          <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'image_uri3' ); ?>" name="<?php echo $this->get_field_name( 'image_uri3' ); ?>" value="<?php if( !empty($instance['image_uri3']) ): echo $instance['image_uri3']; endif; ?>" type="hidden" />
          <a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'image_uri3' ).'mpick'; ?>"><?php _e('Select Image', 'promote') ?></a>
        </div>
          <p>
            <label for="<?php echo $this->get_field_id('title3'); ?>"><?php _e('Title', 'promote'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title3'); ?>" id="<?php echo $this->get_field_id('title3'); ?>" value="<?php if( !empty($instance['title3']) ): echo $instance['title3']; endif; ?>" class="widefat">
        	</p>


        <p>
            <label for="<?php echo $this->get_field_id('text3'); ?>"><?php _e('Text', 'promote'); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text3'); ?>" id="<?php echo $this->get_field_id('text3'); ?>"><?php if( !empty($instance['text3']) ): echo htmlspecialchars_decode($instance['text3']); endif; ?></textarea>
        </p>

      </div>
</div> <!---end accordino---->


 <?php
	}
		//ENQUEUE CSS
   }
}
