
<?php
$navigate = false;

function input_data() {
        $newUsername = $_POST[''];
        $newPassword = $_POST[''];
        $newEmail = $_POST[''];
        $name = $_POST[''];
        $age = $_POST[''];
        $phones = $_POST[''];
        $job = $_POST[''];
    $navigate = true;
    if ($navigate == true) {
        $account = new User(input.newUsername, input.newPassword, input.newPassword, input.name, input.age, input.phones, input.job);
    } else {
        alert("Không thể thêm thông tin !")
    }
}
// Kiem tra dang nhap
$check;
$checkLogin = function() {
    $username = document.getElementById('username').value;
    $password = document.getElementById('password').value;
    $listUser = User.getListUser();
    for ($i in listUser) {
        $data = listUser[i];
        if (username == data.userName && password == data.passWord) {
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
    console.log(check)
    return check;
}
$login = function() {
        if (checkLogin() == 1) {
            alert("Đăng nhập thành công!");
            setStatus();
            window.location.replace("../Home/home.html");
        } else if (checkLogin() == 2) {
            setStatus();
            alert("Xin chào Admin!");
            window.location.replace("../Admin/index.html");
        } else {
            alert("Tên đăng nhập hoặc mật khẩu sai!");

        }
    }
    // Kiem tra dang ky
$checkSignUp;
$checkSignup = function() {
    $newUsername = document.getElementById('newUsername').value;
    $newEmail = document.getElementById('newEmail').value;
    $newPassword = document.getElementById('newPassword').value;
    $rePass = document.getElementById('rePassword').value;
    listUser = User.getListUser();
    for ($i in listUser) {
        $data = listUser[i];
        if (newUsername == data.userName) {
            checkSignUp = 1;
            break;
        } else if (rePass != newPassword) {
            checkSignUp = 2;
        } else if (newUsername == "" || newPassword == "" || rePass == "" || newEmail == "") {
            checkSignUp = 3;
        } else {
            checkSignUp = 4;
        }
    }
    return checkSignUp;
}

$signUP = function() {
    if (checkSignup() == 1) {
        alert("Tên đăng nhập tồn tại !");
    } else if (checkSignup() == 2) {
        alert("Nhập mật khẩu sai !");
    } else if (checkSignup() == 3) {
        alert("Thông tin không được để trống!");
    } else {

        alert("Đăng ký tài khoản thành công !");
        console.log(checkSignup())
        $('#exModal').modal('show');

    }
}


$status = false;
localStorage.setItem('status', JSON.stringify(false));

function getStatus() {
    return JSON.parse(localStorage.getItem('status'));
}

function setStatus() {

    if (JSON.parse(localStorage.getItem('status'))) {
        localStorage.setItem('status', 'false');
    } else {
        localStorage.setItem('status', 'true');
    }
}

function isLogin() {
    setTimeout(() => { console.log(localStorage.getItem('user')) }, 5000);
    console.log(getStatus());
}
?>