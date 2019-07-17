<?php
function my_acf_admin_head() {
?>
<style type="text/css">

.acf-flexible-content .layout .acf-fc-layout-handle {
	text-transform: uppercase;
	font-size: 14px;
	font-weight: 700;
	background: #1b5484;
	color: #fff;
}
.acf-field .acf-label label {
	font-size: 14px;
} 
.acf-field-group .acf-label label,
.acf-field-flexible-content .acf-label label {
	font-size: 18px;
}
.acf-field-group .acf-input .acf-label label,
.acf-field-flexible-content .acf-input .acf-label label {
	font-size: 14px;
}

</style>
<?php
}
add_action('acf/input/admin_head', 'my_acf_admin_head');