<?php
setcookie('user', $user, time()- 3600, '/');
echo "<script > 
        alert('Logout Successful');
        setTimeout(() => { window.location.replace('http://localhost/Bonsai_Garden/Login/login.html') }, 0);
    </script> ";
?>