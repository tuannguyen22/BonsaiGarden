

<?php

require '../db/connect.php';
require 'restful_api.php';

class User extends restful_api
{

	function __construct()
	{
		parent::__construct();
	}

	function user()
	{
		if ($this->method == 'GET') {
			$con = new Database;
			if (empty($this->params)) {
				$con->query("SELECT * FROM `user`");
				$data = $con->fetchAll();
			} else {
				$arr = explode('=', $this->params);
				$id = array_pop($arr);
				$con->query("select * from user where id='$id'");
				$data = $con->fetchArray();
			}



			$this->response(200, $data);
		} elseif ($this->method == 'POST') {
			$this->connection->query("insert into user(name,phone,job_title,email,age,email,age,userName,password,address) values('$this->params['name]','$this->params['phone']','$this->params['job_title']','$this->params['email']','$this->params['age']','$this->params['userName']','$this->params['password']','$this->params['address']')");
			$this->response(200);

		} elseif ($this->method == 'PUT') {
			$con = new Database;

			print_r($_POST);
			$id = $this->params['id'];
			$con->query("update user set name='
			$this->params['name']',phone='$this->params['phone']',
			job_title'$this->params['job_title']',email='$this->params['email']',
			age='$this->params['age']',address='$this->params['address']'
			 where id='$id' ");




		} elseif ($this->method == 'DELETE') {
			$con = new Database;

			$arr = explode('=', $this->params);
			$id = array_pop($arr);
			$con->query("delete from user where id='$id'");

			$this->response(200);
		}
	}

	// function random_user(){
	// 	if ($this->method == 'GET'){

	// 		$this->connection->query("select * from users ORDER BY RAND() LIMIT 1");
	// 		$data = array();
	// 		while($row =$this->connection->fetchArray()){
	// 			$data[] = $row;
	// 		}
	// 		$this->response(200, $data);
	// 	}
	// }
}
$user = new User();
?>