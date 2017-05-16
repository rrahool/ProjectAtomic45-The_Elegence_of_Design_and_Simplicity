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
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/CSS/style.css">
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
        <li><a href="create.php">Add Book</a></li>
        <li><a href="../City/create.php">Add City</a></li>
        <li><a href="../Email/create.php">Add Email</a></li>
        <li><a href="../Gender/create.php">Add Gender</a></li>
        <li><a href="../Hobbies/create.php">Add Hobbies</a></li>
        <li><a href="../ProfilePic/create.php">Add Picture</a></li>
        <li><a href="../Summary/create.php">Add Summary</a></li>
    </ul>
</div>
<form action="process.php" method="post">
    <h2>Add to library</h2>
    <?php
    if(!empty($msg)) {
        echo $msg;
    }
    ?>
    <label>Book Title</label><br>
    <input type="text" placeholder="Book Title" name="bookTitle"><br>
    <label>Author Name</label><br>
    <input type="text" placeholder="Author" name="authorName"><br>
    <input type="submit" value="submit">
</form>
</body>
<script src="../../../resource/bootstrap/js/jquery-1.11.1.min.js"></script>
<script>
    jQuery(function($) {
        $('.success').fadeOut (700);
        $('.success').fadeIn (700);
        $('.success').fadeOut (700);
        $('.success').fadeIn (700);
        $('.success').fadeOut (700);

        $('.error').fadeOut (700);
        $('.error').fadeIn (700);
        $('.error').fadeOut (700);
        $('.error').fadeIn (700);
        $('.error').fadeOut (700);
    })
</script>
</html>