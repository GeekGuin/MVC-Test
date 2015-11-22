<?php
	function call($c, $a){
		//Require the file that matches the controller name
		require_once('controllers/' . $c . '_controller.php');
		
		//Rreate a new instance of the needed controller
		switch($c){
			case 'pages':
				$c = new PagesController();
				break;
			case 'posts':
				require_once('models/post.php');
				$c = new PostsController();
				break;
		}
		//Call the action
		$c->{$a}();
		//This syntax basically takes the action on a string $a and then
		//search for a method on the class $c with the name of $a and then
		//proceeds to execute that method.
	}

	//Just a list of the controllers we have and their actions,
	//we consider those allowed values.
	$controllers = array('pages' => ['home', 'error'],
						 'posts' => ['index', 'show']);
	//The $controllers associative array can be seen as a mapping
	//from controllers to actions, where each controller
	//maps to a group (an array) of actions (controller => actions).

	//var_dump($variable) its quite iseful for debugging,
	//it prints the variable name, type and value.
	//echo var_dump($controller) . '<br>';
	//echo var_dump($action) . '<br>';

	//Check that the requested controller and action are both allowed
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