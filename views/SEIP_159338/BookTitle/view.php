<?php
require_once "../../../vendor/autoload.php";
$objBookView= new\App\WareHouse\BookStore();
$objBookView->setdata($_GET);
$BookView = $objBookView-> view();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="../../../resource/CSS/style.css">
    <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
        <li><a href="../Birthdate/create.php" title="Birth Date"><span class="glyphicon glyphicon-gift"></span></a></li>
    </ul>
</div>
<div class="container view">
    <h1><?php echo $BookView->bookTitle ?></h1>
    <table cellpadding="0" cellspacing="0">
        <tr class="titleHead">
            <th>Book ID</th>
            <th>Author</th>
            <th>Edit</th>
        </tr>
        <tr>
            <td><?php echo $BookView->id ?></td>
            <td><?php echo $BookView->authorName ?></td>
            <td class="act"><a href='edit.php?id=<?php echo $BookView->id ?>' class='btn btn-primary btn-block'><span class="glyphicon glyphicon-pencil"></span></a></td>
        </tr>
    </table>
</div>
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