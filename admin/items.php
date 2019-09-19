<?php

include 'connect.php';
include 'MyClass.php';
$pagetitle = 'Items';


session_start();

$new_user = new test_sesstion();
$new_user->test_login();


$do = '';
if (isset($_GET['do'])) {

    $do = $_GET['do'];
} else {
    $do = 'manage';
}


// manage page


if ($do == 'manage')   {

    $stmt = $con->prepare('SELECT items.*,  categoris.Name AS cat_name, users.Username FROM items
     INNER JOIN categoris ON categoris.ID = items.Cat_ID
      INNER JOIN users ON users.UserID = items.Member_ID');

    $stmt->execute();

    $rows = $stmt->FetchAll();

    ?>

    <div class="page">
        <div class="page-content">
            <!-- Panel Filtering rows -->
            <div class="panel">
                <header class="panel-heading">
                    <h3 class="panel-title">Items</h3>
                </header>
                <div class="panel-body">
                    <table style="font-size:12px;" class="table table-bordered table-hover toggle-circle" id="exampleFootableFiltering"
                           data-paging="true" data-filtering="true" data-sorting="true">
                        <thead>
                        <tr class="footable-filtering">
                            <th data-name="id" data-type="number" data-breakpoints="xs">ID</th>
                            <th data-name="userName">Item Name</th>
                            <th data-name="Fullname">Description</th>
                            <th data-name="jobTitle" >Price</th>
                            <th data-name="jobTitle" >Country</th>
                            <th data-name="categori">Categori</th>
                            <th data-name="status">UserName</th>
                            <th data-name="status">Status</th>
                            <th data-name="status">Approve</th>
                            <th data-name="control">control</th>
                            <th data-name="date">Started On</th>
                            <th data-name="something" data-visible="false" data-filterable="false">Never seen but always around</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php


                        foreach ($rows as $row) {

                            echo "<tr>";
                            echo "<td>" . $row['item_ID'] . "</td>";
                            echo "<td>" . $row['Name'] . "</td>";
                            echo "<td>" . $row['Description'] . "</td>";
                            echo "<td>" . $row['Price'] . "</td>";
                            echo "<td>" . $row['Country_Made'] . "</td>";
                            echo "<td>" . $row['cat_name'] . "</td>";
                            echo "<td>" . $row['Username'] . "</td>";
                            echo "<td>";

                            if ($row["Status"] ==  1){
                                echo "New";
                            }elseif ($row["Status"] ==  2) {
                                echo "Like New";
                            }elseif ($row["Status"] ==  2){
                                echo "Used";
                            }else{
                                echo "Very Old";
                            }
                            "</td>";
                            echo "<td>";
                            if ($row["Approve"] == 0){

                                echo "<a href='items.php?do=activate&itemid=" . $row["item_ID"] . "'><span class='badge badge-table badge-danger'>Activate</span></a>";
                            }else{
                                echo "<span class='badge badge-table badge-success'>Active</span>";
                            }

                            echo"</td>";
                            echo '<td class="member-control">
                     <a  href="items.php?do=Edit&itemid=' . $row['item_ID']  . '"' .'
                     ><i class="fas fa-edit"></i></a>

                    <a href="items.php?do=delete&itemid=' . $row['item_ID']  . '"' .' class=\'confirm\' onclick="Confrim()" id ="con"><i class="fas fa-trash-alt"></i></a>
                    </td>';
                            echo "<td>" . $row['Add_Date'] . "</td>";

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
<?php } elseif ($do == 'Add') { ?>

<div class="page">
<div class="page-content">
<div class="panel">
<div class="panel-body container-fluid">
<div class="row row-lg">
<div class="col-md-10">
<!-- Example Basic Form (Form grid) -->
<div class="example-wrap">
<h3>Add Item</h3>
<div class="example">
    <form class="form-horizontal" action="?do=Insert" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="form-group col-md-3">
                <label class="form-control-label" for="inputBasicFirstName">Name</label>
                <input  type="text" class="form-control" id="inputBasicFirstName" name="name"
                        placeholder="Name of The Item"/>
            </div>

            <div class="form-group col-md-3">
                <label class="form-control-label" for="inputBasicLastName">Country</label>
                <input  type="text" class="test form-control" id="inputBasicLastName" name="country"
                        placeholder="Country of Made"/>
            </div>

            <div class="form-group col-md-3">
                <label class="form-control-label" for="itemImage">image1</label>                      
                <input type="file" class="form-control p-3" id="itemImage" name="img_1"  autocomplete="off" />           
            </div>
            <div class="form-group col-md-3">
                <label class="form-control-label" for="itemImage1">image2</label>                      
                <input type="file" class="form-control p-3" id="itemImage1" name="img_2"  autocomplete="off" />           
            </div>

        <div class="form-group col-md-8">
            <label class="form-control-label" for="inputBasicEmail">Description</label>
            <input  type="" class="form-control" id="inputBasicEmail" name="description"
                    placeholder="Describe The Categori"/>
        </div>
        <div class="form-group col-md-4">
            <label class="form-control-label" for="inputBasicLastName">Price</label>
            <input type="text" class="test form-control" id="inputBasicLastName" name="price"
                    placeholder="Price The Item"/>
        </div>
        </div>
        <div  class="form-group save">
            <div class="myselect">
                <p>Status</p>
            <select name="status" class="" data-plugin="selectpicker" data-style="btn-outline btn-primary">
                <option value="1">New</option>
                <option value="2">Like New</option>
                <option value="3">Used</option>
                <option value="4">Very Old</option>
            </select>
            </div>
            <div class="myselect">
                <p>Categori</p>
                <select name="categoris" class="" data-plugin="selectpicker" data-style="btn-outline btn-primary">
                    <?php
                    $stmt = $con->prepare("SELECT * FROM categoris");
                    $stmt->execute();
                    $cats = $stmt->fetchAll();
                    foreach ($cats as $cat){
                        echo "<option value='" . $cat["ID"] ."'>" . $cat["Name"] ."</option>";
                    }
                        ?>
                </select>
            </div>
            <div class="myselect">
                <p>Member</p>
                <select name="member" class="" data-plugin="selectpicker" data-style="btn-outline btn-primary">
                    <?php
                    $stmt = $con->prepare("SELECT * FROM users");
                    $stmt->execute();
                    $users = $stmt->fetchAll();
                    foreach ($users as $user){
                        echo "<option value='" . $user["UserID"] ."'>" . $user["Username"] ."</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" value="save" class="save float-right btn btn-primary">Add Item</button>
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
    <?php
}elseif ($do == 'Insert') {
        echo "<div class='container'>";
          echo "<div class='alerts'>";
      //Insert member page

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

          $imag_name = $_FILES["img_1"]["name"];
          $imag_size = $_FILES["img_1"]["size"];   
          $imag_tmp  = $_FILES["img_1"]["tmp_name"]; 
          $imagType  = $_FILES["img_1"]["type"]; 

          $file_type = array("png", "jpg", "jpeg", "gif");

          $filter = explode(".", $imag_name);
          $filterNameFile = end($filter);


          $imag_name_2 = $_FILES["img_2"]["name"];
          $imag_size_2 = $_FILES["img_2"]["size"];   
          $imag_tmp_2  = $_FILES["img_2"]["tmp_name"]; 
          $imagType_2 = $_FILES["img_2"]["type"]; 

          $file_type_2 = array("png", "jpg", "jpeg", "gif");

          $filter_2 = explode(".", $imag_name_2);
          $filterNameFile_2 = end($filter_2);


            $name     = $_POST['name'];
            $country  = $_POST['country'];
            $desc     = $_POST['description'];
            $price    = $_POST['price'];
            $status   = $_POST["status"];
            $categori = $_POST["categoris"];
            $member   = $_POST["member"];



            $fullerror = array();

            if (empty($name)){
                $fullerror[] =  '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">The name input field is empty<i class="far fa-frown"></i></div>';
            }
            if (empty($country)){
                $fullerror[] =  '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">The country input field is empty<i class="far fa-frown"></i></div>';
            }
            if (empty($desc)){
                $fullerror[] =  '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">The description input field is empty<i class="far fa-frown"></i></div>';
            }

            if (empty($price)){
                $fullerror[] =  '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">The price input field is empty<i class="far fa-frown"></i></div>';
            }
            if (empty($status)){
                $fullerror[] =  '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">The status input field is empty<i class="far fa-frown"></i></div>';
            }


            if (empty($fullerror)){
                $theMsg = '<div class="myalert mx-auto alert alert-success col-md-6" role="alert">operation accomplished successfully<i class="far fa-smile-beam"></i></div>';

                redirect($theMsg, 5000, "items.php");

                $image = rand(0, 1000000) . "-" . $imag_name;

                $path = $_SERVER['DOCUMENT_ROOT'] . "/eCommerce/admin/data/uploads//" .  $image;

                move_uploaded_file($imag_tmp, $path);
                
                $image_2 = rand(0, 1000000) . "-" . $imag_name_2;

                $path_2 = $_SERVER['DOCUMENT_ROOT'] . "/eCommerce/admin/data/uploads//" .  $image_2;

                move_uploaded_file($imag_tmp_2, $path_2);

                $stmt = $con->prepare('INSERT INTO 
                                    items(Name, Description ,Price, Country_Made, Status, Add_Date, Cat_ID, Member_ID, item_img, item_img_2)
                                    VALUES(:name, :desc , :price , :contry, :status, now(), :catID, :memberID, :img, :imgTow)');

                $stmt->execute(array(

                    'name' =>  $name,
                    'desc' => $desc,
                    'price' => $price,
                    'contry' => $country,
                    'status' => $status,
                    'catID' => $categori,
                    'memberID' => $member,
                    'img' => $image,
                    'imgTow' => $image_2,
                ));


            }

            else {
                foreach ($fullerror as $errors) {

                    echo  $errors . "<br>";

                }
                redirect("", 5000, "back");
            }
        }


}elseif ($do == "Edit"){
    $itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;




    $stmt = $con->prepare("SELECT * FROM items WHERE item_ID = ?");
    $stmt->execute(array($itemid));
    $items = $stmt->fetch();
    $col = $stmt->rowCount();

    if ($col > 0){
    ?>

<div class="page">
 <div class="page-content">
  <div class="panel">
  <div class="panel-body container-fluid">
   <div class="row row-lg">
    <div class="col-md-10">
<!-- Example Basic Form (Form grid) -->
    <div class="example-wrap">
     <h3>Add Item</h3>
      <div class="example">
       <form class="form-horizontal" action="?do=Update" method="POST" enctype="multipart/form-data">
           <input type="hidden" name="id" value="<?php echo $itemid ?>" />

           <div class="row">
            <div class="form-group col-md-3">
                <label class="form-control-label" for="inputBasicFirstName">Name</label>
                <input value="<?php echo $items["Name"]; ?>" type="text" class="form-control" id="inputBasicFirstName" name="name"
                        placeholder="Name of The Item"/>
            </div>
            <div class="form-group col-md-3">
                <label class="form-control-label" for="inputBasicLastName">Country</label>
                <input value="<?php echo $items["Country_Made"]; ?>" type="text" class="test form-control" id="inputBasicLastName" name="country"
                        placeholder="Country of Made"/>
            </div>
            <div class="form-group col-md-3">
                <label class="form-control-label" for="itemImage">image1</label>                      
                <input value="<?php echo $items["item_img"]; ?>"  type="file" class="form-control p-3" id="itemImage" name="img_1"  autocomplete="off" /> 
                <input value="<?php echo $items["item_img"]; ?>"  type="hidden" class="form-control p-3" id="itemImage" name="image_0"  autocomplete="off" />                     
            </div>
            <div class="form-group col-md-3">
                <label class="form-control-label" for="itemImage1">image2</label>                      
                <input value="<?php echo $items["item_img_2"]; ?>" type="file" class="form-control p-3" id="itemImage1" name="img_2"  autocomplete="off" /> 
                <input value="<?php echo $items["item_img_2"]; ?>" type="hidden" class="form-control p-3" id="itemImage1" name="image_1"  autocomplete="off" /> 
            </div>
            <div class="form-group col-md-8">
                <label class="form-control-label" for="inputBasicEmail">Description</label>
                <input value="<?php echo $items["Description"]; ?>" type="" class="form-control" id="inputBasicEmail" name="description"
                        placeholder="Describe The Categori"/>
            </div>
            <div class="form-group col-md-4">
                <label class="form-control-label" for="inputBasicLastName">Price</label>
                <input value="<?php echo $items["Price"]; ?>" type="text" class="test form-control" id="inputBasicLastName" name="price"
                       placeholder="Price The Item"/>
            </div>
        </div>
        <div  class="form-group save">
            <div class="myselect">
                <p>Status</p>
                <select name="status" class="" data-plugin="selectpicker" data-style="btn-outline btn-primary">
                    <option value="1" <?php if($items["Status"] == 1) {echo "selected";} ?>>New</option>
                    <option value="2" <?php if($items["Status"] == 2) {echo "selected";} ?>>Like New</option>
                    <option value="3" <?php if($items["Status"] == 3) {echo "selected";} ?>>Used</option>
                    <option value="4" <?php if($items["Status"] == 4) {echo "selected";} ?>>Very Old</option>
                </select>
            </div>
            <div class="myselect">
                <p>Categori</p>
                <select name="categoris" class="" data-plugin="selectpicker" data-style="btn-outline btn-primary">
                    <?php
                    $stmt = $con->prepare("SELECT * FROM categoris");
                    $stmt->execute();
                    $cats = $stmt->fetchAll();
                    foreach ($cats as $cat){
                        echo "<option value='" . $cat['ID'] . "'";
                        if($items["Cat_ID"] ==   $cat["ID"]) {echo "selected";}
                        echo '>' . $cat["Name"] ."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="myselect">
                <p>Member</p>
                <select name="member" class="" data-plugin="selectpicker" data-style="btn-outline btn-primary">
                    <?php
                    $stmt = $con->prepare("SELECT * FROM users");
                    $stmt->execute();
                    $users = $stmt->fetchAll();
                    foreach ($users as $user){
                        echo "<option value='" . $user["UserID"] ."'";
                        if($items["Member_ID"] ==  $user["UserID"]) {echo "selected";}
                        echo ">" . $user["Username"] ."</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" value="save" class="save float-right btn btn-primary">Edite Item</button>
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
    <?php }else {
        $theMsg = '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">Theres No Such ID </div>';
        redirect($theMsg, 5000);
    }
}elseif ($do == "Update"){
    echo '<div class="page">';
      echo '<div class="page-content">';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

          $imag_name = $_FILES["img_1"]["name"];
          $imag_size = $_FILES["img_1"]["size"];   
          $imag_tmp  = $_FILES["img_1"]["tmp_name"]; 
          $imagType  = $_FILES["img_1"]["type"]; 

          $file_type = array("png", "jpg", "jpeg", "gif");

          $filter = explode(".", $imag_name);
          $filterNameFile = end($filter);


          $imag_name_2 = $_FILES["img_2"]["name"];
          $imag_size_2 = $_FILES["img_2"]["size"];   
          $imag_tmp_2  = $_FILES["img_2"]["tmp_name"]; 
          $imagType_2 = $_FILES["img_2"]["type"]; 

          $file_type_2 = array("png", "jpg", "jpeg", "gif");

          $filter_2 = explode(".", $imag_name_2);
          $filterNameFile_2 = end($filter_2);

        $id = $_POST['id'];
        $name     = $_POST['name'];
        $country  = $_POST['country'];
        $desc     = $_POST['description'];
        $price    = $_POST['price'];
        $status   = $_POST["status"];
        $categori = $_POST["categoris"];
        $member   = $_POST["member"];
        $image_0 = $_POST["image_0"];
        $image_1   = $_POST["image_1"];

        $fullerror = array();



        if (empty($fullerror)){
            $theMsg = '<div class="myalert mx-auto alert alert-success col-md-6" role="alert">
          operation accomplished successfully<i class="far fa-smile-beam"></i>
         </div>';

            redirect($theMsg, 300000, "items.php");

            $image = rand(0, 1000000) . "-" . $imag_name;

                $path = $_SERVER['DOCUMENT_ROOT'] . "/eCommerce/admin/data/uploads//" .  $image;

                move_uploaded_file($imag_tmp, $path);
                
                $image_2 = rand(0, 1000000) . "-" . $imag_name_2;

                $path_2 = $_SERVER['DOCUMENT_ROOT'] . "/eCommerce/admin/data/uploads//" .  $image_2;

                move_uploaded_file($imag_tmp_2, $path_2);

                if(empty($imag_name)){
                    $image = $image_0;
                    $image_2 = $image_1;
                               }
                               

            $stmt = $con->prepare('UPDATE items SET Name = ?, Description=?, Price=?, Country_Made=?, Status=?, Cat_ID=?, Member_ID=?, item_img=?, item_img_2=?  WHERE item_ID =?');
            $stmt->execute(array($name, $desc, $price, $country, $status, $categori, $member, $image, $image_2, $id));
            //echo '<h1 class=\'text-center\'>'. $stmt->rowCount() . 'Record Update' .'</h1>';
        }


        foreach ($fullerror as $errors) {
            echo  $errors . "<br>";
        }
    }

    else {
        $theMsg = '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">you con not see is the page</div>';
        redirect($theMsg, 1000, "back");

    } echo "</div>";

    echo "</div>";

}elseif ($do == 'delete') {

    echo "<div class='container'>";
    echo "<div class='alerts'>";

    $itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;


    $check = chekItems("item_ID", "items", $itemid);


        if ($check > 0){

        $stmt = $con->prepare("DELETE FROM items WHERE item_ID = :item_id");
        $stmt->bindParam(":item_id" , $itemid);
        $stmt->execute();
        $theMsg = '<div class="myalert mx-auto alert alert-success col-md-6" role="alert">
                 operation accomplished successfully<i class="far fa-smile-beam"></i>
                </div>';

        redirect($theMsg, 4000, 'back');

    }else {
        echo "bad";
    }
    echo "</div>";
    echo "</div>";
}elseif ($do == "activate"){

    echo "<div class='container'>";
    echo "<div class='alerts'>";

    $itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;

    $check = chekItems("item_ID", "items", $itemid);


    if ($check > 0){

        $stmt = $con->prepare("UPDATE items SET Approve = 1 WHERE item_ID = ? ");
        $stmt->execute(array($itemid));
        $theMsg = '<div class="myalert mx-auto alert alert-success col-md-6" role="alert">
      The item has been successfully Approved<i class="far fa-smile-beam"></i>
                </div>';

        redirect($theMsg, 4000, 'items.php');

    }else {
        $theMsg = '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">
                 This ID is Not Exist<i class="far fa-smile-beam"></i>
                </div>';

        redirect($theMsg, 4000, 'items.php');
    }
    echo "</div>";
    echo "</div>";
}



else {

   $theMsg = '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">you con not see is the page</div>';
   redirect($theMsg, 5000);



        } echo "</div>";

     echo "</div>";


include 'include/templets/footer.php';
