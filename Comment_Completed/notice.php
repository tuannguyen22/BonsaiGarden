<?php 
error_reporting(0);
    include('connect.php');
    include('Add_List_Product_Like_New/Comment_Completed/index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Notification</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php 
    $a = 0;
    if(isset($_POST['add'])){
        $a = $a +1;
    }

    $sql = "SELECT * FROM comments";
      $result = mysqli_query($conn, $sql);
      $list = [];
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $list[] = $row; 
        }
    }

    foreach($list as $notice){
      $parent_comment_id = $notice['parent_comment_id'];
      $comment = $notice['comment'];
      $comment_sender_name = $notice['comment_sender_name'];
      $date = $notice['date'];

    }
    
   
?>

    <div class="container">
    <!-- Button to Open the Modal -->
        <button type="button" style="border: none; background: none" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-bell" style="font-size:26px;color:green"></i><?php echo $a ?>
        </button>

    <!-- The Modal -->
        <?php 
        
            echo '
            <div class="modal" id="myModal">
            <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h1 class="modal-title">Notifications</h1>
                <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h3></h3>
                    <p><div>'.$comment_sender_name.' A added a new comment</div><div>'.$date.'</div></p>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                
            </div>
            </div>
        </div>
            '
        
        ?>
    
    </div>
</body>
</html>
