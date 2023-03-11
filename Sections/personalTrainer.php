<?php
require_once '../config.php';
require_once '../'.methods;
$mysqli = require_once '../'.DB;
?>

<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal-Trainer</title>
    <link rel="stylesheet" href="main.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="section-a" id="Exercise">
    <div class="container">
        <div class="box-a">
            <div class="content">
                <div class="left-box">
                    <h1 style="padding-top: 35px;padding-bottom: 15px;">What do you need from a personal trainer ?</h1>
                    <video controls muted loop width="1000px"  >
                        <source src="../CSS/videos/How%20to%20Find%20the%20Right%20Personal%20Trainer%20(for%20You).mp4" type="video/mp4">
                        <track src="" kind="subtitles" label="english">
                    </video>
                    <p style="padding-top: 10px;color: #00000085;font-size:15px;">
                        As Coach Matt explains in the video above, the first question you need to ask when hiring a personal trainer: do they match up with your goals?
                        And yep, that means we’re going to have to pick some goals in the first place!
                        So start by picking your goals and then determine if the trainer you’re paired up with is the right fit for you. Like dating, you can meet somebody who’s amazing but not right for you.

                        If somebody is a competitive marathon runner, they might not be a great powerlifting coach, and vice versa.

                        So, start with your goals for finding a personal trainer:

                        Are you trying to lose 300 pounds? 20 pounds? Get to 10% body fat?
                        Are you trying to get stronger or hold your first handstand?
                        Do you want to become a competitive powerlifter?
                        Are you looking to run your first 5k?
                        Do you just want to get in shape, feel better, and enjoy exercise?
                        These goals will largely determine the type of trainer you’re looking for.

                        MISTAKE #1: Not making sure your trainer has expertise in the area you want to train in.

                        Expertise in one area does not necessarily make them a good fit in another!

                        After that, you’ll want to think about what you NEED from your personal trainer:

                        Are you looking for a powerlifting coach to show you the basics (squat, deadlift, bench) so your form is right? Just a few sessions up front and a few later down the line to confirm you’re on the right path might suffice.
                        Are you new to working out or looking to kick - start your first 2 months of training with 2 sessions per week to keep you disciplined?
                        What type of person are you? Do you need more hands-on guidance throughout your workouts, or more space to take ownership and thrive on your own? Do you need somebody who will cheer you on or do you need tough love from somebody to call you on your bullshit?
                        Once you set proper expectations with what you want and how long you need a trainer for, then you can pick out one that hopefully will work for you.
                        <img src="../CSS/image/personal-trainer-stretch-713x535.jpg" style="margin-bottom: 15px;width: 1300px" alt="Sorry">

                   <?php if( isset($_SESSION['email']) && !empty($_SESSION['email'])){

                   ?>
                    <a onclick="if(!confirm('Do you want to a personal-Trainer now ?'))return false;"
                       href="<?php echo register."registerPersonal-trainer.php"?>">
                        <button type="button" class="btn btn-danger btn-lg" style="width: 1300px;margin-bottom: 35px;">Register for Personal-Trainer now</button><a>
                   <?php }else{?>
                    <P>If you want a personal trainer you should subscribe first in gym click this link to subscribe
                        <a href="<?php echo register."logingym.php"?>">click her</a></P>
                    <?php }?>
            </div>
        </div>
</body>
</html>
