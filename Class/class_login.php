<?php 
    include('../Database/connect.php');

Class Login {
	private $username;
	private $password;


	function __construct($username, $password){
		$this->username = $username;
		$this->password = $password;
	}

	function login(){	
		$read = "SELECT * FROM user WHERE userName = '$this->username'"; 
		global $conn;
		$result = $conn->query($read);
		if (mysqli_num_rows($result) != 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$id =$row['id'];
				$user = $row['userName'];
				$_SESSION['userId'] = $id ;
				setcookie('user', $user, time()+ 3600, '/');
				echo "<script> console.log({$_SESSION['userId']})</script>";
			}
			if(isset($_POST ['submit']) && ($this->username)!= null && ($this->password)!= null){
				if ($result) {
					header("location:../Home/home.php?");
				} else {
				echo $conn->error;
				}
			}else{
				echo "<script > 
						alert('Must not be left blank');
						setTimeout(() => { window.location.replace('../Login/login.html') }, 0);
					</script> ";
			}
		}else{
			echo "<script > 
						alert('Your username or password is incorrect, please try again');
						setTimeout(() => { window.location.replace('../Login/login.html') }, 0);
					</script> ";
		}   
	}
}
?>