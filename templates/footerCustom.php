<?php
$footerCompanyName = get_field( 'footerCompanyName', 'option' );
?>

<!-- Footer Flex Content $footerCompanyName . ds_logo_color() -->
<?php get_template_part( 'templates/footer', 'sections' ); ?>

<footer id="footerCustom">

	<div class="footerCopyright text-xs-center">

		<p><?php echo '© ' . do_shortcode( '[currentyear]' ) . ' ' . ; ?></p>

	</div>

</footer>