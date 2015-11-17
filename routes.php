<?php
	function call($c, $a){
		//require the file that matches the controller name
		require_once('controllers/' . $c . '_controller.php');
		
		//create a new instance of the needed controller
		switch($c){
			case 'pages':
				$c = new PagesController();
				break;
		}
		//call the action
		$c->{$a}();
	}

	//just a list of the controllers we have and their actions,
	//we consider those allowed values.
	$controllers = array('pages' => ['home', 'error']);
	//The $controllers associative array can be seen as a mapping
	//from controllers to actions, where each controller 
	//maps to a group of actions (controller => actions).

	//var_dump($variable) its quite iseful for debugging,
	//it prints the variable name, type and value.
	//echo var_dump($controller) . '<br>';
	//echo var_dump($action) . '<br>';

	//check that the requested controller and action are both allowed
	//if someone tries to acces something else he will be redirected to the error action of the page.
	if(array_key_exists($controller, $controllers)){
		if(in_array($action, $controllers[$controller])){
			call($controller, $action);
		}else{
			call('pages', 'error');
		}
	}else{
		call('pages', 'error');
	}
?>