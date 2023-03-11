    <?php
require_once "../config.php";
require_once "../".methods;
$mysqli = require_once "../".DB;
?>

<?php

if(isset($_POST['submit']))
{
    // using filter from methods.php
    $sport = filter_text('sport');
    $email = filter_email('email');
    $name = filter_text('name');
    $pass = filter_text('password');
    $newPass = password_hash($pass,PASSWORD_DEFAULT);

    if(checkEmpty($email) && checkEmpty($name) && checkEmpty($pass) )
    {
        if(ValidateEmail($email))
        {
            $sql = "INSERT INTO register_gym (reg_sport, reg_email, reg_name, reg_pass) VALUES (?, ?, ?, ?)";
            $stmt = $mysqli->stmt_init();
            if(!$stmt->prepare($sql))
            {
                die("SQL Error : ".$mysqli->error);
            }
            $stmt->bind_param('ssss',$sport, $email, $name, $newPass);

            if(!$stmt->execute())
            {
                die("Error : " .$mysqli->error." ".$mysqli->errno);
            }
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            $_SESSION['pass'] = $newPass;
            sleep(0.9);
            header("location:".login);
        }
        else
        {
            $error_email = "Please check email and try again";
        }
    }
    else
    {
        $error_msg = "Please fill all fields";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="../CSS/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<!-- Start Services  -->
<div class="services" id="Services" style="height: 100vh">
    <div class="container">
        <div class="row">
            <div class="content">
                <div class="col-a">
                    <img src="../CSS/image/gym.png" alt="">
                    <h4>Gym</h4>
                    <p>It is a known fact that regular exercise benefits your health, mind, and body. It boosts your energy, increases lean muscle mass,</p>
                </div>
                <div class="col-b">
                    <img src="../CSS/image/mma.png" alt="">
                    <h4>MMA</h4>
                    <p>MMA Learning mixed martial arts can serve as a form of destructive therapy. Studies show that taking out your anger or frustration on inanimate objects helps to lower frustration and stress.</p>
                </div>
                <div class="col-c">
                    <img src="../CSS/image/boxing.png" alt="">
                    <h4>Boxing</h4>
                    <p>Boxing is a combat sport that has been practiced since before the time of ancient Greece and the original Olympics. It has been used to train people for performance in the art of striking,</p>
                </div>
            </div>
        </div>
        <h3 class="title-c">Choose your favorite sport</h3>
        <!--if any fields is empty show this msg -->
        <?php if(isset($error_msg)){ ?>
        <div class="">
            <h3 class="alert alert-danger text-center"> <?php echo $error_msg; ?> <?php }?> </h3>

        <?php if(isset($error_email)){ ?>
        <div class="">
            <h3 class="alert alert-danger text-center"> <?php echo $error_email; ?> <?php }?> </h3>

        <div class="submit">
            <form method="post" enctype="application/x-www-form-urlencoded">
                <select style="margin-bottom: 20px" class="form-select" aria-label="Default select example" name="sport">
                    <option selected value="gym" name="gym">gym</option>
                    <option value="mma" name="mma">mma</option>
                    <option value="boxing" name="boxing">boxing</option>
                </select>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="E-mail">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="name" minlength="10" maxlength="30" placeholder="Username">
                    <div id="nameHelp" class="form-text">You must name greater than 10 char.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" minlength="8" maxlength="20" placeholder="Password">
                    <div id="nameHelp" class="form-text">You must password equal or greater than 8 char.</div>
                </div>

                <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
