

<?php 

require '../db/connect.php';
require 'restful_api.php';

class User extends restful_api {
	
	function __construct(){
		parent::__construct();
     
	}

	function user(){
		if ($this->method == 'GET'){


			$con= new mysqli('localhost','root','','bonsaigarden');
			if(empty($this->params))
			{
				$result=	$con->query("SELECT * FROM `user`");
			}
			else{
				print_r($this->params);
					$id=array_pop(explode('=',$this->params));

					$result=	$con->query("select * from user where id='$id'");

			}	
		
			$data = array();
			while($row =$result->fetch_assoc()){
				$data[] = $row;
			}
			$this->response(200, $data);		
		}
		elseif ($this->method == 'POST'){
			$this->connection->query("insert into user(name,phone,job_title,email,age,email,age,userName,password,address) values('$this->params['name]','$this->params['phone']','$this->params['job_title']','$this->params['email']','$this->params['age']','$this->params['userName']','$this->params['password']','$this->params['address']')");		
			$data = $this->connection->fetchArray();	
			$this->response(200);		
		}
		elseif ($this->method == 'PUT'){
			


		}
		elseif ($this->method == 'DELETE'){
			$id=array_pop(explode('=',$this->params));
			$this->connection->query("delete user where id='$id'");
			$this->response(200);		
		 }
	}

    function random_user(){
		if ($this->method == 'GET'){
		
			$this->connection->query("select * from users ORDER BY RAND() LIMIT 1");
			$data = array();
			while($row =$this->connection->fetchArray()){
				$data[] = $row;
			}
			$this->response(200, $data);
		}
	}
}
$user = new User();

?>