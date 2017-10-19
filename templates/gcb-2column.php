<?php
/**
 * Template for 2 Column Content Block
 *
 *
 */

?>


<?php
$blockID                 = get_the_ID();
$blockAdminURL           = get_edit_post_link( $blockID );
$container               = get_field( 'twoCContainer' );
$containerWidth				 = get_field( 'twoCContainerWidth' );
$topIntroBlockOption     = get_field( 'twoCTopIntroBlockOption' );
$bottomOutroBlockOption  = get_field( 'twoCBottomOutroBlockOption' );
$columnsSize             = get_field( 'twoColumnSizes' );
$topIntroBGColor         = get_field( 'intro_block_background_color' );
$topIntroFontColor       = get_field( 'intro_font_color' );
$bottomOutroBGColor      = get_field( 'outro_block_background_color' );
$bottomOutroFontColor    = get_field( 'outro_font_color' );
$backgroundContainerType = get_field( 'background_type_two_column_container' );
$overlayShape            = get_field( 'overlay_shape_two_column' );



// If have a width option on the container
if ( !empty($containerWidth ) AND $container == "container" ) {
	$containerWidth = 'width:'.$containerWidth.'px;';
} else {
	$containerWidth = "";
}


/* if Top Intro block is active */
if ( $topIntroBlockOption == "enable" ) {
	$topIntroBlockContent = get_field( "twoCTopIntroBlockContent" );
}

/* if bottom Outro Block is active */
if ( $bottomOutroBlockOption == "enable" ) {
	$bottomOutroBlockContent = get_field( "twoCBottomOutroBlockContent" );
}
?>

<?php
/*
*
*All things Left Column
*
*/

/*Font color*/
$leftTextColor = get_field( 'left_two_column_text_color' );


/* Left Column Gutters */
$twoCLeftColumnTopGutter    = get_field( "twoCLeftColumnTopGutter" );
$twoCLeftColumnRightGutter  = get_field( "twoCLeftColumnRightGutter" );
$twoCLeftColumnBottomGutter = get_field( "twoCLeftColumnBottomGutter" );
$twoCLeftColumnLeftGutter   = get_field( "twoCLeftColumnLeftGutter" );

$twoCLeftColumnMainGutterClass = $twoCLeftColumnTopGutter . "px " . $twoCLeftColumnRightGutter . "px " . $twoCLeftColumnBottomGutter . "px " . $twoCLeftColumnLeftGutter . "px;";

/* Left Column Content */
$leftColumnContentType      = get_field( 'twoCLeftColumnContentType' );
$leftColumnContentAlignment = get_field( 'leftcolumncontentalignment' );

/*Custom HTML*/
$leftColumnContent = get_field( "twoCLeftColumnBlockContent" );

/*Image with title*/
$leftImage                 = get_field( 'left_col_img' );
$leftTitle                 = get_field( 'left_col_title' );
$leftContentPosition       = get_field( 'content_position_two_column_left' );
$leftSubTitle              = get_field( 'subtitle_two_column_left' );
$leftColumnTitleBackground = get_field( 'left_title_background_color' );

/*Title and CTA*/
$leftInfoTitle             = get_field( 'left_info_title' );
$leftInfoCopy              = get_field( 'left_info_text' );
$leftInfoCTA               = get_field( 'left_info_button' );
$leftInfoLink              = get_field( 'left_info_link' );
$leftContentContainerWidth = get_field( 'left_content_container_width' );

/*Video & Title*/
$leftVideo      = get_field( 'left_content_iframe' );
$leftVideoTitle = get_field( 'left_video_title' );


/*Left Column Background Type*/
$leftColumnBackgroundType  = get_field( 'twoCLeftColumnBGType' );
$leftColumnImage           = get_field( 'twoCLeftColumnBGImage' );
$leftColumnSolidBG         = get_field( 'twoCLeftColumnSolidBG' );
$leftColumnImageHeight     = get_field( 'left_background_image_height' );
$leftOverlayType           = get_field( 'overlay_type_left' );
$leftOverlayTexture        = get_field( 'texture_overlay_left' );
$leftGradient              = get_field( 'gradient_direction_left' );
$leftGradientColor1        = get_field( 'gradient_color_one_left' );
$leftGradientColor1Opacity = get_field( 'gradient_color_one_opacity_left' );
$leftGradientColor2        = get_field( 'gradient_color_two_left' );
$leftGradientColor2Opacity = get_field( 'gradient_color_two_opacity_left' );
$leftColumnOverlay         = get_field( 'left_column_overlay' );
$leftColmunOverlayOpacity  = get_field( 'left_column_overlay_opacity' );
/*
*
*End Left Columns Left Column
*
*/

/*
*
*All things Right Column
*
*/

/*Font color*/
$rightTextColor = get_field( 'right_two_column_text_color' );

/* Right Column Gutters */
$twoCRightColumnTopGutter    = get_field( "twoCRightColumnTopGutter" );
$twoCRightColumnRightGutter  = get_field( "twoCRightColumnRightGutter" );
$twoCRightColumnBottomGutter = get_field( "twoCRightColumnBottomGutter" );
$twoCRightColumnLeftGutter   = get_field( "twoCRightColumnLeftGutter" );

$twoCRightColumnMainGutterClass = $twoCRightColumnTopGutter . "px " . $twoCRightColumnRightGutter . "px " . $twoCRightColumnBottomGutter . "px " . $twoCRightColumnLeftGutter . "px;";


