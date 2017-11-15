<?php

namespace App\Components;


class Router
{
    private $url;
	public static $instance;

    private function __construct() {
	    $this->url = explode('/',$_SERVER['REQUEST_URI']);
    }//__construct

	public static function getInstance()
	{
		if (null === self::$instance) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function getController(){
		return 'App\Controllers\\'.(ucfirst($this->url[1]?:'app')).'Controller';
	}

	public function getAction(){

		$action = explode('?', $this->url[2])[0];
		return 'action'.(ucfirst($action?:'index'));
	}

	public function getArguments() {
		$arguments = [];
		foreach($this->url as $key => $arg) {
			if($key != 0 && $key != 1 && $key != 2) {
				$arguments[] = $arg;
			}
		}
		return $arguments;
	}

}//Router