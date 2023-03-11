<?php
require_once "config.php";
if (isset($_SESSION['visitor']) || isset($_SESSION['email']))
{
    if (isset($_SESSION['visitor']))
    {
        $visitor = $_SESSION['visitor'];
    }
}
else
{
    header("location:".login);
}
require_once methods;
$mysqli = require_once DB;
?>

<?php

if(isset($_POST['submit']))
{
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $text = filter_text('text');
    if(checkEmpty($text))
    {
        $sql = "INSERT INTO comment (comment_name, comment_text, comment_email) VALUES (?, ?, ?)";
        $stmt = $mysqli->stmt_init();
        if(!$stmt->prepare($sql))
        {
            die("SQL Error : ".$mysqli->error);
        }
        $stmt->bind_param('sss',$name, $text, $email);

        if(!$stmt->execute())
        {
            die("Error : " .$mysqli->error." ".$mysqli->errno);
        }
        $success_msg = 'Success';
        $_SESSION['comment'] = $text;
        header("location:".MainPage."?id=".$id."&name=".$name);
    }
    else
    {
        $error_msg = 'You must write a comment';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css.map">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&family=Open+Sans:wght@400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Fit Gym</title>
</head>
<style>
    /*.header {*/
    /*    height: 100vh;*/
    /*    background-image: url(CSS/image/);*/
    /*    background-size: cover;*/
    /*    background-position: center;*/
    /*}*/
</style>
<body>
<!-- Start Header  -->
<header class="header" id="Home">
    <nav class="navbar navbar-expand-lg  ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="image" src="CSS/image/logo-white.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#Home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#Exercise">Exercise</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#Services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#About">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#Review">Review</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#Contact Us">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" onclick="if(!confirm('Do you want to a logout ?'))return false;"
                           aria-current="page" href="<?php echo logout?>">Logout</a>
                    </li>
                </ul>
                <div class="form">
                    <i class="fas fa-search"></i>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- End Header  -->
<!-- Start Section-a  -->
<div class="section-a" id="Exercise">
    <div class="container">
        <div class="title">
            <p>Exercise</p>
        </div>
        <div class="box-a">
            <div class="content">
                <div class="left-box">
                    <img src="CSS/image/Workout-pana.png" alt="">
                </div>
                <div class="right-box">
                    <h3>Knowledge, Skills & Hard Work</h3>
                    <p>How to Find a Good Personal Trainer or Coach:
                        Before you fork out some cash for a personal trainer, click this button!
                        It’ll help you spot the difference between a bad personal trainer and an AMAZING trainer.
                        And trust us, having the right trainer can make ALL the difference in the world.!</p>

                    <!--                     inter the page of personal-Trainer-->
                    <a onclick="if(!confirm('Do you want to a personal-Trainer ?'))return false;"
                       href="<?php echo sections."personalTrainer.php"?>">
                        <button type="button" class="btn btn-danger btn-lg">Personal-Trainer</button></a>
                </div>
            </div>
        </div>
        <div class="box-b">
            <div class="content-b">
                <div class="left-box-b">
                    <h3>Work Hard In Silence</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim eius consectetur, id totam quae illo distinctio quis incidunt explicabo harum. Adipisci voluptas in beatae. Distinctio ipsam provident eos quidem aliquam?</p>
                    <button type="button" class="btn btn-danger btn-lg">More Videos</button>
                </div>
                <div class="right-box-b">
                    <video controls muted loop >
                        <source src="CSS/image/ONE LIFE 🥺 FEMALE FITNESS MOTIVATION.mp4" type="video/mp4">
                        <track src="" kind="subtitles" label="english">
                    </video>
                </div>
            </div>
        </div>
        <div class="box-c">
            <div class="content-c">
                <div class="left-box-c">
                    <img src="CSS/image/33.jpeg" class="po" alt="">
                </div>
                <div class="right-box-c">
                    <h3>Healthy Food</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti adipisci ex repellendus modi nam alias quasi! Cumque, laborum molestiae natus quis vitae placeat est nemo vero ipsa harum maiores et</p>
                    <button type="button" class="btn btn-danger btn-lg">Healthy Page</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Section-a  -->
<!-- Start Services  -->
<div class="services" id="Services">
    <div class="container">
        <div class="ser">
            <p>Services</p>
        </div>
        <div class="row">
            <div class="content">
                <div class="col-a">
                    <img src="CSS/image/gym.png" alt="">
                    <h4>Gym</h4>
                    <p>It is a known fact that regular exercise benefits your health, mind, and body. It boosts your energy, increases lean muscle mass,</p>
                </div>
                <div class="col-b">
                    <img src="CSS/image/mma.png" alt="">
                    <h4>MMA</h4>
                    <p>MMA Learning mixed martial arts can serve as a form of destructive therapy. Studies show that taking out your anger or frustration on inanimate objects helps to lower frustration and stress.</p>
                </div>
                <div class="col-c">
                    <img src="CSS/image/boxing.png" alt="">
                    <h4>Boxing</h4>
                    <p>Boxing is a combat sport that has been practiced since before the time of ancient Greece and the original Olympics. It has been used to train people for performance in the art of striking,</p>
                </div>
            </div>
            <?php if (isset($_SESSION['visitor'])){?>
            <h2 style="margin-top: 30px;font-style: italic;font-weight: bold;color: #c85817b5">DO you want login in the gym ?</h2>
            <a onclick="if(!confirm('Do you want to a login gym ?'))return false;"
               href="<?php echo signup?>">
                <button type="button" class="btn btn-dark btn-lg" style="width: 1000px;margin-bottom: 35px;margin-top: 30px;border-radius: 15px" >
                    <h4 style="letter-spacing: 5px">
                        Login
                    </h4></button></a>
            <?php };?>

            <?php if (isset($_SESSION['email'])){?>
                <h1 style="text-align: center; color: #ca6217;margin-bottom: -12px;">Welcome <?php echo $_SESSION['name'];?></h1>
                <p style="text-align: center;color: silver;letter-spacing: 4px;">You are register in <?php echo $_SESSION['sport']?></p>
            <?php };?>

        </div>
    </div>
</div>
<!-- End Services  -->
<!-- Start About  -->
<div class="about" id="About">
    <div class="container">
        <div class="box-c">
            <div class="content">
                <div class="left-box">
                    <img src="CSS/image/feature.png" alt="">
                </div>
                <div class="right-box">
                    <div class="feature-box">
                        <i class="fa-solid fa-trophy"></i>
                        <h4>Certified Trainers</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus labore alias enim. Neque consequuntur eaque a quo, tenetur doloribus debitis voluptates nobis in hic vel ducimus unde esse, beatae atque!</p>
                    </div>
                    <div class="feature-box">
                        <i class="fa-solid fa-heart"></i>
                        <h4>Healthy</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus labore alias enim. Neque consequuntur eaque a quo, tenetur doloribus debitis voluptates nobis in hic vel ducimus unde esse, beatae atque!</p>
                    </div>
                    <div class="feature-box">
                        <i class="fa-solid fa-stopwatch-20"></i>
                        <h4>Flexible Time</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus labore alias enim. Neque consequuntur eaque a quo, tenetur doloribus debitis voluptates nobis in hic vel ducimus unde esse, beatae atque!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End About -->

<!-- Start Testimonials  -->
<div id="Review" class="TESTMONALS">
    <div class="container">
        <div class="text-logo">
            <p class="text-logoo">TESTMONALS</p>
            <h1>What Client Say</h1>
        </div>
        <div class="TESTMONALS-row">
            <?php
            //                if (isset($_SESSION['comment'])){
            $sql = "SELECT * FROM comment";
            $result = mysqli_query($mysqli, $sql);
            while ($row=mysqli_fetch_array($result))
            {
                ?>
            <div class="TESTMONALS-col">
                    <div class="user">
                        <img src="CSS/image/icons8-user-50.png" alt="failed">
                        <div class="user-info">
                            <h4><?php echo $row['comment_name']?> <img src="CSS/image/icons8-dumbbell-48.png" alt="failed"></h4>
                            <small><?php echo $row['comment_email']?></small></div>
                    </div>
                    <p><?php echo $row['comment_text']?></p>
                <p style="text-align: right;color: #383d41"><?php echo $row['comment_time']?></p>
            </div>
                <?php }?>
        </div>

        <div class="comment">
            <div class="title">
                <h3>Add a comment....</h3>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">ALL comments</label>
            </div>
            <!--if any fields is empty show this msg -->
            <?php if(isset($error_msg)){ ?>
            <div class="">
                <h3 class="alert alert-danger text-center"> <?php echo $error_msg; ?> <?php }?> </h3>

                <?php if(isset($success_msg)){ ?>
                <div class="">
                    <h3 class="alert alert-success text-center"> <?php echo $success_msg; ?> <?php }?> </h3>

                    <form method="post" enctype="application/x-www-form-urlencoded">
                        <?php if(isset($_SESSION['name']) && !empty($_SESSION['name'])){?>
                            <div class="send-comment">
                                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Comment.." rows="3" name="text"></textarea>
                                <input class="btn" style="background: #fd7e14;border-radius: 15px;color: white;margin-top: 15px"
                                              type="submit" name="submit">
                            </div>
                        <?php }else{?>
                            <P>If you want to write a comment you should subscribe first in gym click this link to subscribe
                                <a href="<?php echo signup?>">click her</a></P>
                        <?php }?>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Testimonials  -->
        <!-- Start Footer -->
        <footer class="footer" id="Contact Us">
            <div class="container">
                <div class="conct">
                    <p>Contact Us</p>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <img src="CSS/image/logo.png" alt="">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, ipsum saepe? Tempora, exercitationem! Minima, natus cumque! Expedita cupiditate vel, consequatur corrupti delectus excepturi inventore eum? Ipsa temporibus consequuntur odio totam.</p>
                    </div>
                    <div class="col-md-3">
                        <h1>Features</h1>
                        <p><i class="fa-solid fa-trophy"></i> Certified Trainers</p>
                        <p><i class="fa-solid fa-heart"></i> Healthy</p>
                        <p><i class="fa-solid fa-stopwatch-20"></i> Flexible Time</p>
                        <p>30 Day Free trainer</p>
                    </div>
                    <div class="col-md-3">
                        <h1>Quick Contact</h1>
                        <p><i class="fa-solid fa-phone"></i> +01019256553</p>
                        <p><i class="fa-solid fa-envelope"></i> yousifhakel50@gmail.com</i></p>
                        <p><i class="fa-solid fa-house-chimney"></i> Elgmhorya Street</i></p>
                        <p><i class="fa-solid fa-face-smile-hearts"></i> Contact me now</p>
                    </div>
                    <div class="col-md-3">
                        <h1>Social Media</h1>
                        <p><i class="fa-brands fa-twitter"></i> Twitter</i></p>
                        <p><i class="fa-brands fa-instagram"></i> Instagram</i></p>
                        <p><i class="fa-brands fa-facebook"></i> Facebook</i></p>
                        <p>Contact me now</p>
                    </div>
                </div>
                <hr>
                <p class="jo">Made With <i class="fa-solid fa-heart"></i> By Yousif Heikal</i></p>
            </div>
        </footer>
        <!-- End Footer -->

</body>
</html>
