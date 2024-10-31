<?php
/**
 * counter Widget
 *
 * @since 1.0.0
 *
 * @package promote
 */


if ( !class_exists( 'promote_counter_widget' ) ) {

	class promote_counter_widget extends WP_Widget {

		public function __construct() {
			parent::__construct(
				'promote-counter-widget',
				__( 'Promote - Counter widget', 'promote' ),
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
				 <!-- counter widgets -->
     <div class="row">
         <!-- fun fact left start -->
         <div class="medium-3 columns">
           <div class="row">
               <!-- fun fact start -->
               <div class="large-12 small-6 columns">
                 <div class="fact">
                   <div class="fact-number" data-perc="<?php echo esc_attr($instance['number1']); ?>" >
                     <?php if (!empty($instance['number1'])):?>
                       <span class="factor timer color-light" data-from="0" data-to="<?php echo esc_attr($instance['number1']); ?>"><?php echo esc_attr($instance['number1']); ?></span>
                     <?php endif;?>
                   </div>
                     <?php if (!empty($instance['title1'])): ?>
                       <span class="fact-title color-light alpha7"><?php echo apply_filters('widget_title', $instance['title1']); ?></span>
                     <?php endif;?>
                 </div>
               </div>

             <!-- fun fact one end -->

             <!-- fun fact two  -->
             <!-- fun fact start -->
               <div class="large-12 small-6 columns">
                 <div class="fact">
                   <div class="fact-number" data-perc="<?php echo esc_attr($instance['number2']); ?>" >
                     <?php if (!empty($instance['number2'])):?>
                       <span class="factor timer color-light" data-from="0" data-to="<?php echo esc_attr($instance['number2']); ?>"><?php echo esc_attr($instance['number2']); ?></span>
                     <?php endif;?>
                   </div>
                     <?php if (!empty($instance['title2'])): ?>
                       <span class="fact-title color-light alpha7"><?php echo apply_filters('widget_title', $instance['title2']); ?></span>
                     <?php endif;?>
                 </div>
               </div>

             <!-- fun fact two end -->
           </div>
         </div>


       <!-- fun fact left end -->


       <!-- fun fact right start -->
       <div class="medium-3 medium-push-6 columns">
         <div class="row">
           <!-- fun fact 3 start -->

           <div class="large-12 small-6 columns">
             <div class="fact">
               <div class="fact-number" data-perc="<?php echo esc_attr($instance['number3']); ?>" >
                 <?php if (!empty($instance['number3'])):?>
                   <span class="factor timer color-light" data-from="0" data-to="<?php echo esc_attr($instance['number3']); ?>"><?php echo esc_attr($instance['number3']); ?></span>
                 <?php endif;?>
               </div>
                 <?php if (!empty($instance['title3'])): ?>
                   <span class="fact-title color-light alpha7"><?php echo apply_filters('widget_title', $instance['title3']); ?></span>
                 <?php endif;?>
             </div>
           </div>
       <!-- fun fact 3 end -->

       <!-- fun fact 4 start -->
           <div class="large-12 small-6 columns">
             <div class="fact">
               <div class="fact-number" data-perc="<?php echo esc_attr($instance['number4']); ?>" >
                 <?php if (!empty($instance['number4'])):?>
                   <span class="factor timer color-light" data-from="0" data-to="<?php echo esc_attr($instance['number4']); ?>"><?php echo esc_attr($instance['number4']); ?></span>
                 <?php endif;?>
               </div>
                 <?php if (!empty($instance['title4'])): ?>
                   <span class="fact-title color-light alpha7"><?php echo apply_filters('widget_title', $instance['title4']); ?></span>
                 <?php endif;?>
             </div>
           </div>
         </div>
       </div>
       <!-- fun fact 4 end -->
  <!-- fun fact right end -->

       <!-- mid image star -->
         <div class="medium-6 medium-pull-3 columns">
           <?php if( !empty($instance['image_uri']) ):?>
             <img src="<?php echo esc_url($instance['image_uri']); ?>" alt="" class="img-responsive">
           <?php endif;?>
         </div>
    </div>
     <!-- mid image end -->

<?php
        echo $after_widget;


    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
		/*section title */
				$instance['main_title'] = strip_tags($new_instance['main_title']);
				$instance['sub_title'] = strip_tags($new_instance['sub_title']);
		/*Box 1 */
        $instance['title1'] = strip_tags($new_instance['title1']);
        $instance['number1'] = strip_tags( $new_instance['number1'] );

		/*Box 2 */
        $instance['title2'] = strip_tags($new_instance['title2']);
        $instance['number2'] = strip_tags( $new_instance['number2'] );
		/* middle image */
				$instance['image_uri'] = strip_tags( $new_instance['image_uri'] );

    /*Box 3 right */
        $instance['title3'] = strip_tags($new_instance['title3']);
        $instance['number3'] = strip_tags( $new_instance['number3'] );
    /*Box 4 right */
        $instance['title4'] = strip_tags($new_instance['title4']);
        $instance['number4'] = strip_tags( $new_instance['number4'] );



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
        <!--BLOCK 1 START-->
        <div class="accordion_promote">
          <h4> <?php _e('Block 1', 'promote') ?></h4>
          <div class="pane_promote">
        <p>
            <label for="<?php echo $this->get_field_id('title1'); ?>"><?php _e('Title', 'promote'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title1'); ?>" id="<?php echo $this->get_field_id('title1'); ?>" value="<?php if( !empty($instance['title1']) ): echo $instance['title1']; endif; ?>" class="widefat">
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('number1'); ?>"><?php _e('number', 'promote'); ?></label><br/>
          <input type="text" name="<?php echo $this->get_field_name('number1'); ?>" id="<?php echo $this->get_field_id('number1'); ?>" value="<?php if( !empty($instance['number1']) ): echo $instance['number1']; endif; ?>" class="widefat">
        </p>


    </div>


         <!--BLOCK 2 START-->
    	<h4> <?php _e('Block 2', 'promote') ?></h4>
      <div class="pane_promote">

        <p>
            <label for="<?php echo $this->get_field_id('title2'); ?>"><?php _e('Title', 'promote'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title2'); ?>" id="<?php echo $this->get_field_id('title2'); ?>" value="<?php if( !empty($instance['title2']) ): echo $instance['title2']; endif; ?>" class="widefat">
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('number2'); ?>"><?php _e('number', 'promote'); ?></label><br/>
          <input type="text" name="<?php echo $this->get_field_name('number2'); ?>" id="<?php echo $this->get_field_id('number2'); ?>" value="<?php if( !empty($instance['number2']) ): echo $instance['number2']; endif; ?>" class="widefat">
        </p>

      </div>
    </div>
 <!--middle image-->
 <div class="media-picker-wrap">
   <?php if(!empty($instance['image_uri'])) { ?>
     <img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['image_uri']); ?>" />
       <i class="fa fa-times media-picker-remove"></i>
   <?php } ?>
   <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'image_uri' ); ?>" name="<?php echo $this->get_field_name( 'image_uri' ); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" type="hidden" />
    <a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'image_uri' ).'mpick'; ?>"><?php _e('Select Image', 'promote') ?></a>
 </div>

         <!--BLOCK 3 right-->
    <div class="accordion_promote">
      <h4> <?php _e('Block 3', 'promote') ?></h4>
        <div class="pane_promote">
        <p>
            <label for="<?php echo $this->get_field_id('title3'); ?>"><?php _e('Title', 'promote'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title3'); ?>" id="<?php echo $this->get_field_id('title3'); ?>" value="<?php if( !empty($instance['title3']) ): echo $instance['title3']; endif; ?>" class="widefat">
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('number3'); ?>"><?php _e('number', 'promote'); ?></label><br/>
          <input type="text" name="<?php echo $this->get_field_name('number3'); ?>" id="<?php echo $this->get_field_id('number3'); ?>" value="<?php if( !empty($instance['number3']) ): echo $instance['number3']; endif; ?>" class="widefat">
        </p>

      </div>
        <!--BLOCK 4 right-->
        <h4> <?php _e('Block 4', 'promote') ?></h4>
          <div class="pane_promote">
          <p>
              <label for="<?php echo $this->get_field_id('title4'); ?>"><?php _e('Title', 'promote'); ?></label><br/>
              <input type="text" name="<?php echo $this->get_field_name('title4'); ?>" id="<?php echo $this->get_field_id('title4'); ?>" value="<?php if( !empty($instance['title4']) ): echo $instance['title4']; endif; ?>" class="widefat">
          </p>
          <p>
            <label for="<?php echo $this->get_field_id('number4'); ?>"><?php _e('number', 'promote'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('number4'); ?>" id="<?php echo $this->get_field_id('number4'); ?>" value="<?php if( !empty($instance['number4']) ): echo $instance['number4']; endif; ?>" class="widefat">
          </p>

      </div>
</div> <!---end accordino---->
 <?php
	}
		//ENQUEUE CSS
   }
}