/* Right Column Content */
$rightColumnContentType      = get_field( 'twoCRightColumnContentType' );
$rightColumnContentAlignment = get_field( 'rightcolumncontentalignment' );


/*Custom HTML*/
$rightColumnContent = get_field( "twoCRightColumnBlockContent" );

/*Image with title*/
$rightImage                 = get_field( 'right_col_img' );
$rightTitle                 = get_field( 'right_col_title' );
$rightContentPosition       = get_field( 'content_position_two_column_right' );
$rightSubTitle              = get_field( 'subtitle_two_column_right' );
$rightColumnTitleBackground = get_field( 'right_title_background_color' );


/*Title and CTA*/
$rightInfoTitle             = get_field( 'right_info_title' );
$rightInfoCopy              = get_field( 'right_info_text' );
$rightInfoCTA               = get_field( 'right_info_button' );
$rightInfoLink              = get_field( 'right_info_link' );
$rightContentContainerWidth = get_field( 'right_content_container_width' );


/*Video & Title*/
$rightVideo      = get_field( 'right_content_iframe' );
$rightVideoTitle = get_field( 'right_video_title' );


/* Right Column Background Type */
$rightColumnBackgroundType  = get_field( 'twoCRightColumnBGType' );
$rightColumnSolidBG         = get_field( 'twoCRightColumnSolidBG' );
$rightColumnImage           = get_field( 'twoCRightColumnBGImage' );
$rightColumnImageHeight     = get_field( 'right_background_image_height' );
$rightOverlayType           = get_field( 'overlay_type_right' );
$rightGradient              = get_field( 'gradient_direction_right' );
$rightGradientColor1        = get_field( 'gradient_color_one_right' );
$rightGradientColor1Opacity = get_field( 'gradient_color_one_opacity' );
$rightGradientColor2        = get_field( 'gradient_color_two_right' );
$rightGradientColor2Opacity = get_field( 'gradient_color_two_opacity' );
$rightColumnOverlay         = get_field( 'right_column_overlay' );
$rightColmunOverlayOpacity  = get_field( 'right_column_overlay_opacity' );
$rightOverlayTexture        = get_field( 'texture_overlay_right' );


/*
*
*End Right Column
*
*/

?>

<!-- Global template styles -->
<style>

	.ID<?php echo $blockID; ?>rightColumn,
	.ID<?php echo $blockID; ?>leftColumn {
		display: flex;
        align-items:center;
	}
    .ID<?php echo $blockID; ?>rightColumn h2,
	.ID<?php echo $blockID; ?>leftColumn h2 {
		text-align:left;
        color:#fff;
        padding-top:20%;
	}
    .ID<?php echo $blockID; ?>rightColumn p,
	.ID<?php echo $blockID; ?>leftColumn p {
		text-align:left;
        color:#fff;
	}

	.outro-two-column,
	.intro-two-column {
		display: block;
	}

	.two-column<?php echo $blockID; ?> .row {
		display: flex;
		flex-wrap: wrap;
	}

	.twoColumnSectionID<?php echo $blockID; ?> {
		padding-top: <?php the_field('top_container_gutter'); ?>px;
		padding-bottom: <?php the_field('bottom_container_gutter') ?>px;
	}

	.two-column-shape-top<?php echo $blockID; ?> svg {
		fill: <?php the_field('background_color_two_column_container'); ?>;
	}

	.two-column-shape-bottom<?php echo $blockID; ?> svg {
		fill: #ffffff;

	}


</style>

<?php switch ( $shapeTypeTop ) {
	case 'ellipse':
		$shapeTop = '<svg class="shape" preserveAspectRatio="none" height="100%" width="100%" data-name="shape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1691.92 103.49"><defs><style>.shape{height: ' . $shapeHeightTop . 'px;}</style></defs><title>semi-circle</title><path class="d\" d="M129.13,258.1H1821s-331.48-103.49-846-103.49S129.13,258.1,129.13,258.1Z" transform="translate(-129.13 -154.6)"></path></svg>';

		break;

	case 'slant':
		$shapeTop = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 1920 148.3" style="enable-background:new 0 0 1920 148.3;" xml:space="preserve">
	<style type="text/css">
	.st0{display:none;}
	.st1{display:inline;}
	</style>
	<g id="Layer_1" class="st0">
	<ellipse class="st1" cx="964.5" cy="149" rx="985.4" ry="101.2"/>
	</g>
	<g id="Layer_2">

		<rect x="-17.8" y="71.9" transform="matrix(-0.9972 7.513312e-002 -7.513312e-002 -0.9972 2011.8533 259.8076)" class="st2" width="2037.6" height="191.8"/>
	</g>
	</svg>
	';
		break;

	case 'wave':
		$shapeTop = '<svg class="shape" data-name="shape" preserveAspectRatio="none" height="100%" width="100%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 30.62"><defs><style>.shape {height: ' . $shapeHeightTop . 'px;}</style></defs><title>wave</title><path class="shape" d="M-126,96.5s97.67-29.58,243.67.08S345,106.67,374,97.33V114H-126V96.5Z" transform="translate(126 -83.38)" /></svg>';
		break;
	default:
		# code...
		break;
}

?>

