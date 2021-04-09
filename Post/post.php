<?php

require_once('../admin/db/connect.php');
$db = new Database;
$address='';
$price =0;
$quantity=0;
    $category = 'Indoor plants';
if (isset($_POST['huyen']))
    $address.=  $_POST['huyen'];

if (isset($_POST['quan']))
    $address.=  $_POST['quan'];

if (isset($_POST['cate1']))
    $category = 'Indoor plants';
if (isset($_POST['cate2']))
    $category =   'Garden plants';

if (isset($_POST['cate3']))
    $category =  'Bonsai air';


if (isset($_POST['cate4']))
    $category =  'Post jar';

    if (isset($_POST['price']))
    $price =   $_POST['price'];


if (isset($_POST['quantity']))
    $quantity =   $_POST['quantity'];


if (isset($_POST['content']))
    $content =   $_POST['content'];



    if(isset($_FILES['image'])){
     
        $errors= array();
        $file_name = $_FILES['image']['name'];
       // $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        //$file_type=$_FILES['image']['type'];
        //$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        // $expensions= array("jpeg","jpg","png");
  
        // if(in_array($file_ext,$expensions)=== false){
        //    $errors[]="Không chấp nhận định dạng ảnh có đuôi này, mời bạn chọn JPEG hoặc PNG.";
        // }
  
        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"../Home/image/".$file_name);

           $sql="select id from category where title='$category'";
           $db->query($sql);
            $row=$db->fetchArray();
            $id=$row['id'];
           $sql= "insert into product(name,summary,price,quantity,categoryId)
           values('$content','$address','$price','$quantity','$id')";
           $db->query($sql);
           $sql= "insert into image(image) values('../Home/image/$file_name')";
           $db->query($sql);
       
           $sql= "select max(id) as id from image ";
           $db->query($sql);
           $idimg=$db->fetchArray()['id'];
           $sql= "select max(id) as id from product ";
           $db->query($sql);
           $idpro=$db->fetchArray()['id'];  
           $sql= "insert into product_image(id_product,id_image  ) values('$idpro','$idimg')";
           echo "<script>alert('Dang Thanh Cong')</script>";

       // header('location:../Home/home.php');
           
        }
    
    }


?>

