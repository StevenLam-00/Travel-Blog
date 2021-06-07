<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create a New Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Travel Blog/blog-php-mysql/assets/css/resetPass.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="" method="POST" autocomplete="off">
                    <h2 class="text-center">New Password</h2>
                    <div class="alert alert-success text-center"> Enter new password.</div>
                    <?php
                    include("config.php");

                    if (!isset($_GET["code"])) { ?>
                        <div class="alert alert-danger text-center">Cannot find page !
                        </div>
                    <?php
                        exit();
                    }

                    $code = $_GET["code"];

                    $getEmailQuery = mysqli_query($con, "SELECT email FROM resetPassword WHERE code = '$code'");

                    //No row found
                    if (mysqli_num_rows($getEmailQuery) == 0) { ?>
                        <div class="alert alert-danger text-center">No data found! Check again.
                        </div>
                        <?php
                        exit();
                    }

                    if (isset($_POST["password"])) {
                        $pw = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        //encryption
                        //$pw = password_hash($pw);

                        $row = mysqli_fetch_array($getEmailQuery);
                        $email = $row["email"];

                        //Update password
                        $query = mysqli_query($con, "UPDATE users SET password='$pw' WHERE email= '$email'");

                        //Delete request from table resetPassword
                        if ($query) {
                            $query = mysqli_query($con, "DELETE FROM resetPassword WHERE code ='$code'"); ?>
                            <div class="alert alert-success text-center"> Password has been updated successfully !
                            </div>
                            <?php
                            exit(); ?>
                        <?php
                        } else { ?>
                            <div class="alert alert-danger text-center"> Something went wrong !
                            </div>
                    <?php
                            exit();
                        }
                    }

                    ?>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Enter new password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change-password" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<!--
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a New Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Web-Application-Project/Css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="" method="POST" autocomplete="off">
                    <h2 class="text-center">New Password</h2>
                    <div class="alert alert-success text-center"> Enter new password.</div>
                    <?php
                    /*    include ("config.php");

                    if(!isset($_GET["code"])){
                        exit("Cannot find page !");
                    }

                    $code = $_GET["code"];

                    $getEmailQuery = mysqli_query ($con, "SELECT email FROM resetPassword WHERE code = '$code'");

                    //No row found
                    if(mysqli_num_rows($getEmailQuery) == 0){
                        exit("Cannot find page !");
                    }

                    if(isset($_POST["pass"])){
                        $pw = $_POST["pass"];
                        //encryption
                        $pw = md5($pw);

                        $row = mysqli_fetch_array($getEmailQuery);
                        $email = $row["email"];

                        //Update password
                        $query = mysqli_query($con, "UPDATE account SET pass='$pw' WHERE email= '$email'");

                        //Delete request from table resetPassword
                        if ($query){
                            $query = mysqli_query($con, "DELETE FROM resetPassword WHERE code ='$code'");
                            exit("Password has been updated successfully !");
                        } else {
                            exit("Something went wrong !");
                        }
                    } */

                    ?>
                    <div class="form-group">
                        <input class="form-control" type="password" name="pass" placeholder="Enter new password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change-password" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html> -->