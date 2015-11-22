<?php
	class Post{
		//We define 3 attributes, they are public so that we can
		//acces them using $post->author directly
		public $id;
		public $author;
		public $content;

		public function __construct($id, $author, $content){
			$this->id = $id;
			$this->author = $author;
			$this->content = $content;
		}

		public static function all(){
			$list = [];
			$db = Db::getInstance();
			$req = $db->query('SELECT * FROM posts');

			//We create a list of Post objects from the database results
			foreach($req->fetchAll() as $post){
				$list[] = new Post($post['idPost'], $post['author'], $post['content']);
			}
			return($list);
		}

		public static function find($id){
			$db = Db::getInstance();
			//We make sure $id is an integer
			$id = intval($id);
			$req = $db->prepare('SELECT * FROM posts WHERE idPost = :idPost');
			//The query was prepared, now we replace :id with our actual $id value
			$req->execute(array('idPost' => $id));
			$post = $req->fetch();
			return(new Post($post['idPost'], $post['author'], $post['content']));
		}

		public static function findByName($author){
			$db = Db::getInstance();
			$author = strval($author);
			$req = $db->prepare('SELECT * FROM posts WHERE author = :author');
			$req->execute(array('author' => $author));
			$post = $req->fetch();
			return(new Post($post['idPost'], $post['author'], $post['content']));
		}
	}
?>