<?php
require_once "../../../vendor/autoload.php";
$objBooklist= new\App\WareHouse\BookStore();
$BookList = $objBooklist-> index();

use App\Message\Message;
use App\Utility\Utility;

if(!isset($_SESSION)){
    session_start();
}
$msg = Message::getMessage();

$recordCount = count($BookList);
if(isset($_REQUEST['Page'])){
    $page = $_REQUEST['Page'];
}else if(isset($_SESSION['Page'])){
    $page = $_SESSION['Page'];
}else{
    $page = 1;
}
$_SESSION['Page'] = $page;




if(isset($_REQUEST['DataPerPage'])){
    $DataPerPage = $_REQUEST['DataPerPage'];
}else if(isset($_SESSION['DataPerPage'])){
    $DataPerPage = $_SESSION['DataPerPage'];
}else{
    $DataPerPage = 3;
}
$_SESSION['DataPerPage'] = $DataPerPage;



$pages = ceil($recordCount/$DataPerPage);
$Data2view = $objBooklist->indexPaginator($page, $DataPerPage);
$serial = (($page-1) * $DataPerPage) +1;
if($serial<0) $serial=1;
################## search  block 1 of 5 start ##################
if(isset($_REQUEST['search']) )$Data2view =  $objBooklist->search($_REQUEST);
$availableKeywords=$objBooklist->getAllKeywords();
$comma_separated_keywords= '"'.implode('","',$availableKeywords).'"';

if(isset($_REQUEST['search']) ) {
    $Data2view = $objBooklist->search($_REQUEST);
    $serial = 1;
}

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
    <link rel="stylesheet" href="../../../resource/bootstrap/css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="../../../resource/font-awesome/css/font-awesome.min.css">
</head>
<body>
<!-- required for search, block 4 of 5 start -->


<form id="searchForm" action="BookList.php" class="searchForm"  method="get">
    <input type="text" value="" id="searchID" name="search" placeholder="Search" width="60" >
    <input type="checkbox"  name="byTitle"   checked> By Title
    <input type="checkbox"  name="byAuthor"  checked> By Author
    <input hidden type="submit" class="btn-primary" value="search">
</form>

<!-- required for search, block 4 of 5 end -->

<div class="nav">
    <ul>
        <li><a href="../BookTitle/create.php" title="Add"><span class="glyphicon glyphicon-plus-sign"></span></a></li>
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

<div class="dropdown dropdown-override">
    <button id="dLabel" type="button" class="btn btn-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Download
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu menu-override" aria-labelledby="dLabel">
        <li><a href="pdf.php" class="btn" role="button">As PDF</a></li>
        <li><a href="xl.php" class="btn" role="button">As XL</a></li>
    </ul>
</div>



<form action="trashmultiple.php" method="post" id="multiple">


    <div class="navbar">
            <button type="button" class="btn btn-danger" id="delete">Delete  Selected</button>
            <button type="submit" class="btn btn-warning">Trash Selected</button>
            <a href="email.php?list=1" class="btn btn-primary" role="button">Email Active List To A friend</a>
    </div>






<a href="trashList.php" class="trashLink"><span class="glyphicon glyphicon-trash"></span></a>
<div class="container">
    <?php
    if(!empty($msg)) {
       echo $msg;
    }
    ?>
    <h1>Book Store</h1>
    <table cellpadding="0" cellspacing="0">
        <tr class="titleHead">
            <th>All <label><input id="select_all" type="checkbox" value="select all"><span class="chk_lbl"></span></label></th>
            <th>Serial</th>
            <th>Book ID</th>
            <th>Book Title</th>
            <th>Author</th>
            <th>Action</th>
        </tr>
        <?php
        foreach ($Data2view as $Book){
            ?>
            <tr>
                <td style='padding-left: 6%'><input type='checkbox' class='checkbox' name='mark[]' value='<?php echo $Book->id ?>'></td>
                <td><?php echo $serial ?></td>
                <td><?php echo $Book->id;?></td>
                <td><?php echo $Book->bookTitle;?></td>
                <td><?php echo $Book->authorName;?></td>
                <td class="act">
                    <a href='view.php?id=<?php echo $Book->id ?>' class="btn btn-default" title="View"><span class="glyphicon glyphicon-eye-open"></span></a>
                    <a href='edit.php?id=<?php echo $Book->id ?>' class='btn btn-primary' title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href='trash.php?id=<?php echo $Book->id ?>' class='btn btn-warning' title="Trash"><span class="glyphicon glyphicon-trash"></span></a>
                    <a href='' type="button" data-toggle="modal" data-target="#pop<?php echo $serial?>" title="Delete" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                    <a href='email.php?id=<?php echo $Book->id ?>' class='btn btn-success' title="Mail"><span class="glyphicon glyphicon-envelope"></span></a>
                </td>
            </tr>
            <div class="modal fade" id="pop<?php echo $serial?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content ">
                    <button type="button" class="close closer" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="glyphicon glyphicon-remove-circle"></span></button>
                    <p class="lead nomargin">Delete Permanently?</p>
                    <a href='delete.php?id=<?php echo $Book->id ?>' class="btn btn-warning btn-block">Yes</a>
                </div>
            </div>
        <?php
        $serial++;
        }  ?>
    </table>


