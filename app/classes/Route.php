<?php

namespace app\classes;

class Route
{
	public static function route(array $routes, $uri)
	{
		if(!array_key_exists($uri, $routes)) {
			return 'app/controllers/ErrorPageNotFoundController.php';
		}

		return 'app/'.$routes[$uri].'.php';
	}
}