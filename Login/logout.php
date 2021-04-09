<?php
error_reporting(0);
setcookie('user', $user, time()- 3600, '/');
echo "<script > 
        alert('Logout Successful');
        window.onbeforeunload;
        setTimeout(() => { window.location.replace('../Login/login.html') }, 0);
    </script> ";
?>