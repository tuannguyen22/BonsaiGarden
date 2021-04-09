<?php 
    include('../Database/connect.php');

Class Registration {
	private $username;
	private $Password;
    private $rePassword;
    private $email;
    


	function __construct($username, $password,$rePassword,$email){
		$this->username = $username;
		$this->password = $password;
        $this->rePassword = $rePassword;
        $this->email = $email;
	}
    function registration()
{
    $read = "SELECT * FROM user WHERE userName = '$this->username' or email = '$this->email'";
    global $conn;
    $result = $conn->query($read);
    if (mysqli_num_rows($result) == 0) {
        //Kiem tra tai khoan da ton tai
        if (isset($_POST['signUp'])) {
            if ($this->username != null && $this->email!= null && $this->password!= null && $this->rePassword != null) {
                //Rang buoc input
                if ($this->password  === $this->rePassword) {
                    //Rang buoc mat khau
                    $sql = "INSERT INTO user (userName,password,email)
                    VALUES ('$this->username','$this->password','$this->email')";
                    $conn->query($sql);
                    //Them vao user
                    $read = "SELECT * FROM user WHERE userName = '$this->username'"; 
                    $result = $conn->query($read);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $insert = "INSERT INTO cart (userId)
                            VALUES ('{$row['id']}') ";
                            //Them du lieu id user vao cart
                                $user = $row['userName'];
                                setcookie('user', $user, time()+ 3600, '/');
                                //Set cookie
                                $_SESSION['userId'] = $row['id'] ;
                                //Gan gia tri Session
                            if ( $conn->query($insert) === TRUE) {
                                header("location:../Home/home.php");
                            }else{
                                echo " Error: " . $conn->error;
                            }
                        }
                    }
                } else {
                    echo "<script > 
                        alert('Incorrect password');
                        setTimeout(() => { window.location.replace('../Login/login.html') }, 0);
                    </script> ";
                }
            }else{
                echo "<script > 
                    alert('Must not be left blank');
                    setTimeout(() => { window.location.replace('../Login/login.html') }, 0);
                </script> ";
            }
        }
    } else {
        echo "<script > 
        alert('Account already exists');
            setTimeout(() => { window.location.replace('../Login/login.html') }, 0);
        </script> ";
    }
}

}


?>