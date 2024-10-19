<?php 
$newsexo_top_header_social_content  = get_theme_mod( 'newsexo_top_header_social_content');
$newsexo_site_top_header_disabled  = get_theme_mod( 'newsexo_site_top_header_disabled', true );
$newsexo_site_top_header_date  = get_theme_mod( 'newsexo_site_top_header_date', true );
$newsexo_site_top_header_social_disabled  = get_theme_mod( 'newsexo_site_top_header_social_disabled', true );
$newsexo_social_icon_text = get_theme_mod('newsexo_social_icon_text', __('Follow Us', 'newsexo'));
?>
<?php if($newsexo_site_top_header_disabled == true): ?>

	<!--Header Sidebar-->
	<header class="site-header">
		<div class="container-full">
			<div class="row align-self-center">
			<?php if($newsexo_site_top_header_date == true) { ?>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<aside class="widget"> 
						<ul class="head-contact-info">
							<li><i class="fa-regular fa-calendar-days"></i>
							<?php echo esc_html(date_i18n('l, j F Y', strtotime(current_time("Y-m-d")))); ?>
							</li>
							<li><span id='newsexo-time' class="newsexo-time"> <?php $format = get_option('') . ' ' . get_option('time_format');
            print date_i18n($format, current_time('timestamp')); ?></span></li>
						</ul>
					</aside>
				</div>
			<?php } ?>

			<?php if($newsexo_site_top_header_social_disabled == true) { ?>			
				<div class="col-lg-6 col-md-6 col-sm-12">
					<aside class="widget">

					<ul class="custom-social-icons">
						<?php if($newsexo_social_icon_text != null): ?>	
						    <li class="followus"><?php echo esc_html($newsexo_social_icon_text); ?>
						    </li>
					    <?php endif;  ?>
							
							
					    <?php 
								if ( ! empty( $newsexo_top_header_social_content ) ) {
									
								$newsexo_top_header_social_content = json_decode( $newsexo_top_header_social_content );
								foreach ( $newsexo_top_header_social_content as $header_social ) {
								$icon = ! empty( $header_social->icon_value ) ? apply_filters( 'newsexo_translate_single_string',$header_social->icon_value, 'Theme Header Social' ) : '';
								$remove_string = 'fa-brands ' ;
								$remove_icon = str_replace($remove_string, '', $icon) ;
								
								$link = ! empty( $header_social->link ) ? apply_filters( 'newsexo_translate_single_string', $header_social->link, 'Theme Header Social' ) : '';
									if( !empty($header_social->open_new_tab)){ 
										$open_new_tab = $header_social->open_new_tab;
									} else{ $open_new_tab = 'no'; }  ?>

                                <?php if ( ! empty( $icon ) ) :?>
								    <?php if(!empty($link)){ ?>
										<li><a class="<?php echo esc_html( $remove_icon ); ?>" href="<?php echo $link; ?>" <?php if($open_new_tab =='yes'){?>target="_blank" <?php }?>><i class="fa <?php echo esc_html( $icon ); ?>"></i></a></li>
										<?php }else{ ?>
										<li><i class="fa <?php echo esc_html( $icon ); ?>"></i></li>
										<?php } ?>
								<?php endif; ?>
								
						    <?php } } else { ?>
								<li><a class="fa-square-facebook" href="#"><i class="fa-brands fa-square-facebook"></i></a></li>
								<li><a class="fa-square-twitter" href="#"><i class="fa-brands fa-square-twitter"></i></a></li>
								<li><a class="fa-google-plus" href="#"><i class="fa-brands fa-google-plus"></i></a></li>
								<li><a class="fa-linkedin" href="#"><i class="fa-brands fa-linkedin"></i></a></li>
							<?php } ?>
						</ul>


					</aside>
				</div>
			<?php } ?>	
			</div>
		</div>
	</header>
	<!--/End of Header Sidebar-->


<?php endif; ?>