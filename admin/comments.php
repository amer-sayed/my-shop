<?php
include 'connect.php';
include 'MyClass.php';
$pagetitle = 'Comments';


session_start();

$new_user = new test_sesstion();
$new_user->test_login();





$do ='';
if (isset($_GET['do'])){

    $do = $_GET['do'];
} else {
    $do = 'manage';
}


// manage page


if ($do == 'manage')   {

    $stmt = $con->prepare('SELECT comments.*, items.Name AS iteme_name, users.Username FROM comments
    INNER JOIN items ON items.item_id  = comments.item_id
    INNER JOIN users ON users.UserID = comments.user_id');

    $stmt->execute();

    $rows = $stmt->FetchAll();

    ?>

    <div class="page">
        <div class="page-content">
            <!-- Panel Filtering rows -->
            <div class="panel">
                <header class="panel-heading">
                    <h3 class="panel-title">Comments</h3>
                </header>
                <div class="panel-body">
                    <table class="table table-bordered table-hover toggle-circle" id="exampleFootableFiltering"
                           data-paging="true" data-filtering="true" data-sorting="true">
                        <thead>
                        <tr class="footable-filtering">
                            <th data-name="id" data-type="number" data-breakpoints="xs">ID</th>
                            <th data-name="comment">Comment</th>
                            <th data-name="item_id">item</th>
                            <th data-name="comment">Username</th>
                            <th data-name="status">Status</th>
                            <th data-name="control">control</th>
                            <th data-name="date">Started On</th>
                            <th data-name="something" data-visible="false" data-filterable="false">Never seen but always around</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php


                        foreach ($rows as $row) {

                            echo "<tr>";
                            echo "<td>" . $row['c_id'] . "</td>";
                            echo "<td>" . $row['comment'] . "</td>";
                            echo "<td>" . $row['iteme_name'] . "</td>";
                            echo "<td>" . $row['Username'] . "</td>";
                            echo "<td>";

                            if ($row["status"] == 0){

                                echo "<a href='comments.php?do=activate&commentid=" . $row["c_id"] . "'><span class='badge badge-table badge-danger'>Approve</span></a>";
                            }else{
                                echo "<span class='badge badge-table badge-success'>Active</span>";
                            }
                            "</td>";
                            echo '<td class="member-control">
                     <a  href="comments.php?do=Edite&commentid=' . $row['c_id']  . '"' .'
                     ><i class="fas fa-edit"></i></a>

                    <a href="comments.php?do=delete&commentid=' . $row['c_id']  . '"' .' class=\'confirm\' onclick="Confrim()" id ="con"><i class="fas fa-trash-alt"></i></a>
                    </td>';
                            echo "<td>" . $row['comment_date'] . "</td>";
                            echo "</tr>";
                        }

                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php }


// edite page


elseif ($do == 'Edite') {

    $commentid = isset($_GET['commentid']) && is_numeric($_GET['commentid']) ? intval($_GET['commentid']) : 0;


    $stmt = $con->prepare("SELECT * FROM comments WHERE c_id = ?");
    $stmt->execute(array($commentid));
    $row = $stmt->fetch();
    $col = $stmt->rowCount();

    if ($col > 0){
        ?>
<div class="page">
<div class="page-content">
<div class="panel">
<div class="panel-body container-fluid">
<div class="row row-lg">
<div class="col-md-6">
<!-- Example Basic Form (Form grid) -->
<div class="example-wrap">
<h3>Edit Comment</h3>
<div class="example">
<form class="form-horizontal" action="?do=Update" method="POST">
    <input type="hidden" name="comid" value="<?php echo $commentid ?>" />
    <div class="form-group">
        <label class="form-control-label" for="inputBasicEmail">Comment</label>
        <input value='<?php echo $row['comment'] ?>' type="text" class="form-control" id="inputBasicEmail" name="com"
               placeholder="Comment text"/>
    </div>
    <div class="form-group" >
        <button type="submit" value="save" class="btn btn-primary">Save</button>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
        <!-- End Example Basic Form (Form grid) -->

        <?php

    }else {
        echo "<div class='container'>";
        echo "<div class='alerts'>";
        $theMsg = '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">Theres No Such ID </div>';
        redirect($theMsg, 5000, "back");

         echo "</div>";
        echo "</div>";

    }
}



//  update page

elseif ($do == 'Update'){

    echo "<div class='page'>";
    echo "<div class='page-content'>";


    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['comid'];
        $comment = $_POST['com'];


        $fullerror = array();


        if (empty($comment)){
            $fullerror[] =  '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">
                           The comment input field is empty<i class="far fa-frown"></i>
                             </div>';
        }

        if (empty($fullerror)){
            $theMsg = '<div class="myalert mx-auto alert alert-success col-md-6" role="alert">
                 operation accomplished successfully<i class="far fa-smile-beam"></i>
                </div>';

            redirect($theMsg, 4000, "back");

            $stmt = $con->prepare('UPDATE comments SET comment = ? WHERE c_id = ?');
            $stmt->execute(array($comment, $id));
            //echo '<h1 class=\'text-center\'>'. $stmt->rowCount() . 'Record Update' .'</h1>';
        }


        foreach ($fullerror as $errors) {
            echo  $errors . "<br>";
        }
    }

    else {
        $theMsg = '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">you con not see is the page</div>';
        redirect($theMsg, 3000, "back");

    } echo "</div>";

    echo "</div>";

}


// delete page



elseif ($do == 'delete') {

    echo "<div class='container'>";
    echo "<div class='page-content'>";
    $commentid = isset($_GET['commentid']) && is_numeric($_GET['commentid']) ? intval($_GET['commentid']) : 0;


    $check = chekItems("c_id", "comments", $commentid);


    if ($check > 0){

        $stmt = $con->prepare("DELETE FROM comments WHERE c_id = :comID");
        $stmt->bindParam(":comID" , $commentid);
        $stmt->execute();
        $theMsg = '<div class="myalert mx-auto alert alert-success col-md-6" role="alert">
                 operation accomplished successfully<i class="far fa-smile-beam"></i>
                </div>';

        redirect($theMsg, 4000, 'back');

    }else {
        echo "<div class='container'>";
        echo "<div class='page-content'>";
        $theMsg = '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">Theres No Such ID </div>';
        redirect($theMsg, 5000, "back");

        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
    echo "</div>";
}elseif ($do == 'activate') {
    echo "<div class='page'>";
    echo "<div class='page-content'>";
    $commentid = isset($_GET['commentid']) && is_numeric($_GET['commentid']) ? intval($_GET['commentid']) : 0;


    $check = chekItems("c_id", "comments", $commentid);


    if ($check > 0){

        $stmt = $con->prepare("UPDATE comments SET status = 1 WHERE c_id = ? ");
        $stmt->execute(array($commentid));
        $theMsg = '<div class="myalert mx-auto alert alert-success col-md-6" role="alert">
      The member has been successfully activated<i class="far fa-smile-beam"></i>
                </div>';

        redirect($theMsg, 4000, 'comments.php');

    }else {
        $theMsg = '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">
                 This ID is Not Exist<i class="far fa-smile-beam"></i>
                </div>';

        redirect($theMsg, 4000, 'comments.php');
    }
    echo "</div>";
    echo "</div>";
}


include 'include/templets/footer.php';
?>