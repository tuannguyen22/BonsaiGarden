<?php
include('../Database/connect.php');

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
                    $read = "SELECT id FROM user WHERE userName = '$username'"; 
                    $result = $conn->query($read);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $insert = "INSERT INTO cart (userId)
                            VALUES ('{$row['id']}') ";
                            if ( $conn->query($insert) === TRUE) {
                                header("location:http://localhost/Bonsai_Garden/Home/home.html?");
                            }else{
                                echo " Error: " . $conn->error;
                            }
                        }
                    }
                } else {
                    echo "<script > 
                        alert('Incorrect password');
                        setTimeout(() => { window.location.replace('http://localhost/Bonsai_Garden/Login/login.html') }, 10);
                    </script> ";
                }
            }else{
                echo "<script > 
                    alert('Must not be left blank');
                    setTimeout(() => { window.location.replace('http://localhost/Bonsai_Garden/Login/login.html') }, 10);
                </script> ";
            }
        }
    } else {
        echo "<script > 
        alert('Account already exists');
            setTimeout(() => { window.location.replace('http://localhost/Bonsai_Garden/Login/login.html') }, 10);
        </script> ";
    }
}
Registration($_POST['newName'],$_POST['newPassword'],$_POST['newEmail'],$_POST['rePassword']);
