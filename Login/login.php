<?php

include('../Database/connect.php');
require('../Class/class.php');
session_start ();
error_reporting(0);
function Login($username,$password){
    $read = "SELECT * FROM user WHERE userName = '$username' AND password = '$password'"; 
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
        if(isset($_POST ['submit']) && ($_POST['name'])!= null && ($_POST['password'])!= null){
            if ($result) {
                header("location:http://localhost/Bonsai_Garden/Home/home.php?");
            } else {
            echo $conn->error;
            }
        }else{
            echo "<script > 
                    alert('Must not be left blank');
                    setTimeout(() => { window.location.replace('http://localhost/Bonsai_Garden/Login/login.html') }, 0);
                </script> ";
        }
    }else{
        echo "<script > 
                    alert('Your username or password is incorrect, please try again');
                    setTimeout(() => { window.location.replace('http://localhost/Bonsai_Garden/Login/login.html') }, 0);
                </script> ";
    }
       
}
Login($_POST['name'],$_POST['password']) ;
?>