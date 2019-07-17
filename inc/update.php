<?php

require '../plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/mason-digital/redcom',
	__FILE__,
	'redcom'
);