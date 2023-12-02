<?php

return [
	'debug' => true,
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
