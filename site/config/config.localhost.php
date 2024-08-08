<?php

return [
	'debug' => true,
	'analytics' => false,
	'cache' => [
		'pages' => [
			'type' => 'php',
			'active' => false
		]
	],
	'auth' => [
		'methods' => [
			'password' => ['2fa' => false]
		]
	],
];
