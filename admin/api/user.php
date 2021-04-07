

<?php

require 'restful_api.php';
require_once '../db/connect.php';
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
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


			$con->close();
			$this->response(200, $data);
		} elseif ($this->method == 'POST') {

			$con = new Database;

			$this->connection->query("insert into user(name,phone,job_title,email,age,email,age,userName,password,address) values('$this->params['name]','$this->params['phone']','$this->params['job_title']','$this->params['email']','$this->params['age']','$this->params['userName']','$this->params['password']','$this->params['address']')");
			$this->response(200);

		} elseif ($this->method == 'PUT') {
			$this->params=$_REQUEST;
			$con = new Database;
			$id = $_REQUEST['id'];
			$email= $_REQUEST['email'];
			$job=$_REQUEST['job_title'];
			$age=$_REQUEST['age'];
			$address=$_REQUEST['address'];
			$phone=$_REQUEST['phone'];
			$name= $_REQUEST['name'];
			
			$con->query("update user set name='$name',phone='$phone',
			job_title='$job',email='$email',
			age='$age',address='$address'
			 where id='$id'");
			 
			$con->close();

			$this->response(200);
		} elseif ($this->method == 'DELETE') {
			$con = new Database;
			
			$id = $_REQUEST['id'];
			$con->query("select * from user where id='$id'");
			$data = $con->fetchArray();
		
			if($data['status']==1)
				$status=0;
			else 
				$status =1;
		
			$con->query("update user set status='$status' where id='$id'");

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
?>