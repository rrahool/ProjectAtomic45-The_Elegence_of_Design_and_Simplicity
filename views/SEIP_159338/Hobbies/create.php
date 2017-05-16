<?php
require_once("../../../vendor/autoload.php");
use App\Message\Message;
if(!isset($_SESSION)){
    session_start();
}
$msg = Message::getMessage();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/CSS/style.css">
    <title>Document</title>
</head>
<body>
<div class="nav">
    <ul>
        <li><a href="../BookTitle/create.php" title="Add Book"><span class="glyphicon glyphicon-plus-sign"></span></a></li>
        <li><a href="../BookTitle/BookList.php" title="Book List"><span class="glyphicon glyphicon-book"></span></a></li>
        <li><a href="../City/City.php" title="City"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="../Email/Email.php" title="Email"><span class="glyphicon glyphicon-send"></span></a></li>
        <li><a href="../Gender/Gender.php" title="Gender"><span class="glyphicon glyphicon-user"></span></a></li>
        <li><a href="../Hobbies/Hobbies.php" title="Hobbies"><span class="glyphicon glyphicon-heart"></span></a></li>
        <li><a href="../ProfilePic/ProPic.php" title="Picture"><span class="glyphicon glyphicon-camera"></span></a></li>
        <li><a href="../Summary/Summary.php" title="Summary"><span class="glyphicon glyphicon-comment"></span></a></li>
        <li><a href="../Birthdate/Birthdate.php" title="Birth Date"><span class="glyphicon glyphicon-gift"></span></a></li>
    </ul>
</div>

<div class="opt-nav">
    <ul>
        <li><a href="../Birthdate/create.php">Add Birthdate</a></li>
        <li><a href="../BookTitle/create.php">Add Book</a></li>
        <li><a href="../City/create.php">Add City</a></li>
        <li><a href="../Email/create.php">Add Email</a></li>
        <li><a href="../Gender/create.php">Add Gender</a></li>
        <li><a href="../Hobbies/create.php">Add Hobbies</a></li>
        <li><a href="../ProfilePic/create.php">Add Picture</a></li>
        <li><a href="../Summary/create.php">Add Summary</a></li>
    </ul>
</div>
<form action="process.php" method="post">
    <h2>Hobbies</h2>
    <?php
    if(!empty($msg)) {
        echo "<div id='message'> $msg </div>";
    }
    ?>
    <label>Select your Hobbies</label><br>
    <input type="checkbox" name="hob[]" value="Work Out">  Workout<br>
    <input type="checkbox" name="hob[]" value="Reading">  Reading<br>
    <input type="checkbox" name="hob[]" value="Writing">  Writing<br>
    <input type="checkbox" name="hob[]" value="Drawing">  Drawing<br>
    <input type="checkbox" name="hob[]" value="Gardenning">  Gardenning<br><br>
    <input type="submit" value="Submit">
</form>
</body>

<script src="../../../resource/bootstrap/js/jquery-1.11.1.min.js"></script>
<script>
    jQuery(function($) {
        $('#message').fadeOut (700);
        $('#message').fadeIn (700);
        $('#message').fadeOut (700);
        $('#message').fadeIn (700);
        $('#message').fadeOut (700);
    })
</script>
</html>