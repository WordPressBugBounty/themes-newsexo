<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package newsexo
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
 
$activate_theme_data = wp_get_theme(); // getting current theme data
$activate_theme = $activate_theme_data->name;
if( 'News Digest' == $activate_theme ){
	$vrsn_two_class = 'vrsn-three';
}
elseif( 'Newsio' == $activate_theme || 'Seattle News' == $activate_theme || 'News Gadgets' == $activate_theme){
	$vrsn_two_class = 'vrsn-two';
}else{ $vrsn_two_class = ''; }
 ?>
<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'newsexo' ); ?></p>
	<?php return; endif; ?>
         <?php if ( have_comments() ) : ?>
		<article class="theme-comment-area wow animate fadeInUp <?php echo $vrsn_two_class; ?>" data-wow-delay=".3s">	
			<div class="news-section-title five">
				<h5 class="f-heading">
				<?php echo comments_number(__( 'No Comments', 'newsexo'), __('One comment','newsexo'), __('% comments', 'newsexo')); ?>
				</h5>
			</div>
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>		
			<?php endif; ?>
			<?php wp_list_comments( array( 'callback' => 'newsexo_comment' ) ); ?>
		</article>
		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php esc_html_e( 'Comment navigation', 'newsexo' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'newsexo' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'newsexo' ) ); ?></div>
		</nav>
		<?php endif;  ?>
		<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : 
		?>
	<?php endif; ?>
	<?php if ('open' == $post->comment_status) : ?>
	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<article class="logged-in-color"><p><?php 
		/* translators: %1$s %2$s: logged in */
		echo sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment','newsexo' ), esc_url(home_url( 'wp-login.php' ) . '?redirect_to=' .  urlencode(get_permalink()))); ?></p></article>
</p>
<?php else : ?>
	<article class="theme-comment-form wow animate fadeInUp <?php echo $vrsn_two_class; ?>" data-wow-delay=".3s">
	<?php  
	 $fields=array(
		'author' => '<div class="form-group mb-3"><label>'.__("Name",'newsexo').'<span class="required">*</span></label><input class="form-control" name="author" id="author" value="" type="text"/></div>',
		'email' => '<div class="form-group mb-3"><label>'.__("Email",'newsexo').'<span class="required">*</span></label><input class="form-control" name="email" id="email" value=""   type="email" ></div>',		
		);
	function my_fields($fields) { 
		return $fields;
	}
	add_filter('comment_form_default_fields','my_fields');
		$defaults = array(
		'fields'=> apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'=> '<div class="form-group mb-3"><label>'.__("Comment",'newsexo').'</label>
		<textarea id="comments" rows="5" class="form-control" name="comment" type="text"></textarea></div>',		
		'logged_in_as' => '<p class="logged-in-as">' . __( "Logged in as",'newsexo' ).' '.'<a href="'. admin_url( 'profile.php' ).'">'.$user_identity.'</a>'. ' '. '<a href="'. wp_logout_url( get_permalink() ).'" title="Log out of this account">'.__("Logout",'newsexo').'</a>' . '</p>',
		'id_submit'=> 'send_button',
		'label_submit'=>__( 'Submit','newsexo'),
		'comment_notes_after'=> '',
		'title_reply'=> '<span class="news-section-title five"><h5 class="f-heading">'.__('Leave a Reply','newsexo').'</h5></span>',
		'id_form'=> 'action'
		);
	comment_form($defaults);?>						
<?php endif; // If registration required and not logged in ?>
<?php endif;  ?>