<?php
$footerCompanyName = get_field( 'footerCompanyName', 'option' );
?>

<!-- Footer Flex Content -->
<?php get_template_part( 'templates/footer', 'sections' ); ?>

<footer id="footerCustom">

	<div class="footerCopyright text-xs-center">

		<p><?php echo '© ' . do_shortcode( '[currentyear]' ) . ' ' . $footerCompanyName . ds_logo_color(); ?></p>

	</div>

</footer>