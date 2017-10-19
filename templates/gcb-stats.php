<?php
/**
 * Template for Stats Content Block
 *
 */
$blockID       = get_the_ID();
$blockAdminURL = get_edit_post_link( $blockID );
$gcbClass      = str_replace( ' ', '-', strtolower( get_the_title() ) );
$main_title    = get_field( 'stats_main_title' );
$sub_title     = get_field( 'stats_main_sub_title' );
$stats_background = get_field('stats_bg_color');


?>

<style>
	.stats-row.row {
		display: flex;
		justify-content: space-around;
		text-align: center;
		flex-wrap: wrap;
	}

	.ID<?php echo $blockID; ?> {
		position: relative;
	}



</style>

<!-- if background color is set -->

<?php if ($stats_background) { ?>

	<style>

		.main-stats {
			background-color: <?php echo $stats_background; ?>;
			color: #ffffff;
		}

	</style>

<?php } ?>

<?php gcb_shapes_top(); ?>

<section class="main-stats"> <!-- main section -->

<div class="gcb container <?php echo $gcbClass; ?> ID<?php echo $blockID; ?>">
	<!-- begin stats container -->

	<?php if ( $main_title ) { ?>

			<h2 class="text-xs-center pt-1"><?php echo $main_title; ?></h2>

		<?php } ?>

		<?php if ( $sub_title ) { ?>

			<p class="text-xs-center"><?php echo $sub_title; ?></p>

		<?php } ?>

	<?php $blockEditLink = get_edit_post_link( $blockID );
	if ( current_user_can( 'administrator' ) ) {
		echo '<div id="' . $blockID . 'Edit" class="editBlock">
		<a href="' . $blockEditLink . '"><img data-toggle="tooltip" data-placement="top" title="Edit Default Block" src="' . get_template_directory_uri() . '/assets/img/editblock.png" /></a></div> ';
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

	<div class="stats-row row" id="stats"> <!-- begin row -->

		<?php

		// check if the repeater field has rows of data
		if ( have_rows( 'stats_items' ) ):

			// loop through the rows of data
			while ( have_rows( 'stats_items' ) ) : the_row(); ?>

				<div class="stats-item col-xs-12 col-md-6 col-lg-3">

					<img src="<?php the_sub_field( 'stats_item_icon' ); ?>">

					<div class="stats-content">

						<h2 class="count"><?php the_sub_field( 'stats_item_number' ); ?></h2>

						<p><?php the_sub_field( 'stats_item_title' ); ?></p>

					</div>

				</div>

			<?php endwhile; ?>

		<?php else :

			// no rows found

		endif;

		?>

	</div> <!-- end row -->

</div> <!-- end stats container -->

<?php gcb_shapes_bottom(); ?>

</section> <!-- end section -->

<script>
	$(document).ready(function () {
		var waypoint = new Waypoint({
			element: document.getElementById('stats'),
			handler: function (direction) {
				$('.count').each(function () {
					$(this).prop('Counter', 0).animate({
						Counter: $(this).text()
					}, {
						duration: 1000,
						easing: 'swing',
						step: function (now) {
							$(this).text(Math.ceil(now));
						}
					});
				});
			},
			offset: '50%'
		});
	});

	var countAnimation = (function () {

		// Returns a random integer between min (included) and max (excluded)
		// Using Math.round() will give you a non-uniform distribution!
		// https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Math/random
		var _getRandomInt = function (min, max) {
			return Math.floor(Math.random() * (max - min)) + min;
		}

		var _countList = document.querySelectorAll('[data-count]');

		var startCount = function () {
			// https://github.com/toddmotto/foreach
			forEach(_countList, function (value, index) {
				var endValue = _getRandomInt(50, 100);

				// https://github.com/inorganik/countUp.js
				var queueCountAnimation = new countUp(value, 0, endValue, 0, 12);
				queueCountAnimation.start();
			});
		};

		return {
			startCount: startCount
		};

	})();


</script>
