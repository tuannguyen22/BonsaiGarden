<?php
require_once ("connect.php");
$commentId = isset($_POST['comment_id']) ? $_POST['comment_id'] : "";
$comment = isset($_POST['comment']) ? $_POST['comment'] : "";
$commentSenderName = isset($_POST['userName']) ? $_POST['userName'] : "";
$date = date('Y-m-d H:i:s');

$sql = "INSERT INTO comments(parent_comment_id,comment,comment_sender_name,date) VALUES (' $commentId',' $comment','$commentSenderName',' $date')";

$result = mysqli_query($conn, $sql);



if (! $result) {
    $result = mysqli_error($conn);
}
echo $result;
?>
