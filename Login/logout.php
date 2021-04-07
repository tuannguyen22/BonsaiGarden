<?php
error_reporting(0);
setcookie('user', $user, time()- 3600, '/');
echo "<script > 
        alert('Logout Successful');
        window.onbeforeunload;
        setTimeout(() => { window.location.replace('http://localhost/Bonsai_Garden/Login/login.html') }, 0);
    </script> ";
?>