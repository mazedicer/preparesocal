<?php
/* Display Advanced Hero Section */
$AHS = do_shortcode( '[AHS]' );
if ( $AHS == "" ) {
	echo '<div id="noAHS"></div>';
} else {
	echo $AHS;
} ?>

<div class="bodyContent">
	<?php
	$pageID            = get_the_ID();
	$defaultPageTitleQ = get_field( 'defaultPageTitleQ', $pageID );
	/* Check if normal or build by content blocks */
	$defaultTypeofPage = get_field( 'defaultTypeofPage', $pageID );
	/* Page is build by normal Wysiwyg editor */
	if ( $defaultTypeofPage == "normal" ) {

		/* default template advanced custom fields */
		$mainContentBlockOption = get_field( 'mainContentBlockOption', $pageID );
		if ( $mainContentBlockOption == "over" ) {
			$mainContentOverHero  = get_field( 'mainContentOverHero', $pageID );
			$mainContentOverEdges = get_field( 'mainContentOverEdges', $pageID );
			$mainContentBGColor   = get_field( 'mainContentBGColor', $pageID );
			if ( $mainContentBGColor == "" ) {
				$mainContentBGColor = "transparent";
			}

			/* set variable with the css needed to make the main content over the hero */
			$mainContentClass = "container";

			if ( $mainContentOverEdges == "softened" ) {
				$mainContentCSS = "border-radius:15px; background:" . $mainContentBGColor . "; position:relative; z-index:2; display:block; min-height:200px; margin-top: -" . $mainContentOverHero . "vh;";
			} elseif ( $mainContentOverEdges == "round" ) {
				$mainContentCSS = "border-radius:45px; background:" . $mainContentBGColor . "; position:relative; z-index:2; display:block; min-height:200px; margin-top: -" . $mainContentOverHero . "vh;";
			} elseif ( $mainContentOverEdges == 'circle' ) {
				"background:" . $mainContentBGColor . "; position:relative; z-index:2; display:block; min-height:200px; border-top-right-radius: 99999px; border-top-left-radius: 99999px;";
			} else {
				$mainContentCSS = "background:" . $mainContentBGColor . "; position:relative; z-index:2; display:block; min-height:200px; margin-top: -" . $mainContentOverHero . "vh;";
			}

		}
		$defaultContentEditor = get_field( "defaultContentEditor", $pageID ); ?>
		<div class="container normalPage" style="<?php echo $mainContentCSS; ?>">
			<?php
			echo PageBreadcrumbs( $pageID );
			/* display what the wysiwyg editor has */
			echo $defaultContentEditor;
			?>
		</div>
		<?php
	} /* end of page build normal */
	/* Page is build by general content blocks */
	if ( $defaultTypeofPage == "gcbs" ) {

		/* default template advanced custom fields */
		$mainContentBlockOption = get_field( 'mainContentBlockOption' );

		/* check the option for main content block */
		/* Main content is over the Hero */
		if ( $mainContentBlockOption == "over" ) {
			/* if over then check by how much this should a percentage value */
			$mainContentOverHero  = get_field( 'mainContentOverHero' );
			$mainContentOverEdges = get_field( 'mainContentOverEdges' );

			/* set variable with the css needed to make the main content over the hero */
			$mainContentClass = "container";

			if ( $mainContentOverEdges == "softened" ) {
				$mainContentCSS = "border-radius:15px; background:white; position:relative; z-index:2; display:block; min-height:200px; margin-top: -" . $mainContentOverHero . "vh;";
			} elseif ( $mainContentOverEdges == "round" ) {
				$mainContentCSS = "border-radius:45px; background:white; position:relative; z-index:2; display:block; min-height:200px; margin-top: -" . $mainContentOverHero . "vh;";
			} elseif ( $mainContentOverEdges == 'circle' ) {
				"background:white; position:relative; z-index:2; display:block; min-height:200px; border-top-right-radius: 99999px; border-top-left-radius: 99999px;";
			} else {
				$mainContentCSS = "background:white; position:relative; z-index:2; display:block; min-height:200px; margin-top: -" . $mainContentOverHero . "vh;";
			}
		}
		/* Main content is below the Hero */
		if ( $mainContentBlockOption == "below" ) {
			/* if below then create variable with the css to have a healthy margin below the hero */
			if ( $defaultPageTitleQ == 1 ) {
				$mainContentCSS = "background: white; margin-top: 0px;";
			} else {
				$mainContentCSS = "background: white;";
			}
			$mainContentClass = "container-fluid contentBlocks";
		}
		?>
		<!-- set main content and the proper css from the main content block option also fix padding issue with double container divs -->
	<div class="<?php echo $mainContentClass; ?>" style="padding:0 !important; <?php echo $mainContentCSS; ?>">
		<?php echo PageBreadcrumbs( $pageID ); ?>
		<section>
		<div class="mainContentBlock" style="">
		<?php
		/* Display Main Content Block */
		$mainContentBlock = get_field( 'mainContentBlock' );
		if ( $mainContentBlock ) {
			$post = $mainContentBlock;
			setup_postdata( $post );
			/* Main Content Block HTML here */
			//get the template prelude/template-gcbs.php that is where we get what type of content block it is and displays it.
			get_template_part( 'template-gcbs' );
			?>
			</div>
			</section>
			</div>
			<?php
		} /* end of Main Content Block */
		wp_reset_postdata(); //IMPORTANT - reset the $post object so the rest of the page is using the correct ID
		?>
		<!-- Additional Content Blocks -->
		<?php
// check if there is additional content blocks
		if ( have_rows( 'additionalContentBlocks' ) ) {
			// loop through the additional content blocks
			while ( have_rows( 'additionalContentBlocks' ) ) {
				the_row();
				// additional content object
				$additionalCB = get_sub_field( 'additionalContentBlock' );
				$acbMarginTop = get_sub_field( 'acbMarginTop' );
				if ( $acbMarginTop == "" ) {
					$acbMarginTop = "0";
				}
				$acbMarginBottom = get_sub_field( 'acbMarginBottom' );
				if ( $acbMarginBottom == "0" ) {
					$acbMarginBottom = "0";
				}
				$anchorLink    = get_sub_field( 'acbAchorLink' );
				$sectionMargin = "margin-top:" . $acbMarginTop . "px; margin-bottom:" . $acbMarginBottom . "px;";
				if ( $additionalCB ) {
					$post = $additionalCB;
					setup_postdata( $post );
					echo '<section style="' . $sectionMargin . '"><a name=' . $anchorLink . '></a>';
					// display template with content of the general content block
					get_template_part( 'template-gcbs' );
					echo '</section>';
				}
				wp_reset_postdata();
			}
		}
	} /* end page build by general content blocks */
	?>