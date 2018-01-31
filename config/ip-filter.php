<?php

return [
	/*
    |--------------------------------------------------------------------------
    | Ip Filter Config
    |--------------------------------------------------------------------------
    |
    | Use one of supported filter methods.
    |
    | Supported: "Black list", "White list"
    |
    */

	// Env - only use filter on listed environments
	'env' => ['production'],

	// White list - List of allowed IP addresses
	'allowed' => [],

	// Black list - List of denied IP addresses
	'denied' => [],
];
