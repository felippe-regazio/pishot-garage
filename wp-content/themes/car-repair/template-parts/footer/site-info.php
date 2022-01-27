<?php
/**
 * Displays footer site info
 *
 * @package Car Repair
 * @subpackage car_repair
 */

?>
<div class="site-info">
	<div class="container">
		<p><?php echo esc_html(get_theme_mod('automobile_hub_footer_text',__('Car Repair WordPress Theme By ','car-repair'))); ?><?php car_repair_credit(); ?></p>
	</div>
</div>