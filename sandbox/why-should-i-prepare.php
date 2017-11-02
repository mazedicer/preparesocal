<section style="margin-top:10px; margin-bottom:50px;"><a class="anchorLink" name="block2"></a><style>.stats-row.row {
		display: flex;
		justify-content: space-around;
		text-align: center;
		flex-wrap: wrap;
	}

	.ID13160 {
		position: relative;
	}</style><section class="main-stats"><div class="gcb container why-should-i-prepare? ID13160"><h2 class="text-xs-center pt-1">Why Should I Prepare?</h2><p class="text-xs-center">If you plan for a vacation; Why not plan for your safety? Each year the Red Cross responds to nearly 64,000 disasters. The vast majority are home fires.</p><div id="13160Edit" class="editBlock"> <a href="http://preparecal.dev/wp-admin/post.php?post=13160&amp;action=edit"><img data-toggle="tooltip" data-placement="top" title="" src="http://preparecal.dev/wp-content/themes/persuader/assets/img/editblock.png" data-original-title="Edit Default Block"></a></div> <script type="text/javascript">$('.ID13160').hover(
			function () {
				$('#13160Edit').addClass("editBlockHover");
			}, function () {
				$('#13160Edit').removeClass('editBlockHover');
			}
		);</script> <div class="stats-row row" id="stats"><div class="stats-item col-xs-12 col-md-6 col-lg-3"><img src="http://preparecal.dev/wp-content/uploads/7-people-die-icon.png"><div class="stats-content"><h2 class="count">2</h2><p>People die from a home fire daily.</p></div></div><div class="stats-item col-xs-12 col-md-6 col-lg-3"><img src="http://preparecal.dev/wp-content/uploads/36-people-icon.png"><div class="stats-content"><h2 class="count">11</h2><p>People suffer injuries as a result of home. fires daily</p></div></div><div class="stats-item col-xs-12 col-md-6 col-lg-3"><img src="http://preparecal.dev/wp-content/uploads/7billion-icon.png"><div class="stats-content"><h2 class="count">2</h2><p>Billion+ in property damage occurs yearly.</p></div></div></div></div></section>  <script>$(document).ready(function () {
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

				// https://github.com/inorganik/countUp.js Mario wrote this
				var queueCountAnimation = new countUp(value, 0, endValue, 0, 12);
				queueCountAnimation.start();
			});
		};

		return {
			startCount: startCount
		};

	})();</script> </section>