<?php switch ( $shapeTypeBottom ) {
	case 'ellipse':
		$shapeBottom = '<svg class="shape" preserveAspectRatio="none" height="100%" width="100%" data-name="shape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1691.92 103.49"><defs><style>.shape{height: ' . $shapeHeightTop . 'px;}</style></defs><title>semi-circle</title><path class="d\" d="M129.13,258.1H1821s-331.48-103.49-846-103.49S129.13,258.1,129.13,258.1Z" transform="translate(-129.13 -154.6)"></path></svg>';

		break;

	case 'slant':

		$shapeBottom = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 1920 148.3" style="enable-background:new 0 0 1920 148.3;" xml:space="preserve">
	<style type="text/css">
	.st0{display:none;}
	.st1{display:inline;}
	</style>
	<g id="Layer_1" class="st0">
	<ellipse class="st1" cx="964.5" cy="149" rx="985.4" ry="101.2"/>
	</g>
	<g id="Layer_2">

		<rect x="-17.8" y="71.9" transform="matrix(-0.9972 7.513312e-002 -7.513312e-002 -0.9972 2011.8533 259.8076)" class="st2" width="2037.6" height="191.8"/>
	</g>
	</svg>';

		break;

	case 'wave':
		$shapeBottom = '<svg class="shape" data-name="shape" preserveAspectRatio="none" height="100%" width="100%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 30.62"><defs><style>.shape {height: ' . $shapeHeightTop . 'px;}</style></defs><title>wave</title><path class="shape" d="M-126,96.5s97.67-29.58,243.67.08S345,106.67,374,97.33V114H-126V96.5Z" transform="translate(126 -83.38)" /></svg>';
		break;
	default:
		# code...
		break;
}

?>

<?php switch ( $backgroundContainerType ) {
	case 'color': ?>

		<style>
			.twoColumnSectionID<?php echo $blockID; ?> {
				background-color: <?php the_field('background_color_two_column_container'); ?>;
			}
		</style>

		<?php break;

	case 'image': ?>

		<style>
			.twoColumnSectionID<?php echo $blockID; ?> {
				background: url(<?php the_field('background_image_two_column_container'); ?>);
				background-size: cover;
			}
		</style>

		<?php break;

	default:
		# code...
		break;
} ?>

