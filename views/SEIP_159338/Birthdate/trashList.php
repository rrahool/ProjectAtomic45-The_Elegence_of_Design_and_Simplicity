<?php
require_once "../../../vendor/autoload.php";
use App\Message\Message;
use App\Utility\Utility;
$objTrashlist= new \App\WareHouse\BirthdateStore();
$Trashes= $objTrashlist->trashList();
if(!isset($_SESSION)){
    session_start();
}
$msg = Message::getMessage();

$recordCount = count($Trashes);
if(isset($_REQUEST['Page'])){
    $page = $_REQUEST['Page'];
}else if(isset($_SESSION['Page'])){
    $page = $_SESSION['Page'];
}else{
    $page = 1;
}
$_SESSION['Page'] = $page;
if(isset($_REQUEST['trashDataPerPage'])){
    $DataPerPage = $_REQUEST['trashDataPerPage'];
}else if(isset($_SESSION['trashDataPerPage'])){
    $DataPerPage = $_SESSION['trashDataPerPage'];
}else{
    $DataPerPage = 3;
}
$_SESSION['trashDataPerPage'] = $DataPerPage;

$pages = ceil($recordCount/$DataPerPage);
$Data2view = $objTrashlist->trashPaginator($page, $DataPerPage);

$serial = (($page-1) * $DataPerPage) +1;
if($serial<0) $serial = 1;
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
        <li><a href="../Birthdate/Birthdate.php" title="Birth Date"><span class="glyphicon glyphicon-gift"></span></a></li>
    </ul>
</div>
<div class="container" style="margin-top: 80px">
    <?php
    if(!empty($msg)) {
        echo $msg;
    }
    ?>
    <h1>Trash list</h1>
    <table cellpadding="0" cellspacing="0">
        <tr class="titleHead">
            <th>Serial</th>
            <th>Entry ID</th>
            <th>Name</th>
            <th>Birth Date</th>
            <th>Action</th>
        </tr>
        <?php
        foreach ($Data2view as $Trash){
        ?>
        <tr>
            <td><?php echo $serial ?></td>
            <td><?php echo $Trash->id;?></td>
            <td><?php echo $Trash->user;?></td>
            <?php $birthStr = $Trash->birth; ?>
            <td><?php echo date("d-M-Y",strtotime($birthStr))?></td>
            <td class="act">
                <a href='restore.php?id=<?php echo $Trash->id ?>' class='btn btn-success' title="Restore"><span class="glyphicon glyphicon-share-alt"></span></a>
                <a href='' type="button" data-toggle="modal" data-target="#pop<?php echo $serial?>" class="btn btn-danger" title="Delete"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
        <div class="modal fade" id="pop<?php echo $serial?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <button type="button" class="close closer" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span></button>
                    <p class="lead nomargin">Delete Permanently?</p>
                    <a href='delete.php?id=<?php echo $Trash->id ?>' class="btn btn-warning btn-block">Yes</a>
                </div>
            </div>
            <?php
            $serial++;
            }  ?>
    </table>

    <select  class="form-control"  name="trashDataPerPage" id="trashDataPerPage" onchange="javascript:location.href = this.value;" >
        <?php
        if($DataPerPage==3 ) echo '<option value="?trashDataPerPage=3" selected >Showing 3 Books each page</option>';
        else echo '<option  value="?trashDataPerPage=3">3 Books each page</option>';

        if($DataPerPage==4 )  echo '<option  value="?trashDataPerPage=4" selected >Showing 4 Books each page</option>';
        else  echo '<option  value="?trashDataPerPage=4">4 Books each page</option>';

        if($DataPerPage==5 )  echo '<option  value="?trashDataPerPage=5" selected >Showing 5 Books each page</option>';
        else echo '<option  value="?trashDataPerPage=5">5 Books each page</option>';

        if($DataPerPage==6 )  echo '<option  value="?trashDataPerPage=6" selected >Showing 6 Books each page</option>';
        else echo '<option  value="?trashDataPerPage=6">6 Books each page</option>';

        if($DataPerPage==7 )   echo '<option  value="?trashDataPerPage=7" selected >Showing 7 Books each page</option>';
        else echo '<option  value="?trashDataPerPage=7">7 Books each page</option>';

        if($DataPerPage==8 )  echo '<option  value="?trashDataPerPage=8" selected >Showing 8 Books each page</option>';
        else    echo '<option  value="?trashDataPerPage=8">8 Books each page</option>';
        ?>
    </select>

    <div  class="container">
        <ul class="pagination pagination-override">

            <?php

            $pageMinusOne  = $page-1;
            $pagePlusOne  = $page+1;

            if($page>$pages) Utility::redirect("trashList.php?Page=$pages");
            if($pages == 0 || $page == 0)$page=1;
            if($page>1)  echo "<li><a href='?Page=$pageMinusOne'>" . "<span class='glyphicon glyphicon-chevron-left'></span>" . "</a></li>";
            for($i=1;$i<=$pages;$i++)
            {
                if($i==$page) echo '<li class="active"><a href="">'. $i . '</a></li>';
                else  echo "<li><a href='?Page=$i'>". $i . '</a></li>';

            }
            if($page<$pages) echo "<li><a href='?Page=$pagePlusOne'>" . "<span class='glyphicon glyphicon-chevron-right'></span>" . "</a></li>";

            ?>
        </ul>
    </div>

</div>
</body>

<script src="../../../resource/bootstrap/js/jquery-1.11.1.min.js"></script>
<script src="../../../resource/bootstrap/js/bootstrap.js"></script>
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

        $('.yes').fadeOut (700);
        $('.yes').fadeIn (700);
        $('.yes').fadeOut (700);
        $('.yes').fadeIn (700);
        $('.yes').fadeOut (700);

        $('.no').fadeOut (700);
        $('.no').fadeIn (700);
        $('.no').fadeOut (700);
        $('.no').fadeIn (700);
        $('.no').fadeOut (700);
    })
</script>
</html>