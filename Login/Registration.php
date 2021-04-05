<?php
include('../Database/connect.php');
session_start ();

function Registration($username, $password, $email,$rePassword)
{
    $read = "SELECT * FROM user WHERE userName = '$username' AND password = '$password'";
    global $conn;
    $result = $conn->query($read);
    if (mysqli_num_rows($result) == 0) {
        if (isset($_POST['signUp'])) {
            if ($username != null && $email!= null && $password != null && $rePassword != null) {
                if ($password  === $rePassword) {
                    $sql = "INSERT INTO user (userName,password,email)
                    VALUES ('$username','$password','$email')";
                    $conn->query($sql);
                    $read = "SELECT * FROM user WHERE userName = '$username'"; 
                    $result = $conn->query($read);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $insert = "INSERT INTO cart (userId,email)
                            VALUES ('{$row['id']}','{$row['email']}') ";
                                $user = $row['userName'];
                                setcookie('user', $user, time()+ 3600, '/');
                                $_SESSION['userId'] = $row['id'] ;
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
