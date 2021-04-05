<?php 
    include('../Database/connect.php');



Class User {
	public $username;
	public $password;
	public $rePassword;
	public $fullname;
	public $phone;
	public $age;
	public $email;
    public $address;
    public $job_title;
	
	function __construct(){

	}
	function signUp($username, $password,$rePassword,$email){
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
		$this->rePassword = $rePassword;
	}

	function signIn($username, $password){
		$this->username = $username;
		$this->password = $password;
	}
}
?>