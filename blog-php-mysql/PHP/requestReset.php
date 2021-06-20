<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Travel Blog/blog-php-mysql/assets/css/resetPass.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="" method="POST" autocomplete="">
                    <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">Enter your email address</p>
                    <?php
                    //Import PHPMailer classes into the global namespace
                    //These must be at the top of your script, not inside a function
                    use PHPMailer\PHPMailer\PHPMailer;
                    use PHPMailer\PHPMailer\Exception;

                    require 'PHPMailer/src/Exception.php';
                    require 'PHPMailer/src/PHPMailer.php';
                    require 'PHPMailer/src/SMTP.php';
                    require 'config.php';

                    if (isset($_POST["email"])) {

                        $emailTo = $_POST["email"];

                        $code = uniqid(true);

                        $query = mysqli_query($con, "INSERT INTO resetPassword (code, email) VALUES ('$code','$emailTo')");
                        if (!$query) {
                            exit("Error");
                        }
                        //Instantiation and passing `true` enables exceptions
                        $mail = new PHPMailer(true);

                        try {
                            //Server settings
                            $mail->isSMTP();                                            //Send using SMTP
                            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                            $mail->Username   = 'khuukhonlam@gmail.com';                     //SMTP username
                            $mail->Password   = '************';                               //SMTP password
                            // Ref at: https://www.lifewire.com/what-are-the-gmail-smtp-settings-1170854
                            $mail->SMTPSecure = ssl;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                            $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                            //Recipients
                            $mail->setFrom('khuukhonlam@gmail.com', 'Lam Khuu');
                            $mail->addAddress("$emailTo");     //Add a recipient, Name is optional
                            $mail->addReplyTo('no-apply@gmail.com', 'No Reply');
                            // $mail->addCC('cc@example.com');
                            // $mail->addBCC('bcc@example.com');
                            /*
                                //Attachments
                                $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                                $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                            */

                            //Content
                            $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword.php?code=$code";
                            $mail->isHTML(true);                                  //Set email format to HTML
                            $mail->Subject = 'Your password reset link';
                            $mail->Body    = "<h1>You requested a password reset</h1>
                                                    Click this link <a href= '$url'>This link</a> to update password";
                            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                            $mail->send(); ?>
                            <div class="alert alert-success text-center">Reset password link has been sent to your email.
                            </div>
                            <div class="link login-link text-center"><a href="/Blog Source Code copy/blog-php-mysql/login.php">Login again here</a></div>

                    <?php
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
                        exit();
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Enter email address" required value="">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-email" value="Continue">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>