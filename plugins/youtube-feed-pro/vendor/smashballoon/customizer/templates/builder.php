<div id="sbc-builder-app" class="sbc-fb-fs sbc-builder-app">
	<?php
		$icons = \Smashballoon\Customizer\Feed_Builder::builder_svg_icons();
		include_once CUSTOMIZER_ABSPATH . 'templates/sections/header.php';
		include_once CUSTOMIZER_ABSPATH . 'templates/screens/select-feed.php';
		include_once CUSTOMIZER_ABSPATH . 'templates/screens/welcome.php';
		include_once CUSTOMIZER_ABSPATH . 'templates/screens/customizer.php';
		include_once CUSTOMIZER_ABSPATH . 'templates/sections/footer.php';
	?>
	<div class="sb-control-elem-tltp-content" v-show="tooltip.hover" @mouseover.prevent.default="hoverTooltip(true, 'inside')" @mouseleave.prevent.default="hoverTooltip(false, 'outside')">
		<div class="sb-control-elem-tltp-txt" v-html="tooltip.text" :data-align="tooltip.align"></div>
	</div>
</div>