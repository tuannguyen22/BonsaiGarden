<?php
    include('../Database/connect.php');
    
    if ($_REQUEST['id']) {
        $id = $_REQUEST['id'];
        $sql = "DELETE FROM cart_item where id=" . $id;
        if ($conn->query($sql) === TRUE) {
            echo "Dữ liệu đã được xóa";
        } else {
            echo "Lỗi delete: " . $connect->error;
        }
    }
    header("location:http://localhost/Bonsai_Garden/cart/cart.php");
?>