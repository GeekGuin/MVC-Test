<?php
	class PostsController{
		public function index(){
			//We store all the posts in a variable, and we do so
			//by calling the static method all() from the Post class.
			$posts = Post::all();
			require_once('views/posts/index.php');
		}

		public function show(){
			//We expect an url of form ?controller=posts&action=show&id=x
			//Whitout an id we just redirect to the error page as we need
			//the post id to find it in the database.
			if(!isset($_GET['id'])){
				return call('pages', 'error');
			}

			if(isset($_GET['author'])){
				$posts = Post::findByName($_GET['author']);
			}else{
				//We use the given id to get to the right post, using the 
				//find($id) static method from the Post class.
				$posts = Post::find($_GET['id']);
			}

			require_once('views/posts/show.php');
		}
	}
?>