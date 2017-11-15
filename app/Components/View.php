<?php

namespace App\Components;

use Twig_Environment;
use Twig_Loader_Filesystem;

class View {

	public static function render($view, array $params = [])
	{
		$view .= '.php';
		$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../views');
		$twig =  new Twig_Environment($loader, []);
		echo $twig->render($view, $params);

	}//render
}//Response