<html>
    <body>
    <?php
    session_start();
    require_once 'connect.php';
    use PHPMailer\PHPMailer\PHPMailer;
        ini_set("display_errors",0);

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
        require_once "../Email/PHPMailer.php";
        require_once "../Email/Exception.php";
        require_once "../Email/SMTP.php";
        require_once "../Email/OAuth.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "hothihuongsen21042001@gmail.com"; 
        $mail->Password = 'hothiminhthuy1107vlqt@'; 
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";


        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom('hothihuongsen21042001@gmail.com','Bonsai Shop');
        $mail->addAddress($email);
        $mail->Subject = ("THANKS YOU SO MUCH");
        $mail->Body = " <h3> Order Success </h3>
                            ";
        
        if ($mail->send()) {
            $status = "Success";
            $response="";

            header("http://localhost/PHP/Search/home.php");
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
        exit(json_encode(array("status" => $status, "response" => $response)));
    }
    ?>

    </body>

</html>
