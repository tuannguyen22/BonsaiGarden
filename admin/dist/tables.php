<?php

require '../api/user.php';
require '../api/product.php';

        if($_SERVER['PATH_INFO'] =='/user')
            $user = new User();    
        if($_SERVER['PATH_INFO'] =='/product')
            $product = new Product();    

            
            

?>