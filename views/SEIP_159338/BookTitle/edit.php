<?php
require_once("../../../vendor/autoload.php");

use App\Message\Message;

if(!isset($_SESSION)){
    session_start();
}
$msg = Message::getMessage();

$objBookEdit= new \App\WareHouse\BookStore();
$objBookEdit-> setdata($_REQUEST);
$BookData= $objBookEdit->view();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,700,700i" rel="stylesheet">
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
<form action="update.php" method="post">
    <h2>EDIT</h2>
    <?php
    if(!empty($msg)) {
        echo "<div id='message'> $msg </div>";
    }
    ?>
    <label>Book Title</label><br>
    <input type="text" placeholder="Book Title" name="bookTitle" value="<?php echo $BookData->bookTitle; ?>"><br>
    <label>Author Name</label><br>
    <input type="text" placeholder="Author" name="authorName" value="<?php echo $BookData->authorName ?>"><br><br>
    <input type="hidden" name="id" value="<?php echo $BookData->id ?>">
    <input type="submit" value="submit">
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