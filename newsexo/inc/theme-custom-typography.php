<?php 
function newsexo_custom_typography_css() { 
$newsexo_typography_disabled = get_theme_mod('newsexo_typography_disabled', false);
If($newsexo_typography_disabled == true):
?>
<style type="text/css">

/*------------------- Body ---------------------*/

<?php  if(get_theme_mod('newsexo_typography_base_font_family') != null): ?>
    body { font-family: <?php echo esc_attr(get_theme_mod('newsexo_typography_base_font_family')); ?>; } 
<?php endif; ?>

<?php  if(get_theme_mod('newsexo_typography_base_font_size')){ ?>
    body { font-size: <?php echo esc_attr(get_theme_mod('newsexo_typography_base_font_size')); ?>; } 
<?php } ?>

/*------------------- H1---------------------*/

<?php  if(get_theme_mod('newsexo_typography_h1_font_family') != null): ?>
    h1 { font-family: <?php echo esc_attr(get_theme_mod('newsexo_typography_h1_font_family')); ?>; } 
<?php endif; ?>

/*------------------- H2---------------------*/

<?php  if(get_theme_mod('newsexo_typography_h2_font_family') != null): ?>
    h2{ font-family: <?php echo esc_attr(get_theme_mod('newsexo_typography_h2_font_family')); ?>; } 
<?php endif; ?>

/*------------------- H3---------------------*/

<?php  if(get_theme_mod('newsexo_typography_h3_font_family') != null): ?>
    h3 { font-family: <?php echo esc_attr(get_theme_mod('newsexo_typography_h3_font_family')); ?>; }
<?php endif; ?>

/*------------------- H4---------------------*/

<?php  if(get_theme_mod('newsexo_typography_h4_font_family') != null): ?>
    h4 { font-family: <?php echo esc_attr(get_theme_mod('newsexo_typography_h4_font_family')); ?>; }
<?php endif; ?>

/*------------------- H5---------------------*/

<?php  if(get_theme_mod('newsexo_typography_h5_font_family') != null): ?>
    h5 { font-family: <?php echo esc_attr(get_theme_mod('newsexo_typography_h5_font_family')); ?>; }
<?php endif; ?>

/*------------------- H6---------------------*/

<?php  if(get_theme_mod('newsexo_typography_h6_font_family') != null): ?>
    h6 { font-family: <?php echo esc_attr(get_theme_mod('newsexo_typography_h6_font_family')); ?>; }
<?php endif; ?>

</style>
<?php endif; }
add_action( 'wp_head', 'newsexo_custom_typography_css' );
?>