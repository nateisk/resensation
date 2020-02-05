<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package axresensationmm
 */

get_header();
?>

<main>
    <div class="faq-section page-content">
        <div class="container">
            <div class="colmn">

			<section class="error-404 not-found">
				<div class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'axresensationmm' ); ?></h1>
				</div><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'axresensationmm' ); ?></p>

					
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</div>
	</div>
</div>
</main>
<?php
get_footer();
