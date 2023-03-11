<?php
require_once "../config.php";
require_once '../'.methods;
$mysqli = require_once '../'.DB;
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="../CSS/style.css">
        <title>Login</title>
    </head>
    <body>

    <?php
    if (isset($_POST['visitor']))
    {
        $_SESSION['visitor'] = 'visitor';
        header('location:'.MainPage."?visitor");
    }
    if (isset($_POST['signup']))
    {
        header("location:".signup."?signup");
    }
    if (isset($_POST['submit'])) {

        $pass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_NUMBER_INT);

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        if (checkEmpty($pass) && checkEmpty($email))
            if (ValidateEmail($email)) {
                $sql = sprintf("SELECT * FROM register_gym
                                       WHERE reg_email='%s'",
                    $mysqli->real_escape_string($_POST["email"]));
                $result = $mysqli->query($sql);
                $user = $result->fetch_assoc();
                if ($user) {
                    if (password_verify($pass, $user['reg_pass'])) {
                        $_SESSION['email'] = $user['reg_email'];
                        $_SESSION['name'] = $user['reg_name'];
                        $_SESSION['id'] = $user['reg_id'];
                        $_SESSION['sport'] = $user['reg_sport'];

                        sleep(0.9);
                        header("location: http://localhost/jo/fitgym"."?id=".$_SESSION['id']."&name=".$_SESSION['name']);
                    } else {
                        $not_exist_email = 'Failed E-mail or password please try again ';
                    }
                } else {
                    $not_exist_email = 'Sorry this E-mail not exists ';
                }
            } else {
                $not_exist_email = 'Sorry this E-mail not exists ';
            }
        else {
            $error_msg = "Please fill all fields";
        }
    }
    ?>

    <div class="container">
        <div class="card" >

            <div class= 'login' style="text-align: center;margin-bottom: 15px;color: #607d8b">
                <h2>Login</h2>
            </div>

            <!--if data not inserted in Database-->
            <?php if(isset($error_msg)){ ?>
            <div class="">
                <h3 class="alert alert-danger text-center"> <?php echo $error_msg; ?> <?php }?> </h3>

                <?php if(isset($not_exist_email)){ ?>
                <div class="">
                    <h3 class="alert alert-danger text-center"> <?php echo $not_exist_email; ?> <?php }?>  </h3>

                    <div class= 'img_container'>
                        <img src="../CSS/image/images.png" alt="" />
                    </div>
                    <form method="post">

                        <label>
                            <input type="email" name="email" placeholder="E-mail">


                        </label>
                        <label>
                            <input type="password" name="password" placeholder="password" min= 10 max= 20>

                        </label>
                        <input class="register_button" name="submit" type="submit" value="Login" style="width: 120px;">
                        <input class="register_button" name="signup" type="submit" value="Sign up" style="width: 120px;margin-right: -37px;background: #212529">
                        <input class="register_button" name="visitor" type="submit" value="Visitor" style="background: #212529">
                    </form>
                </div>
    </body>
    </html>
