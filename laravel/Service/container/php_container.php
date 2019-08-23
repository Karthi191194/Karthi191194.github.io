<?php

class container{
	
	protected $bindings = [];
	
	public function bind($name, callable $resolver){
		$this->bindings[$name] = $resolver();
	}
	
	public function make($name){
		return $this->bindings[$name];
	}
}

$container = new container;


print_r($container->make('game'));


//check callable - typehinting on PHP folder.