<div class="id-<?php echo $blockID; ?> ID<?php echo $blockID; ?>">
	<style>
		.ID<?php echo $blockID; ?> {
			position: relative;
		}
	</style>
	<?php $blockEditLink = get_edit_post_link( $blockID );
	if ( current_user_can( 'administrator' ) ) {
		echo '<div id="' . $blockID . 'Edit" class="editBlock">
  											<a href="' . $blockEditLink . '"><img data-toggle="tooltip" data-placement="top" title="Edit 2 Column Block" src="' . get_template_directory_uri() . '/assets/img/editblock.png" /></a></div> ';
	}
	?>
	<script type="text/javascript">
		$('.ID<?php echo $blockID; ?>').hover(
			function () {
				$('#<?php echo $blockID; ?>Edit').addClass("editBlockHover");
			}, function () {
				$('#<?php echo $blockID; ?>Edit').removeClass('editBlockHover');
			}
		);

	</script>



	<?php echo gcb_shapes_top() ?>




	<section class="twoColumnSectionID<?php echo $blockID; ?>">


		<!-- check if Top Intro Block is needed! -->
		<?php if ( $topIntroBlockContent ) { ?>
			<div class="ID<?php echo $blockID; ?> row intro-two-column">
				<div class="col-md-12"><?php echo $topIntroBlockContent; ?></div>
			</div>
		<?php } ?>

		<?php if ( $topIntroBGColor ) { ?>

			<style>
				.ID<?php echo $blockID; ?>.row.intro-two-column {
					background-color: <?php echo $topIntroBGColor; ?>;
				}

			</style>

		<?php } ?>

		<?php if ( $topIntroFontColor ) { ?>

			<style>

				.ID<?php echo $blockID; ?>.row.intro-two-column {
					color: <?php echo $topIntroFontColor; ?>
				}

			</style>

		<?php } ?>


		<!-- check how to make the 2 columns -->
		<?php
		switch ( $columnsSize ) {
			case "5050":
				$column1 = "col-xs-12 col-md-12 col-lg-6";
				$column2 = "col-xs-12 col-md-12 col-lg-6";
				break;
			case "7030":
				$column1 = "col-xs-12 col-md-8";
				$column2 = "col-xs-12 col-md-4";
				break;
			case "3070":
				$column2 = "col-xs-12 col-md-8";
				$column1 = "col-xs-12 col-md-4";
				break;
		}
		?>


		<!-- Begin left content alignment-->
		<?php switch ( $leftColumnContentAlignment ) {

			/*solid color*/
			case 'left': ?>

				<style>

					.ID<?php echo $blockID; ?>leftColumn {
                        align-items:center;
						justify-content: flex-start;

					}

				</style>

				<?php break; ?>

			<?php case 'center': ?>

				<style>

					.ID<?php echo $blockID; ?>leftColumn {
                        align-items:center;
						justify-content: center;

					}

				</style>

				<?php break; ?>

			<?php case 'right': ?>

				<style>

					.ID<?php echo $blockID; ?>leftColumn {
                        align-items:center;
						justify-content: flex-end;
						text-align: right;

					}

					@media (max-width: 992px) {
						.ID<?php echo $blockID; ?>leftColumn {
							text-align: initial;
						}
					}

				</style>

				<?php break; ?>

			<?php default:

				?>

				<?php

		}

		?>

		<!-- End left content alignment -->

		<!-- Begin background style left column-->
		<?php switch ( $leftColumnBackgroundType ) {

			/*solid color*/
			case 'solid': ?>

				<style>

					.ID<?php echo $blockID; ?>leftColumn {
						background: <?php echo $leftColumnSolidBG; ?>;
					}

				</style>

				<?php break; ?>

			<?php case 'image': ?>

				<?php if ( $leftColumnImage ) { ?>

					<style>

						.ID<?php echo $blockID; ?>leftColumn {
							background: url(<?php echo $leftColumnImage; ?>);
							background-size: cover;
							background-repeat: no-repeat;
							height: <?php echo $leftColumnImageHeight; ?>px;
							z-index: 1;

						}

					</style>

				<?php } ?>


				<!-- Solid color background overlay -->
				<?php if ( $leftOverlayType == 'color' ) { ?>

					<?php if ( $leftColumnOverlay ) { ?>

						<style>
							.ID<?php echo $blockID; ?>leftColumn:before {
								content: '';
								position: absolute;
								top: 0;
								right: 0;
								bottom: 0;
								left: 0;
								z-index: -1;
								background-color: <?php echo $leftColumnOverlay; ?>;
								opacity: <?php echo $leftColmunOverlayOpacity; ?>;
							}

						</style>

					<?php } ?>


				<?php } ?>

				<!-- Texture background overlay -->
				<?php if ( $leftOverlayType == 'texture' ) { ?>

					<!-- Texture and overlay -->
					<?php if ( $leftOverlayTexture && $leftColumnOverlay ) { ?>

						<style>

							.ID<?php echo $blockID; ?>leftPanel:before {
								content: '';
								position: absolute;
								top: 0;
								right: 0;
								bottom: 0;
								left: 0;
								z-index: -1;
								background: <?php echo changeHex($leftColumnOverlay, $leftColmunOverlayOpacity)?> url(<?php echo $leftOverlayTexture; ?>);
								background-repeat: repeat;
								height: 100%;
							}

						</style>

					<?php } ?>

					<!-- Just texture -->
					<?php if ( $leftOverlayTexture && empty( $leftColumnOverlay ) ) { ?>
						<style>
							.ID<?php echo $blockID; ?>leftPanel:before {
								content: '';
								position: absolute;
								top: 0;
								right: 0;
								bottom: 0;
								left: 0;
								z-index: -1;
								background: url(<?php echo $leftOverlayTexture; ?>);
								background-repeat: repeat;
								height: 100%;
							}

						</style>

					<?php } ?>

				<?php } ?>

				<!-- Gradient background overlay -->
				<?php if ( $leftOverlayType == 'gradient' ) {

					if ( $leftGradient == 'vertical' ) { ?>


						<style>
							.ID<?php echo $blockID; ?>leftColumn:before {
								content: '';
								position: absolute;
								top: 0;
								right: 0;
								bottom: 0;
								left: 0;
								z-index: -1;
								background: -webkit-linear-gradient(<?php echo changeHex($leftGradientColor1, $leftGradientColor1Opacity)?>, <?php echo changeHex($leftGradientColor2, $leftGradientColor2Opacity)?>);
								background: -o-linear-gradient(<?php echo changeHex($leftGradientColor1, $leftGradientColor1Opacity)?>, <?php echo changeHex($leftGradientColor2, $leftGradientColor2Opacity)?>);
								background: -moz-linear-gradient(<?php echo changeHex($leftGradientColor1, $leftGradientColor1Opacity)?>, <?php echo changeHex($leftGradientColor2, $leftGradientColor2Opacity)?>);
								background: linear-gradient(<?php echo changeHex($leftGradientColor1, $leftGradientColor1Opacity)?>, <?php echo changeHex($leftGradientColor2, $leftGradientColor2Opacity)?>)
							}

						</style>

					<?php } ?>

					<?php if ( $leftGradient == 'horizontal' ) { ?>

						<style>
							.ID<?php echo $blockID; ?>leftColumn:before {
								content: '';
								position: absolute;
								top: 0;
								right: 0;
								bottom: 0;
								left: 0;
								z-index: -1;
								background: -webkit-linear-gradient(left, <?php echo changeHex($leftGradientColor1, $leftGradientColor1Opacity)?>, <?php echo changeHex($leftGradientColor2, $leftGradientColor2Opacity)?>);
								background: -o-linear-gradient(left, <?php echo changeHex($leftGradientColor1, $leftGradientColor1Opacity)?>, <?php echo changeHex($leftGradientColor2, $leftGradientColor2Opacity)?>);
								background: -moz-linear-gradient(left, <?php echo changeHex($leftGradientColor1, $leftGradientColor1Opacity)?>, <?php echo changeHex($leftGradientColor2, $leftGradientColor2Opacity)?>);
								background: linear-gradient(to left, <?php echo changeHex($leftGradientColor1, $leftGradientColor1Opacity)?>, <?php echo changeHex($leftGradientColor2, $leftGradientColor2Opacity)?>)
							}

						</style>

					<?php } ?>

					<?php if ( $leftGradient == 'diagonal' ) { ?>

						<style>
							.ID<?php echo $blockID; ?>leftColumn:before {
								content: '';
								position: absolute;
								top: 0;
								right: 0;
								bottom: 0;
								left: 0;
								z-index: -1;
								background: -webkit-linear-gradient(left top, <?php echo changeHex($leftGradientColor1, $leftGradientColor1Opacity)?>, <?php echo changeHex($leftGradientColor2, $leftGradientColor2Opacity)?>);
								background: -o-linear-gradient(bottom left, <?php echo changeHex($leftGradientColor1, $leftGradientColor1Opacity)?>, <?php echo changeHex($leftGradientColor2, $leftGradientColor2Opacity)?>);
								background: -moz-linear-gradient(bottom left, <?php echo changeHex($leftGradientColor1, $leftGradientColor1Opacity)?>, <?php echo changeHex($leftGradientColor2, $leftGradientColor2Opacity)?>);
								background: linear-gradient(to bottom left, <?php echo changeHex($leftGradientColor1, $leftGradientColor1Opacity)?>, <?php echo changeHex($leftGradientColor2, $leftGradientColor2Opacity)?>)
							}

						</style>

					<?php } ?>

				<?php } ?>


				<?php break; ?>

			<?php default:

				?>

				<?php

		}

		?>

		<!-- end background style left column-->


		<!-- Begin right content alignment-->
		<?php switch ( $rightColumnContentAlignment ) {

			/*solid color*/
			case 'left': ?>

				<style>

					.ID<?php echo $blockID; ?>rightColumn {
                        align-items:center;
						justify-content: flex-start;

					}

				</style>

				<?php break; ?>

			<?php case 'center': ?>

				<style>

					.ID<?php echo $blockID; ?>rightColumn {
                        align-items:center;
						justify-content: center;

					}

				</style>

				<?php break; ?>

			<?php case 'right': ?>


				<style>

					.ID<?php echo $blockID; ?>rightColumn {
                        align-items:center;
						justify-content: flex-end;
						text-align: right;

					}

					@media (max-width: 992px) {
						.ID<?php echo $blockID; ?>rightColumn  {
							text-align: initial;
						}
					}


				</style>


				<?php break; ?>

			<?php default:

				?>

				<?php

		}

		?>

		<!-- Begin background style right column-->

		<?php switch ( $rightColumnBackgroundType ) {

			/*solid color*/
			case 'solid': ?>

				<style>

					.ID<?php echo $blockID; ?>rightColumn {
						background: <?php echo $rightColumnSolidBG; ?>;
					}

				</style>

				<?php break; ?>

			<?php case 'image': ?>

				<?php if ( $rightColumnImage ) { ?>

					<style>

						.ID<?php echo $blockID; ?>rightColumn {
							background: url(<?php echo $rightColumnImage; ?>);
							background-size: cover;
							background-repeat: no-repeat;
							height: <?php echo $rightColumnImageHeight; ?>px;
							z-index: 1;
						}

					</style>

				<?php } ?>

				<!-- Solid color background overlay -->
				<?php if ( $rightOverlayType == 'color' ) {

					/*Color is set*/
					if ( $rightColumnOverlay ) { ?>

						<style>
							.ID<?php echo $blockID; ?>rightColumn:before {
								content: '';
								position: absolute;
								top: 0;
								right: 0;
								bottom: 0;
								left: 0;
								z-index: -1;
								background-color: <?php echo $rightColumnOverlay; ?>;
								opacity: <?php echo $rightColmunOverlayOpacity; ?>;
							}

						</style>

					<?php } ?>

				<?php } ?>

				<!-- Texture background overlay -->
				<?php if ( $rightOverlayType == 'texture' ) { ?>

					<!-- Texture and overlay -->
					<?php if ( $rightOverlayTexture && $rightColumnOverlay ) { ?>
						<style>
							.ID<?php echo $blockID; ?>rightPanel:before {
								content: '';
								position: absolute;
								top: 0;
								right: 0;
								bottom: 0;
								left: 0;
								z-index: -1;
								background: <?php echo changeHex($rightColumnOverlay, $rightColmunOverlayOpacity)?> url(<?php echo $rightOverlayTexture; ?>);
								background-repeat: repeat;
								height: 100%;
							}

						</style>

					<?php } ?>

					<!-- Just texture -->
					<?php if ( $rightOverlayTexture && empty( $rightColumnOverlay ) ) { ?>
						<style>
							.ID<?php echo $blockID; ?>rightPanel:before {
								content: '';
								position: absolute;
								top: 0;
								right: 0;
								bottom: 0;
								left: 0;
								z-index: -1;
								background: url(<?php echo $rightOverlayTexture; ?>);
								background-repeat: repeat;
								height: 100%;
							}

						</style>

					<?php } ?>

				<?php } ?>

				<!-- Gradient background overlay -->
				<?php if ( $rightOverlayType == 'gradient' ) {

					if ( $rightGradient == 'vertical' ) { ?>


						<style>
							.ID<?php echo $blockID; ?>rightColumn:before {
								content: '';
								position: absolute;
								top: 0;
								right: 0;
								bottom: 0;
								left: 0;
								z-index: -1;
								background: -webkit-linear-gradient(<?php echo changeHex($rightGradientColor1, $rightGradientColor1Opacity)?>, <?php echo changeHex($rightGradientColor2, $rightGradientColor2Opacity)?>);
								background: -o-linear-gradient(<?php echo changeHex($rightGradientColor1, $rightGradientColor1Opacity)?>, <?php echo changeHex($rightGradientColor2, $rightGradientColor2Opacity)?>);
								background: -moz-linear-gradient(<?php echo changeHex($rightGradientColor1, $rightGradientColor1Opacity)?>, <?php echo changeHex($rightGradientColor2, $rightGradientColor2Opacity)?>);
								background: linear-gradient(<?php echo changeHex($rightGradientColor1, $rightGradientColor1Opacity)?>, <?php echo changeHex($rightGradientColor2, $rightGradientColor2Opacity)?>)
							}

						</style>

					<?php } ?>

					<?php if ( $rightGradient == 'horizontal' ) { ?>

						<style>
							.ID<?php echo $blockID; ?>rightColumn:before {
								content: '';
								position: absolute;
								top: 0;
								right: 0;
								bottom: 0;
								left: 0;
								z-index: -1;
								background: -webkit-linear-gradient(left, <?php echo changeHex($rightGradientColor1, $rightGradientColor1Opacity)?>, <?php echo changeHex($rightGradientColor2, $rightGradientColor2Opacity)?>);
								background: -o-linear-gradient(right, <?php echo changeHex($rightGradientColor1, $rightGradientColor1Opacity)?>, <?php echo changeHex($rightGradientColor2, $rightGradientColor2Opacity)?>);
								background: -moz-linear-gradient(right, <?php echo changeHex($rightGradientColor1, $rightGradientColor1Opacity)?>, <?php echo changeHex($rightGradientColor2, $rightGradientColor2Opacity)?>);
								background: linear-gradient(to right, <?php echo changeHex($rightGradientColor1, $rightGradientColor1Opacity)?>, <?php echo changeHex($rightGradientColor2, $rightGradientColor2Opacity)?>)
							}

						</style>

					<?php } ?>

					<?php if ( $rightGradient == 'diagonal' ) { ?>

						<style>
							.ID<?php echo $blockID; ?>rightColumn:before {
								content: '';
								position: absolute;
								top: 0;
								right: 0;
								bottom: 0;
								left: 0;
								z-index: -1;
								background: -webkit-linear-gradient(left top, <?php echo changeHex($rightGradientColor1, $rightGradientColor1Opacity)?>, <?php echo changeHex($rightGradientColor2, $rightGradientColor2Opacity)?>);
								background: -o-linear-gradient(bottom right, <?php echo changeHex($rightGradientColor1, $rightGradientColor1Opacity)?>, <?php echo changeHex($rightGradientColor2, $rightGradientColor2Opacity)?>);
								background: -moz-linear-gradient(bottom right, <?php echo changeHex($rightGradientColor1, $rightGradientColor1Opacity)?>, <?php echo changeHex($rightGradientColor2, $rightGradientColor2Opacity)?>);
								background: linear-gradient(to bottom right, <?php echo changeHex($rightGradientColor1, $rightGradientColor1Opacity)?>, <?php echo changeHex($rightGradientColor2, $rightGradientColor2Opacity)?>)
							}

						</style>

					<?php } ?>

				<?php } ?>

				<?php break; ?>

			<?php default: ?>

			<?php } ?>

		<!-- end background style right column-->


		<!-- Begin padding for the columns -->
		<style>
			.ID<?php echo $blockID; ?>leftPanel {
				padding: <?php echo $twoCLeftColumnMainGutterClass; ?>
			}

			.ID<?php echo $blockID; ?>rightPanel {
				padding: <?php echo $twoCRightColumnMainGutterClass; ?>
			}

			@media (max-width: 414px) {
				.ID<?php echo $blockID; ?>rightPanel,
				.ID<?php echo $blockID; ?>leftPanel {
					padding: 0px;
					width: 100%;
				}
			}
		</style>

		<!-- End padding for the columns -->

		<!-- use container from options -->
		<div class="<?php echo $container; ?> ID<?php echo $blockID; ?>" style="<?php echo $containerWidth ?>">

			<!-- Begin left and right content -->

			<div class="two-column<?php echo $blockID; ?>">

				<div class="row">

					<!-- Left content here -->
					<div class="<?php echo $column1; ?> ID<?php echo $blockID; ?>leftColumn pt-2">
						<div class="ID<?php echo $blockID; ?>leftPanel">

							<?php switch ( $leftColumnContentType ) {

								/*custom html*/
								case 'custom':

									echo $leftColumnContent;

									break;

								/*Image with title option*/
								case 'Image': ?>

									<style>

										.ID<?php echo $blockID; ?>leftColumn p,
										.ID<?php echo $blockID; ?>leftColumn h2 {
											margin-bottom: initial;
										}

										<?php if($leftColumnTitleBackground) { ?>
										.ID<?php echo $blockID; ?>leftColumn h2 {
											background-color: <?php echo $leftColumnTitleBackground; ?>;
											color: #ffffff;
											margin: initial;
											max-width: initial;
										}

										<?php } ?>

										.ID<?php echo $blockID; ?>leftPanel {
											display: flex;
											flex-direction: column;
											justify-content: center;
											align-items: center;
										}


									</style>

									<!-- Content position -->

									<?php if ( $leftContentPosition == 'below' ) { ?>

										<img src="<?php echo $leftImage; ?>">

										<?php if ( $leftTitle ): ?><h2
											class="text-xs-center pt-1"><?php echo $leftTitle; ?></h2><?php endif; ?>

										<?php if ( $leftSubTitle ): ?><p
											class="pt-1 pb-2"><?php echo $leftSubTitle; ?></p><?php endif; ?>

									<?php } else { ?>


										<?php if ( $leftTitle ): ?><h2
											class="text-xs-center pt-1"><?php echo $leftTitle; ?></h2><?php endif; ?>

										<?php if ( $leftSubTitle ): ?><p
											class="pt-1 pb-2"><?php echo $leftSubTitle; ?></p><?php endif; ?>

										<img src="<?php echo $leftImage; ?>">

									<?php } ?>

									<?php break;

								/*Title, CTA, and copy content option*/
								case 'info': ?>
									<!-- container width -->
									<?php if ( $leftContentContainerWidth ) { ?>

										<style>
                                            .ID<?php echo $blockID; ?>leftPanel p {
                                                text-align:left;
                                                color:#fff;
                                            }
											@media (min-width: 768px) {
												.ID<?php echo $blockID; ?>leftPanel {
													max-width: <?php echo $leftContentContainerWidth; ?>px;
													margin: auto;
												}
											}

										</style>

									<?php } ?>

									<?php if($leftInfoTitle) { ?><h2><?php echo $leftInfoTitle; ?></h2><?php } ?>
									<?php if($leftInfoCopy) { ?><p><?php echo $leftInfoCopy; ?></p><?php } ?>

									<?php if ( $leftInfoLink ) { ?>

										<a class="btn btn-danger"
										   href="<?php echo $leftInfoLink; ?>"><?php echo $leftInfoCTA; ?></a>

									<?php } ?>

									<?php break; ?>

									<!-- Video with title content option -->
								<?php case 'video': ?>

									<style>

										.ID<?php echo $blockID; ?>leftPanel {
											height: 100%;
											width: 100%;
											text-align: center;
										}

										.ID<?php echo $blockID; ?>leftPanel p {
											height: 100%;
										}


									</style>

									<!-- if there is a title for the video -->
									<?php if ( $leftVideoTitle ) { ?>

										<h2><?php echo $leftVideoTitle ?></h2>

									<?php } ?>

									<?php echo $leftVideo; ?>

									<?php break; ?>

								<?php case 'accordion': ?>

									<style>

										.ID<?php echo $blockID; ?>leftPanel .card-header {
											padding: 0em;
										}

										.ID<?php echo $blockID; ?>leftPanel .card-header a {
											display: block;
											padding: 0.75rem 1.25rem;
										}


										.ID<?php echo $blockID; ?>leftPanel .card-header a:after {
											content: '-';
											float: right;
										}

										.ID<?php echo $blockID; ?>leftPanel .card-header .collapsed:after {
											content: '+';
											float: right;
										}


									</style>

									<?php the_field('left_accordion_top_intro'); ?>

									<?php

									// check if the repeater field has rows of data
									if( have_rows('two_column_accordion') ): ?>

										<div id="accordion-gcb" class="two-column-accordion" role="tablist" aria-multiselectable="true"> <!-- begin accordion -->

											<?php	// loop through the rows of data

											$count = 0;

											while ( have_rows('two_column_accordion') ) : the_row(); ?>

												<div class="card">

													<div class="card-header" role="tab" id="heading<?php echo $count; ?>">

														<h5 class="mb-0">

															<a class="collapsed" data-toggle="collapse" data-parent="#accordion-gcb" href="#collapse<?php echo $count; ?>" aria-expanded="true" aria-controls="collapse<?php echo $count; ?>">

																<?php the_sub_field('two_column_left_accordion_title'); ?>

															</a>

														</h5>

													</div>

													<div id="collapse<?php echo $count; ?>" class="collapse show" role="tabpanel" aria-labelledby="heading<?php echo $count; ?>">

														<div class="card-block">

															<?php the_sub_field('two_column_left_accordion_info'); ?>

														</div>

													</div>

												</div> <!-- end card -->

												<?php $count++; ?>

											<?php endwhile; ?>

										</div> <!-- end accordion -->

									<?php endif; ?>

									<!-- Bottom accordion content -->

									<?php the_field('left_accordion_bottom_outro'); ?>

									<?php break; ?>

								<?php default:
									# code...
									break;
							} ?>


						</div>

					</div>

					<!-- End left content -->

					<!-- Right content here -->
					<div class="<?php echo $column2; ?> ID<?php echo $blockID; ?>rightColumn pt-2">

						<div class="ID<?php echo $blockID; ?>rightPanel">

							<?php switch ( $rightColumnContentType ) {

								/*custom html*/
								case 'custom':

									echo $rightColumnContent;

									break;

								/*Image with title*/
								case 'Image': ?>

									<style>

										.ID<?php echo $blockID; ?>rightColumn p,
										.ID<?php echo $blockID; ?>rightColumn h2 {
											margin-bottom: initial;
										}

										<?php if($rightColumnTitleBackground) { ?>
										.ID<?php echo $blockID; ?>rightColumn h2 {
											background-color: <?php echo $rightColumnTitleBackground; ?>;
											color: #ffffff;
											margin: initial;
											max-width: initial;
											padding: 15px 0;
										}

										<?php } ?>

										.ID<?php echo $blockID; ?>rightPanel {
											display: flex;
											flex-direction: column;
											justify-content: center;
											align-items: center;
										}

									</style>

									<!-- Content position -->

									<?php if ( $rightContentPosition == 'below' ) { ?>

										<img src="<?php echo $rightImage; ?>">

										<?php if ( $rightTitle ): ?><h2
											class="text-xs-center pt-1"><?php echo $rightTitle; ?></h2><?php endif; ?>

										<?php if ( $rightSubTitle ): ?><p
											class="pt-1 pb-2"><?php echo $rightSubTitle; ?></p><?php endif; ?>

									<?php } else { ?>


										<?php if ( $rightTitle ): ?><h2
											class="text-xs-center pt-1"><?php echo $rightTitle; ?></h2><?php endif; ?>

										<?php if ( $rightSubTitle ): ?><p
											class="pt-1 pb-2"><?php echo $rightSubTitle; ?></p><?php endif; ?>

										<img src="<?php echo $rightImage; ?>">

									<?php } ?>


									<?php break;

								case 'info': ?>

									<!-- container width -->
									<?php if ( $rightContentContainerWidth ) { ?>

										<style>

											@media (min-width: 768px) {
												.ID<?php echo $blockID; ?>rightPanel {
													max-width: <?php echo $rightContentContainerWidth; ?>px;
													margin: auto;
												}
											}

										</style>

									<?php } ?>

									<?php if($rightInfoTitle) { ?><h2><?php echo $rightInfoTitle; ?></h2><?php } ?>
									<?php if($rightInfoCopy) { ?><p><?php echo $rightInfoCopy; ?></p><?php } ?>

									<?php if ( $rightInfoLink ) { ?>

										<a class="btn btn-danger"
										   href="<?php echo $rightInfoLink; ?>"><?php echo $rightInfoCTA; ?></a>

									<?php } ?>

									<?php break;

								case 'video': ?>

									<style>

										.ID<?php echo $blockID; ?>rightPanel {
											height: 100%;
											width: 100%;
											text-align: center;
										}

										.ID<?php echo $blockID; ?>rightPanel p {
											height: 100%;
										}

									</style>

									<!-- if there is a title for the video -->
									<?php if ( $rightVideoTitle ) { ?>

										<h2><?php echo $rightVideoTitle ?></h2>

									<?php } ?>

									<?php echo $rightVideo ?>

								<?php case 'accordion': ?>

									<style>

										.ID<?php echo $blockID; ?>rightPanel .card-header {
											padding: 0em;
										}

										.ID<?php echo $blockID; ?>rightPanel .card-header a {
											display: block;
											padding: 0.75rem 1.25rem;
										}


										.ID<?php echo $blockID; ?>rightPanel .card-header a:after {
											content: '-';
											float: right;
										}

										.ID<?php echo $blockID; ?>rightPanel .card-header .collapsed:after {
											content: '+';
											float: right;
										}


									</style>

									<?php the_field('right_accordion_top_intro'); ?>

									<?php

									// check if the repeater field has rows of data
									if( have_rows('two_column_accordion_right') ): ?>

										<div id="accordion-gcb" class="two-column-accordion" role="tablist" aria-multiselectable="true"> <!-- begin accordion -->

											<?php	// loop through the rows of data

											$count = 10;

											while ( have_rows('two_column_accordion_right') ) : the_row(); ?>

												<div class="card">

													<div class="card-header" role="tab" id="heading<?php echo $count; ?>">

														<h5 class="mb-0">

															<a class="collapsed" data-toggle="collapse" data-parent="#accordion-gcb" href="#collapse<?php echo $count; ?>" aria-expanded="true" aria-controls="collapse<?php echo $count; ?>">

																<?php the_sub_field('two_column_right_accordion_title'); ?>

															</a>

														</h5>

													</div>

													<div id="collapse<?php echo $count; ?>" class="collapse show" role="tabpanel" aria-labelledby="heading<?php echo $count; ?>">

														<div class="card-block">

															<?php the_sub_field('two_column_right_accordion_info'); ?>

														</div>

													</div>

												</div> <!-- end card -->

												<?php $count++; ?>

											<?php endwhile; ?>

										</div> <!-- end accordion -->

									<?php endif; ?>

									<!-- Bottom accordion content -->

									<?php the_field('right_accordion_bottom_outro'); ?>

									<?php break; ?>

								<?php default:
									# code...
									break;
							} ?>


						</div>
					</div>

				</div>

			</div> <!-- End content container -->

		</div> <!-- left/right container -->

		<!-- check if Bottom Outro Block is needed! -->
		<?php if ( $bottomOutroBlockContent ) { ?>
			<div class="ID<?php echo $blockID; ?> row outro-two-column">
				<div class="col-md-12"><?php echo $bottomOutroBlockContent; ?></div>
			</div>
		<?php } ?>





	</section>


	<?php if ( $bottomOutroBGColor ) { ?>

		<style>
			.ID<?php echo $blockID; ?>.row.outro-two-column {
				background-color: <?php echo $bottomOutroBGColor; ?>;
				padding: 3.5rem 1rem 2.5rem 1rem;

			}

		</style>

	<?php } ?>

	<?php if ( $bottomOutroFontColor ) { ?>

		<style>

			.ID<?php echo $blockID; ?>.row.outro-two-column {
				color: <?php echo $bottomOutroFontColor; ?>
			}

		</style>

	<?php } ?>


	<?php echo gcb_shapes_bottom() ?>



</div>
