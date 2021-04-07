<?php
include('../Database/connect.php');
session_start ();
error_reporting(0);
function Registration($username, $password, $email,$rePassword)
{
    $read = "SELECT * FROM user WHERE userName = '$username' AND password = '$password'";
    global $conn;
    $result = $conn->query($read);
    if (mysqli_num_rows($result) == 0) {
        //Kiem tra tai khoan da ton tai
        if (isset($_POST['signUp'])) {
            if ($username != null && $email!= null && $password != null && $rePassword != null) {
                //Rang buoc input
                if ($password  === $rePassword) {
                    //Rang buoc mat khau
                    $sql = "INSERT INTO user (userName,password,email)
                    VALUES ('$username','$password','$email')";
                    $conn->query($sql);
                    //Them vao user
                    $read = "SELECT * FROM user WHERE userName = '$username'"; 
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
                                header("location:http://localhost/Bonsai_Garden/Home/home.php?");
                            }else{
                                echo " Error: " . $conn->error;
                            }
                        }
                    }
                } else {
                    echo "<script > 
                        alert('Incorrect password');
                        setTimeout(() => { window.location.replace('http://localhost/Bonsai_Garden/Login/login.html') }, 0);
                    </script> ";
                }
            }else{
                echo "<script > 
                    alert('Must not be left blank');
                    setTimeout(() => { window.location.replace('http://localhost/Bonsai_Garden/Login/login.html') }, 0);
                </script> ";
            }
        }
    } else {
        echo "<script > 
        alert('Account already exists');
            setTimeout(() => { window.location.replace('http://localhost/Bonsai_Garden/Login/login.html') }, 0);
        </script> ";
    }
}
Registration($_POST['newName'],$_POST['newPassword'],$_POST['newEmail'],$_POST['rePassword']);
