<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package axresensationmm
 */

?>

	</div><!-- #content -->
	<!-- #colophon -->
</div><!-- #page -->

<footer>
	<div class="container">
		<div class="colmn">

			<div class="ask-box">
				<h3><?php echo get_field('above_find_a_surgeon_button', 'option') ;  ?></h3>
			</div>

			<?php if(!is_page('breast_reconstruction_surgeon_locator')) { ?>
			<a class="btn fbut" href="<?php echo get_field('find_a_surgeon_link', 'option') ;  ?>"><?php echo get_field('find_a_surgeon_text', 'option') ;  ?></a>
			<?php }else{ ?>
				<a class="btn2 btn fbut" href="<?php echo get_field('find_a_surgeon_link', 'option') ;  ?>"></a>

			<?php }	?>
			<a class="ft-logo"  href="<?php echo site_url(); ?>">
				<img  src="<?php echo get_field('logo', 'option') ;  ?>" alt="ReSensation&trade; Logo">
			</a>
			<?php
				wp_nav_menu( array(
					'menu' => 'FooterNavigation',
					'menu_class' => 'ft-menu',
					'container' => 'ul',
				) );
			?>
			<div class="footer-text-section">
				<?php echo get_field('above_social_icon', 'option') ;  ?>
				 <ul>
				<?php if( have_rows('social_icon','option') ): ?>
					<?php while( have_rows('social_icon','option') ): the_row(); ?>
						<li>
							<a target="_blank" href="<?php echo get_sub_field('social_links'); ?>">
								<i class="<?php echo get_sub_field('social_icons'); ?>"></i>
							</a>
						</li>
						
					<?php endwhile; ?>
				<?php endif; ?>

				</ul>
				<p><?php echo get_field('below_social_icon', 'option') ;  ?></p>
			</div>
			<div class="secondery-menu">
				<?php
					wp_nav_menu( array(
						'menu' => 'seconderyMenu',
						'menu_class' => 'ft-menu',
						'container' => 'ul',
					) );
				?>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//getsimpledata.com/piwik/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '8']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Piwik Code -->

</body>
</html>
