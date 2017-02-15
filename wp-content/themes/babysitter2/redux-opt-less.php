<?php

if (class_exists('WPLessPlugin')){
	$less = WPLessPlugin::getInstance();

	$less->setVariables(array(
		'color-primary'                   => '#fc8a58',
		'color-secondary'                 => '#7fdbfd',
		'color-tertiary'                  => '#c4d208',
		'color-quaternary'                => '#528cba',
		'color-quinary'                   => '#f0f7fa',
		'color-senary'                    => '#70b3d0',
		'color-septenary'                 => '#e8f2f7',
	));

	// get options and set custom variables
	global $babysitter_data;

	// Colors
	if ($babysitter_data['color-primary']) {
		$less->addVariable('color-primary',$babysitter_data['color-primary']);
	}
	if ($babysitter_data['color-secondary']) {
		$less->addVariable('color-secondary',$babysitter_data['color-secondary']);
	}
	if ($babysitter_data['color-tertiary']) {
		$less->addVariable('color-tertiary',$babysitter_data['color-tertiary']);
	}
	if ($babysitter_data['color-quaternary']) {
		$less->addVariable('color-quaternary',$babysitter_data['color-quaternary']);
	}
	if ($babysitter_data['color-quinary']) {
		$less->addVariable('color-quinary',$babysitter_data['color-quinary']);
	}
	if ($babysitter_data['color-senary']) {
		$less->addVariable('color-senary',$babysitter_data['color-senary']);
	}
	if ($babysitter_data['color-septenary']) {
		$less->addVariable('color-septenary',$babysitter_data['color-septenary']);
	}
}
?>