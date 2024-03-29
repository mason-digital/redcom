<?php
	
require get_template_directory() . '/inc/setup.php';


require get_template_directory() . '/inc/widgets.php';


require get_template_directory() . '/inc/security.php';


require get_template_directory() . '/inc/editor.php';


require get_template_directory() . '/inc/enqueue.php';


require get_template_directory() . '/inc/extras.php';


require get_template_directory() . '/inc/menus.php';


require get_template_directory() . '/inc/shortcodes.php';


require get_template_directory() . '/inc/admin_styles.php';


require get_template_directory() . '/inc/redcom_walker.php';

require 'update/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker( 'https://github.com/mason-digital/redcom', __FILE__, 'redcom' );