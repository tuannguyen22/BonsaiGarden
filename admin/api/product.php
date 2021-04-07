

<?php

require_once '../db/connect.php';
require_once 'restful_api.php';
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
class Product extends restful_api
{

	function __construct()
	{
		parent::__construct();
	}

	function product()
	{
		if ($this->method == 'GET') {
			$con = new Database();
			if (empty($this->params)) {
				$con->query("SELECT * FROM `product`");
				$data = $con->fetchAll();
			} else {
				$arr = explode('=', $this->params);
				$id = array_pop($arr);
				$con->query("select * from product where id='$id'");
				$data = $con->fetchArray();
			}



			$this->response(200, $data);
		 
		} elseif ($this->method == 'PUT') {
			$this->params=$_REQUEST;
			$con = new Database;
			$id = $_REQUEST['id'];
            $name= $_REQUEST['name'];
			$subtitle= $_REQUEST['subtitle'];
			$summary=$_REQUEST['summary'];
			$type=$_REQUEST['type'];
			$price=$_REQUEST['price'];
			$discount=$_REQUEST['discount'];
			$quantity= $_REQUEST['quantity'];
			
			$con->query("update product set name='$name',quantity='$quantity',
			subtitle='$subtitle',summary='$summary',
			type='$type',price='$price',discount='$discount'
			 where id='$id'");
       
			 
			$con->close();

			$this->response(200);
		} elseif ($this->method == 'DELETE') {
			// $con = new Database;
			
			// $id = $_REQUEST['id'];
			// $con->query("select * from user where id='$id'");
			// $data = $con->fetchArray();
		
			// if($data['status']==1)
			// 	$status=0;
			// else 
			// 	$status =1;
		
			// $con->query("update user set status='$status' where id='$id'");

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