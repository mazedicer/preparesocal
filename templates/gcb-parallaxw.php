<?php
/**
 * Template for Parallax Content Block
 *
 **/

/*A Test*/
$blockID = get_the_ID();
$blockAdminURL = get_edit_post_link($blockID);
$ppBGImg = get_field('parallaxImg', $blockID); //parallax background img
$ppBGExtImg = get_field('parallaxExternalImg', $blockID); //parallax external background img
$ppBGImgSize = get_field('parallaxHeight', $blockID); //parallax background img size container
$ppContent = get_field('parallaxContent', $blockID);
$ppOverlay = get_field('parallax_overlay', $blockID);
$ppOpacity = get_field('parallax_overlay_opacity', $blockID);
$ppContentWidth = get_field('content_container_width', $blockID);
$ppContentAlignment = get_field('parallax_content_alignment', $blockID);
$ppTextColor = get_field('parallax_text_color', $blockID);
$ppCtaButton = get_field('parallax_cta_button', $blockID);
$ppCtaLink = get_field('parallax_cta_link', $blockID);

// If external bg IMG use that, otherwise use the wordpress IMG.

if ( !empty($ppBGExtImg) ) {
	$ppBGImg = $ppBGExtImg;
}


?>


<?php

if ( $ppOverlay ) { ?>

	<style>

		.ID<?php echo $blockID;?>preludeParallax .container {
			z-index: 2;
		}

	</style>

<?php } ?>


<!-- gets content alignment -->

<?php
switch ( $ppContentAlignment ) {
	case 'left': ?>

		<style>
            .ID<?php echo $blockID;?>parallaxContent p {
				text-align:left;
            }
			@media (min-width: 1024px) {
				.ID<?php echo $blockID;?>parallaxContent {
					float: left;
					max-width: <?php echo $ppContentWidth; ?>px;
				}
			}

		</style>

		<?php ?>


		<?php break;

	case 'center': ?>

		<style>
				.ID<?php echo $blockID;?>parallaxContent {
					text-align: center;
					margin: 0 auto;
					max-width: <?php echo $ppContentWidth; ?>px;
			}

		</style>

		<?php break;


	case 'right': ?>

		<style>
			@media (min-width: 1024px) {
				.ID<?php echo $blockID;?>parallaxContent {
					float: right;
					max-width: <?php echo $ppContentWidth; ?>px;
				}
			}

		</style>


		<?php break;


	default:
		# code...
		break;
}


?>

<style>

	/* Create the parallax scrolling effect */
	.ID<?php echo $blockID;?>preludeParallax {
		background-attachment: fixed;
		background-position: center center;
		background-repeat: no-repeat;
		background-size: cover;
		position: relative;
		background-image: url("<?php echo $ppBGImg; ?>");
		height: <?php echo $ppBGImgSize; ?>px;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	/* Overlay */
	.ID<?php echo $blockID;?>preludeParallax:before {
		content: '';
		background: <?php echo changeHex($ppOverlay, $ppOpacity); ?>;
		position: absolute;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		}

		.ID<?php echo $blockID;?>parallaxContent,
		.ID<?php echo $blockID;?>parallaxContent h2,
		.ID<?php echo $blockID;?>parallaxContent p,
		.ID<?php echo $blockID;?>parallaxContent li
		 {
			color: <?php echo $ppTextColor; ?>;
		}

	@media (max-width: 1024px) {
		.ID<?php echo $blockID;?>preludeParallax {
			background-attachment: initial;
		}
	}

</style>

<div class="ID<?php echo $blockID;?>preludeParallax">


	<div class="container">

		<?php $blockEditLink =  get_edit_post_link($blockID);
		if (current_user_can('administrator') ) {
		echo '<div id="'.$blockID.'Edit" class="editBlock">
		                      <a href="'.$blockEditLink.'"><img data-toggle="tooltip" data-placement="top" title="Edit Parallax Block" src="'.get_template_directory_uri().'/assets/img/editblock.png" /></a></div> ';
		}
		?>
		<script type="text/javascript">
		    $('.ID<?php echo $blockID;?>preludeParallax').hover(
		      function() {
		        $( '#<?php echo $blockID; ?>Edit' ).addClass( "editBlockHover" );
		      }, function() {
		$( '#<?php echo $blockID; ?>Edit' ).removeClass( 'editBlockHover' );
		}
		    );

		</script>
		<div class="ID<?php echo $blockID;?>parallaxContent">
			<?php echo $ppContent; ?>
			<?php if ( $ppCtaButton ) { ?>

			<a class="btn btn-danger" href="<?php echo $ppCtaLink; ?>"><?php echo $ppCtaButton; ?></a>

			<?php } ?>

		</div>
	</div>
</div>
