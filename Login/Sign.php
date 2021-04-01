<?php $check;

include('../Database/connect.php');


$checkLogin = function() {
    $username = $_POST['name'];
    $password = $_POST['password'];
    $sql="SELECT "

        if ($username == data.userName && password == data.passWord) {
            localStorage.setItem('user', JSON.stringify(data));
            check = 1;
            break;
        } else if (username == "Admin" && password == "12345") {
            localStorage.setItem('user', JSON.stringify(data));
            check = 2;
            break;
        } else {
            check = 0;
        }
    }

    return check;
}

// $login = function() {
//     if (checkLogin() == 1) {
//         alert("Đăng nhập thành công!");
//         setStatus();
//         window.location.replace("../Home/home.html");
//     } else if (checkLogin() == 2) {
//         setStatus();
//         alert("Xin chào Admin!");
//         window.location.replace("../Admin/index.html");
//     } else {
//         alert("Tên đăng nhập hoặc mật khẩu sai!");

//     }
// }
?>