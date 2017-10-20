<?php
/**
 * Template for Default Content Block
 *
 */
$blockID          = get_the_ID();
$blockAdminURL    = get_edit_post_link( $blockID );
$gcbClass         = str_replace( ' ', '-', strtolower( get_the_title() ) );
$cubeSectionTitle = get_field( 'cube_section_title' );

$container = get_field( 'defaultContainerOption' ); ?>

<div class="ID<?php echo $blockID; ?>" style="position:relative; z-index:1;">
	<?php $blockEditLink = get_edit_post_link( $blockID );
	if ( current_user_can( 'administrator' ) ) {
		echo '<div id="' . $blockID . 'Edit" class="editBlock" style="z-index:10000;">
                      <a href="' . $blockEditLink . '"><img data-toggle="tooltip" data-placement="top" title="Edit Cube Block" src="' . get_template_directory_uri() . '/assets/img/editblock.png" /></a></div> ';
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
	<style>
		.TWLA-services {
			width: 100%;
		}
	</style>
	<?php
	$cubeGridSideBarContent   = get_field( 'cubeGridSideBarContent' );
	$cubeGridSidebarPosition  = get_field( 'cubeGridSidebarPosition' );
	$cubeGridSidebarBGColor   = get_field( 'cubeGridSidebarBGColor' );
	$cubeGridSidebarTextColor = get_field( 'cubeGridSidebarTextColor' );
	$cubeGridMainBG           = get_field( 'cubeGridMainBG' );
	$cubeGridFrontBG          = get_field( 'cubeGridFrontBG' );
	$cubeGridFrontTextColor   = get_field( 'cubeGridFrontTextColor' );
	$cubeGridBackBG           = get_field( 'cubeGridBackBG' );
	$cubeGridBackTextColor    = get_field( 'cubeGridBackTextColor' );

	?>
	<style>


		.service-item-container {
			background-color: <?php echo $cubeGridMainBG; ?> !important;
		}

		.main-cube h2 {
			background: <?php echo $cubeGridSidebarBGColor; ?>;
			font-weight: bold;
		}

		.service-item {
			border-color: <?php echo $cubeGridFrontBG; ?> !important;
		}

		.TWLA-unit-wrap-default {
			background: <?php echo $cubeGridFrontBG; ?> !important;
			color: <?php echo $cubeGridFrontTextColor; ?> !important;
		}

		.TWLA-unit-wrap-hover {
			background: <?php echo $cubeGridBackBG; ?> !important;
			color: <?php echo $cubeGridBackTextColor; ?> !important;
		}

		.cubeSidebar {
			position: relative;
			background: <?php echo $cubeGridSidebarBGColor; ?>;
			color: <?php echo $cubeGridSidebarTextColor; ?>;
			display: flex;
			align-items: center;
			justify-content: center;

		}

		.cubeSidebarContent {
			width: 85%;
		}

		.row-eq-height {
			display: -webkit-box;
			display: -webkit-flex;
			display: -ms-flexbox;
			display: flex;
			flex-wrap: wrap;
		}

		.TWLA-unit-wrap-hover {
			display: flex;
			align-items: center;
			flex-direction: column;
			justify-content: center;
			padding-top: 0;
			padding: 15px;

		}

	</style>
	<div class="main-cube container-fluid">

		<?php if ( $cubeSectionTitle ) { ?>

			<h2 class="text-xs-center pt-1 pb-1 hidden-md-down"><?php echo $cubeSectionTitle; ?></h2>

		<?php } ?>
		<div class="row no-gutters row-eq-height">
			<?php
			if ( $cubeGridSidebarPosition == "left" ) { ?>

				<style>

					@media (max-width: 1200px) {
						.row-eq-height {
							flex-direction: column-reverse;
						}
					}

				</style>

				<div class="col-xs-12 col-md-12 col-lg-12 col-xl-8">
					<?php if ( have_rows( 'cubeGridRows' ) ): ?>
						<?php
						// loop through the rows of data
						while ( have_rows( 'cubeGridRows' ) ) : the_row(); ?>
							<div class="container-fluid"> <!--begin services container-->
								<div class="creative-services row">

									<?php
									$cubeGridCount = count( get_sub_field( 'cubeGrid' ) );
									// check if the repeater field has rows of data
									if ( have_rows( 'cubeGrid' ) ):
									switch ( $cubeGridCount ) {
										case 1:
											$colNum = "col-xs-12 col-md-12 col-lg-12";
											break;
										case 2:
											$colNum = "col-xs-12 col-md-6 col-lg-6";
											break;
										case 3:
											$colNum = "col-xs-12 col-md-4 col-lg-4";
											break;
										case 4:
											$colNum = "col-xs-12 col-md-3 col-lg-3";
											break;
										default:
											$colNum = "col-xs-12 col-md-3 col-lg-3";
											break;

									}
									?>

									<div class="service-item-container TWLA-services"> <!--service container-->

										<?php
										// loop through the rows of data
										while ( have_rows( 'cubeGrid' ) ) : the_row();
											$cubeGridImageAlt = get_sub_field( 'cubeGridImageAlt' );
											$cubeGridImage    = get_sub_field( 'cubeGridImage' );
											$cubeGridImageEx  = get_sub_field( 'cubeGridImageExternal' );
											if ( ! $cubeGridImageEx == null ) {
												$cubeGridImage = $cubeGridImageEx;
											}
											?>

											<div class="service-item text-xs-center <?php echo $colNum; ?> TWLA-unit">

												<div class="TWLA-cube">

													<div class="TWLA-unit-wrap-default">

														<img src="<?php echo $cubeGridImage; ?>"
														     alt="<?php echo $cubeGridImageAlt; ?>">

														<h4 class="text-uppercase"><?php the_sub_field( 'cubeGridTitle' ); ?></h4>
														<span class="TWLA-gradient"></span>
													</div>
													<div class="TWLA-unit-wrap-hover">
														<p><?php the_sub_field( 'cubeGridDescription' ); ?></p>

														<?php
														if ( ! empty( get_sub_field( 'cubeGridLinkLabel' ) ) ){ ?>
														<a class="btn service-button"
														   href="<?php the_sub_field( 'cubeGridURL' ) ?>">
															<?php
															}
															?>

															<?php the_sub_field( 'cubeGridLinkLabel' ); ?>
														</a>

														<span class="TWLA-gradient"></span>
													</div>
												</div>
											</div>


											<?php
										endwhile;

										else :

											// no rows found

										endif; ?>

									</div> <!--end services container-->

								</div> <!--end row-->
							</div> <!--end container-->
							<?php
						endwhile; ?>

						<?php

					else :

						// no rows found

					endif; ?>
				</div>
				<div class="col-md-12 col-lg-12 col-xl-4 cubeSidebar">
					<div class="cubeSidebarContent">
						<h2 class="mobile-title text-xs-center font-weight-bold hidden-lg-up pt-1">Click an icon to
							learn more</h2>

						<?php echo $cubeGridSideBarContent; ?>
					</div>
				</div>
			<?php }
			if ( $cubeGridSidebarPosition == "right" ) { ?>

				<div class="col-md-12 col-lg-4 cubeSidebar">
					<div class="cubeSidebarContent">
						<h2 class="mobile-title text-xs-center font-weight-bold hidden-lg-up pt-1">Click an icon to
							learn more my friend</h2>

						<?php echo $cubeGridSideBarContent; ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-12 col-lg-8">
					<?php if ( have_rows( 'cubeGridRows' ) ): ?>
						<?php
						// loop through the rows of data
						while ( have_rows( 'cubeGridRows' ) ) : the_row(); ?>
							<div class="container-fluid"> <!--begin services container-->
								<div class="creative-services row">
									<?php
									$cubeGridCount = count( get_sub_field( 'cubeGrid' ) );
									// check if the repeater field has rows of data
									if ( have_rows( 'cubeGrid' ) ):
									switch ( $cubeGridCount ) {
										case 1:
											$colNum = "col-xs-12 col-md-12 col-lg-12";
											break;
										case 2:
											$colNum = "col-xs-12 col-md-6 col-lg-6";
											break;
										case 3:
											$colNum = "col-xs-12 col-md-6 col-lg-4";
											break;
										case 4:
											$colNum = "col-xs-12 col-md-3 col-lg-3";
											break;
										default:
											$colNum = "col-xs-12 col-md-3 col-lg-3";
											break;

									}
									?>

									<div class="service-item-container TWLA-services"> <!--service container-->

										<?php
										// loop through the rows of data
										while ( have_rows( 'cubeGrid' ) ) : the_row();
											$cubeGridImageAlt = get_sub_field( 'cubeGridImageAlt' );
											$cubeGridImage    = get_sub_field( 'cubeGridImage' );
											$cubeGridImageEx  = get_sub_field( 'cubeGridImageExternal' );
											if ( ! $cubeGridImageEx == null ) {
												$cubeGridImage = $cubeGridImageEx;
											}
											?>

											<div class="service-item text-xs-center <?php echo $colNum; ?> TWLA-unit">

												<div class="TWLA-cube">

													<div class="TWLA-unit-wrap-default">

														<img src="<?php echo $cubeGridImage; ?>"
														     alt="<?php echo $cubeGridImageAlt; ?>">

														<h4 class="text-uppercase"><?php the_sub_field( 'cubeGridTitle' ); ?></h4>
														<span class="TWLA-gradient"></span>
													</div>
													<div class="TWLA-unit-wrap-hover">
														<p><?php the_sub_field( 'cubeGridDescription' ); ?></p>

														<?php
														if ( ! empty( get_sub_field( 'cubeGridLinkLabel' ) ) ){ ?>
														<a class="btn service-button"
														   href="<?php the_sub_field( 'cubeGridURL' ) ?>">
															<?php
															}
															?>

															<?php the_sub_field( 'cubeGridLinkLabel' ); ?>
														</a>

														<span class="TWLA-gradient"></span>
													</div>
												</div>
											</div>


											<?php
										endwhile;

										else :

											// no rows found

										endif; ?>

									</div> <!--end services container-->

								</div> <!--end row-->
							</div> <!--end container-->
							<?php
						endwhile; ?>

						<?php

					else :

						// no rows found

					endif; ?>
				</div>
			<?php } ?>

		</div>


	</div>
</div><!-- end of main container -->
<script>

	// Cube FX for Services Page - Taken from Mainpath and http://jsbin.com/kebusa/edit?html,css,js,output - May contain unnecessary code

	var ease = {
		line: "linear",
		In: "ease-in",
		Out: "cubic-bezier(0.215, 0.610, 0.355, 1.000)",
		OutCirc: "cubic-bezier(0.075, 0.820, 0.165, 1.000)",
		InOut: "ease-in-out",
		InOutBack: "cubic-bezier(0.680, -0.550, 0.265, 1.550);"
	}

	function ianIt(selector, css) {
		var _css = css;
		var selectorArr = [];

		if ((selector != null) && (selector.length > 0) && (typeof selector !== 'string')) selectorArr = selector;
		else selectorArr.push(selector);

		for (var i = 0; i < selectorArr.length; i++)
			$(selectorArr[i]).css(_css);
	}

	var anItQueue = [], anItQueueSelectors = [];
	var QueueIsWork = false;
	function _anIt(selector, css, time, delay, easing, _callback) {
		anItQueue.push({
			selector: selector,
			css: css,
			time: time,
			delay: delay,
			easing: easing,
			_callback: _callback
		});

		if (!QueueIsWork) applyAnItQueue();
	}

	function applyAnItQueue() {
		//console.log('animation count at the moment: '+anItQueue.length);

		/*  for (var i=0;i<anItQueue.length;i++){
		 console.log('element selector: '+anItQueue[i].selector);
		 }*/


		QueueIsWork = true;
		requestAnimFrame(function () {

			// setTimeout(function(){
			var qItem = anItQueue.shift();
			// console.log('++++++++++++++++++++++++++++++',qItem.selector,qItem.css);
			_anIt(qItem.selector, qItem.css, qItem.time, qItem.delay, qItem.easing, qItem._callback);

			if (anItQueue.length !== 0) applyAnItQueue();
			else QueueIsWork = false;
			//},300);

		});
	}
	function anIt(selector, css, time, delay, easing, _callback) {

		var applyTransitionTime = 0,
			selectorArr = [], selectorArrLen,
			clearLastCallback = (typeof css.noClearLastCallback !== 'undefined') ? !css.noClearLastCallback : true,
			callback = (typeof _callback !== 'undefined') ? _callback : function () {
			},
			prevTimeOutId = null,
			i = 0;

		if ((selector != null) && (selector.length > 0) && (typeof selector !== 'string')) selectorArr = selector;
		else selectorArr.push(selector);

		if (Modernizr.csstransitions) {
			var _css = css, _cssTransition = {}, _css_arr = Object.keys(css), _css_arr_len = _css_arr.length;
			_cssTransition["transition-duration"] = time + 'ms';
			_cssTransition["transition-timing-function"] = easing;

			_cssTransition["transition-property"] = '';

			for (i = 0; i < _css_arr_len; i++) {
				if (_css_arr[i] !== 'noClearLastCallback') _cssTransition["transition-property"] += _css_arr[i];
				if (i < (_css_arr_len - 1)) _cssTransition["transition-property"] += ', ';
			}

			var to = setTimeout(function () {
				selectorArrLen = selectorArr.length;
				var cto = setTimeout(function () {
					_cssTransition = {};
					_cssTransition["transition-duration"] = '';
					_cssTransition["transition-timing-function"] = '';
					_cssTransition["transition-property"] = '';
					for (i = 0; i < selectorArrLen; i++)
						$(selectorArr[i]).css(_cssTransition);

					callback();

				}, time + applyTransitionTime);

				for (i = 0; i < selectorArrLen; i++) {
					var $item = $(selectorArr[i]);

					if (clearLastCallback) {
						prevTimeOutId = $item.attr('data-aito');
						clearTimeout(prevTimeOutId);
					}

					///console.log(_cssTransition);

					$item.css(_cssTransition).attr({'data-aito': cto});

					setTimeout(function () {
						$item.css(_css);
					}, applyTransitionTime);
				}

			}, delay);

		} else {
			selectorArrLen = selectorArr.length;
			for (var i = 0; i < selectorArrLen; i++)
				$(selectorArr[i]).css(css);

			callback();
		}
	}
	window.requestAnimFrame =
		window.requestAnimationFrame ||
		window.webkitRequestAnimationFrame ||
		window.mozRequestAnimationFrame ||
		window.oRequestAnimationFrame ||
		window.msRequestAnimationFrame ||
		function (callback) {
			window.setTimeout(callback, 1000 / 60);
		};

	var sitePreloadData = [];

	var loaderProgressViewsObjs = {};

	var loaderAnimTime = 300;
	var toRenderP = 0;
	var isRenderEnd = false;

	function startPreload() {

		loaderProgressViewsObjs.$top = $("#preloader .top");
		loaderProgressViewsObjs.$left = $("#preloader .left");
		loaderProgressViewsObjs.$bottom = $("#preloader .bottom");
		loaderProgressViewsObjs.$right = $("#preloader .right");

		$('img').each(function () {
			sitePreloadData.push($(this).attr('src'));
		});


		load_res_arr(sitePreloadData, function (p) {
			toRenderP = p;
		}, function () {
			toRenderP = 1;
		});

		anIt(loaderProgressViewsObjs.$top, {'width': '100%'}, loaderAnimTime, 0, ease.line, function () {
			anIt(loaderProgressViewsObjs.$right, {'height': '100%'}, loaderAnimTime, 0, ease.line, function () {
				anIt(loaderProgressViewsObjs.$bottom, {'width': '100%'}, loaderAnimTime, 0, ease.line, function () {
					anIt(loaderProgressViewsObjs.$left, {'height': '100%'}, loaderAnimTime, 0, ease.line, function () {
						anIt('#preloader', {'opacity': 0}, 500, 0, ease.Out, function () {
							$('#preloader').remove();
						});
					})
				})
			})
		})
	}
	(function addXhrProgressEvent(cash) {
		var originalXhr = $.ajaxSettings.xhr;
		$.ajaxSetup({
			progress: function () {
			},
			xhr: function () {
				var req = originalXhr(), that = this;
				if (req) {
					if (typeof req.addEventListener == "function") {
						req.addEventListener("progress", function (evt) {
							var percentLoaded;
							if (evt.lengthComputable) percentLoaded = parseInt((evt.loaded / evt.total), 10);
							that.progress(evt, percentLoaded, that.url);
						}, false);
					}
				}
				return req;
			}
		});
	})(jQuery);

	function load_res_arr(arr, percents_fn, callback) {


		var totalSizeInBytes = 0;
		var progressBar = [];
		var arrLen = arr.length;
		// callback()
		var headProgress = 0;
		var headProgressCoef = 0.1;
		load_by_ajax('HEAD', arr, function () {
		}, HEAD_success, function () {
			//console.log("HEAD LOADED -------------------------------------------------------------------------")
			load_by_ajax('GET', arr, progressAll, function () {
			}, callback);
		});

		var headSuccessCount = 0;

		function HEAD_success(data, text, resp, path) {
			//console.log(data, text, resp, path);
			progressBar.push({file_l: 0, file_n: path});
			//console.log(resp);
			totalSizeInBytes += parseInt(resp.getResponseHeader('Content-Length'));

			headProgress = (headSuccessCount / arrLen) * headProgressCoef;
			percents_fn(headProgress);
			headSuccessCount++;
		}

		function progressAll(evt, percent, url) {
			var totalLoadedInBytes = 0
			for (var i = 0; i < arrLen; i++) {
				if (progressBar[i].file_n == url) {
					progressBar[i].file_l = evt.loaded;
				}
				totalLoadedInBytes += progressBar[i].file_l
			}

			var p = (totalLoadedInBytes / totalSizeInBytes) * (1 - headProgressCoef);
			percents_fn(headProgress + p);
		}
	}

	function load_by_ajax(type, arr, progress, success, callback) {

		var filesTotal = arr.length;
		var fileLoaded = 0;
		var errors = 0;
		var limit = 8;
		var next_limit;

		next_limit = fileLoaded + limit;
		load_limit(fileLoaded, fileLoaded + limit);


		function load_limit(s, end) {
			var _end = Math.min(filesTotal, end);

			for (var i = s; i < _end; i++) {
				ResLoad(i);
			}
		}

		function ResLoad(fileToLoad) {
			var path;
			path = arr[fileToLoad];
			//console.log(path)
			$.ajax({
				type: type,
				url: path,
				cache: true,
				beforeSend: function (xhr) {
					xhr.overrideMimeType("text/plain; charset=x-user-defined");
				},
				progress: function (evt, percent, url) {
					//console.log('progress callback',evt, percent, url);
					progress(evt, percent, url)
				},
				success: function (data, text, resp) {
					//console.log('on success',this.url)
					success(data, text, resp, path);
					onLoad();
				},
				error: function () {
					//console.log('on error',this.url)
					onError(fileToLoad)
				}
			});

			function onLoad() {
				fileLoaded++;

				if (fileLoaded == filesTotal) callback();
				if (fileLoaded == next_limit) {
					next_limit = fileLoaded + limit;
					if (fileLoaded < filesTotal) load_limit(fileLoaded, fileLoaded + limit);
				}
			}

			function onError(fileToLoad) {
				errors++;
				if (errors < 10) {
					ResLoad(fileToLoad)
				}
				else {
					fileLoaded++;
					if (fileLoaded == filesTotal) callback();
					if (fileLoaded == next_limit) {
						next_limit = fileLoaded + limit;
						if (fileLoaded < filesTotal) load_limit(fileLoaded, fileLoaded + limit);
					}
				}
			}
		}
	}

	;
	(function ($) {
		$(window).bind("resize", function () {
			onResize();
		});
		onResize();
	}(jQuery));


	function onResize() {
		resize();
		scalePopup();
	}


	function scalePopup() {
		var WW = $(window).width() ? $(window).width() : window.screen.availWidth;
		var coef = WW / 1280;

		if ($(window).height() > 690) {
			$("#projectsPopup .container, #projectsPopup").removeAttr("style");
		} else {
			$("#projectsPopup .container").removeAttr("style");
			var newHeight = ($("#projectsPopup").height() / coef) * 0.9;
			var oldHeight = $("#projectsPopup .container").height();

			$("#projectsPopup .container").css({"transform": "scale(" + (newHeight / oldHeight) + ")"});
		}

	}

	function resize() {

		var WW = $(window).width() ? $(window).width() : window.screen.availWidth;
		var coef = WW / 1280;

		$("#body, #projectsPopup").css({"transform": "scale(" + coef + ")"});

		if ($("#clone").length) {
			$("#clone").css({"transform": "scale(" + coef + ")"});
		}
		// $("#services .icon img, #contacts .ico img").css({"transform":"scale("+(1280/WW)+")"});
	}


	$(document).ready(function () {
		//Services. Animation
		$('.TWLA-unit').hover(function () {
			cubeSlider(1, ['X', 'Y'], $(this).find('.TWLA-unit-wrap-hover')[0], $(this).find('.TWLA-unit-wrap-default')[0], $(this).find('.TWLA-cube')[0], $.noop);

		}, function () {
			cubeSlider(-1, ['X', 'Y'], $(this).find('.TWLA-unit-wrap-default')[0], $(this).find('.TWLA-unit-wrap-hover')[0], $(this).find('.TWLA-cube')[0], function () {
				ianIt($(this).find('.TWLA-unit-wrap-default')[0], {'transform': ''});
			});
		});

	});

	var animBaseTime = 700;

	function cubeSlider(_dir, orientation, next, now, cont, cb) {

		var OriginNow, OriginNext, dir, deg_dir
		perspective = 1000;

		if (orientation[0] == 'X') {
			dir = _dir;
			deg_dir = _dir;
			OriginNow = (dir == 1) ? '100% 50%' : '0% 50%';
			OriginNext = (dir == 1) ? '0% 50%' : '100% 50%';
		} else if (orientation[0] == 'Y') {
			dir = _dir;
			deg_dir = (-1) * _dir;
			OriginNow = (dir == 1) ? '50% 100%' : '50% 0%';
			OriginNext = (dir == 1) ? '50% 0%' : '50% 100%';
		}

		ianIt(next, {
			'transform': 'translate' + orientation[0] + '(' + dir * 100 + '%) rotate' + orientation[1] + '(' + deg_dir * 90 + 'deg)',
			'transform-origin': OriginNext
		});
		ianIt(now, {'transform-origin': OriginNow});
		ianIt(cont, {'perspective': perspective + 'px', 'transform-style': 'preserve-3d', 'z-index': 500});

		setTimeout(function () {
			anIt(cont, {'transform': 'scale(0.9)'}, animBaseTime / 5, 0, ease.Out, function () {
				anIt(cont, {'transform': 'scale(1)'}, animBaseTime - animBaseTime / 5, 0, ease.Out, function () {
				});
			});

			anIt(next, {'transform': 'translate' + orientation[0] + '(0%) rotate' + orientation[1] + '(0deg)'}, animBaseTime, 0, ease.Out, function () {
			});

			$(now).find('.gradient').css({'visibility': 'visible'});
			anIt($(now).find('.gradient')[0], {'opacity': 1}, animBaseTime, 0, ease.Out);
			anIt($(next).find('.gradient')[0], {'opacity': 0}, animBaseTime, 0, ease.Out, function () {
				$(next).find('.gradient').css({'visibility': 'hidden'});
			});

			anIt(now, {'transform': 'translate' + orientation[0] + '(' + (-1 * dir * 100) + '%) rotate' + orientation[1] + '(' + (-1 * deg_dir * 90) + 'deg)'}, animBaseTime, 0, ease.Out, function () {
				cb();
				ianIt(cont, {'perspective': perspective + 'px', 'transform-style': 'preserve-3d', 'z-index': 1000});
			});
		}, 0);
	}


</script>