</form>


    <select  class="form-control"  name="DataPerPage" id="DataPerPage" onchange="javascript:location.href = this.value;" >
        <?php
        if($DataPerPage==3 ) echo '<option value="?DataPerPage=3" selected >Showing 3 Books each page</option>';
        else echo '<option  value="?DataPerPage=3">3 Books each page</option>';

        if($DataPerPage==4 )  echo '<option  value="?DataPerPage=4" selected >Showing 4 Books each page</option>';
        else  echo '<option  value="?DataPerPage=4">4 Books each page</option>';

        if($DataPerPage==5 )  echo '<option  value="?DataPerPage=5" selected >Showing 5 Books each page</option>';
        else echo '<option  value="?DataPerPage=5">5 Books each page</option>';

        if($DataPerPage==6 )  echo '<option  value="?DataPerPage=6" selected >Showing 6 Books each page</option>';
        else echo '<option  value="?DataPerPage=6">6 Books each page</option>';

        if($DataPerPage==7 )   echo '<option  value="?DataPerPage=7" selected >Showing 7 Books each page</option>';
        else echo '<option  value="?DataPerPage=7">7 Books each page</option>';

        if($DataPerPage==8 )  echo '<option  value="?DataPerPage=8" selected >Showing 8 Books each page</option>';
        else    echo '<option  value="?DataPerPage=8">8 Books each page</option>';
        ?>
    </select>

    <div  class="container">
        <ul class="pagination pagination-override">

            <?php
            $pageMinusOne  = $page-1;
            $pagePlusOne  = $page+1;

            if($page>$pages) Utility::redirect("BookList.php?Page=$pages");
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
<script src="../../../resource/bootstrap/js/jquery-ui.js"></script>
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
    $('#delete').on('click',function(){
        document.forms[1].action="deletemultiple.php";
        $('#multiple').submit();
    });



    //select all checkboxes
    $("#select_all").change(function(){  //"select all" change
        var status = this.checked; // "select all" checked status
        $('.checkbox').each(function(){ //iterate all listed checkbox items
            this.checked = status; //change ".checkbox" checked status
        });
    });

    $('.checkbox').change(function(){ //".checkbox" change
//uncheck "select all", if one of the listed checkbox item is unchecked
        if(this.checked == false){ //if this item is unchecked
            $("#select_all")[0].checked = false; //change "select all" checked status to false
        }

//check "select all" if all checkbox items are checked
        if ($('.checkbox:checked').length == $('.checkbox').length ){
            $("#select_all")[0].checked = true; //change "select all" checked status to true
        }
    });

    $(function() {
        var availableTags = [

            <?php
            echo $comma_separated_keywords;
            ?>
        ];
        // Filter function to search only from the beginning of the string
        $( "#searchID" ).autocomplete({
            source: function(request, response) {

                var results = $.ui.autocomplete.filter(availableTags, request.term);

                results = $.map(availableTags, function (tag) {
                    if (tag.toUpperCase().indexOf(request.term.toUpperCase()) === 0) {
                        return tag;
                    }
                });

                response(results.slice(0, 15));

            }
        });


        $( "#searchID" ).autocomplete({
            select: function(event, ui) {
                $("#searchID").val(ui.item.label);
                $("#searchForm").submit();
            }
        });


    });

</script>
</html>