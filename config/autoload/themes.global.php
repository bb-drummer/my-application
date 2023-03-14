<?php
return array(
	'ze_theme' => array(
		'default_theme' => (isset($_ENV['PROJECT_THEME']) && !empty($_ENV['PROJECT_THEME']))
			? $_ENV['PROJECT_THEME']
			: "bootstrap",
		'custom_theme_path' => true,
		'theme_paths' => array(
			__DIR__ . "/../../public/themes/{theme}/",
		),
		'routes' => array(
			// 'theme_name' => array('route_names'),
		),
		'adapters' => array(
			"ZeTheme\Adapter\Configuration",
			//"ZeTheme\Adapter\Route",
			//"ZeTheme\Adapter\Session",
		),
	),
);