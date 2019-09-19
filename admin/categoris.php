<?php
include 'connect.php';
include 'MyClass.php';
$pagetitle = 'categoris';
ob_start();
session_start();

$new_user = new test_sesstion();
$new_user->test_login();


$do = '';

if (isset($_GET["do"])){

    $do = $_GET["do"];
}else{
    $do = "manage";
}

if ($do == "manage"){ // categoris page 

  $sort = "ASC";

  $sort_array = array('ASC','DESC');

  if (isset($_GET["sort"]) && in_array($_GET["sort"], $sort_array)){
    $sort = $_GET["sort"];
  }
  $stmt4 = $con->prepare("SELECT * FROM categoris where parent = 0 ORDER BY Ordering $sort");
  $stmt4->execute();
  $cats = $stmt4->fetchAll();

?> 
<div class="page">
  <div class="page-content">
  <div class="categoris">
  <div class="title">
    <p><a href="?sort=ASC">ASC</a>/<a href="?sort=DESC">DESC</a></p>
  <h1>Categoris</h1>
  </div>
    <?php

    foreach ($cats as $cat) {
      
   echo '<div class="categori">';
   echo '<div class="hidden">';
   echo '<a href="categoris.php?do=Edite&&catid=' . $cat["ID"]  . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>Edite</a>';
   echo '<a href="categoris.php?do=delete&&catid=' . $cat["ID"]  . '" class="delet btn btn-xs btn-danger"><i class="fa fa-trash-alt"></i>Delet</a>';
   echo '</div>';
    echo '<h2>' . $cat["Name"] . '</h2>';
      echo '<p>'; if ( $cat["Description"] == '' ){ echo 'This Categori has no deccription'; } else{ echo $cat["Description"]; } echo '</p>';
        $childcat = $con->prepare("SELECT * FROM categoris where parent =  {$cat["ID"]}");
        $childcat->execute();
        $childs = $childcat->fetchAll();

        echo "<ul class='child'>";
        foreach ($childs as $c){
            echo "<li>" . $c["Name"] . ",</li>";
        }
        echo "</ul>";
echo "<div>";
   if ( $cat["Visibility"] == 1) { echo '<span>Visible</span>'; }
   if ( $cat["Allow_comment"] == 1) { echo '<span>Allow Commenting</span>'; }
   if ( $cat["Allow_ads"] == 1) { echo '<span>Allow Ads</span>'; }
   echo "</div>";
echo '</div>';

  }
     ?>
   </div>
 </div>
</div>
<?php }elseif($do == "Add"){ 
  ?>

<div class="page">
        <div class="page-content">
              <div class="panel">
                <div class="panel-body container-fluid">
                  <div class="row row-lg">
                    <div class="col-md-8">
                      <!-- Example Basic Form (Form grid) -->
                      <div class="example-wrap">
                        <h3>Add Categori</h3>
                        <div class="example">
                          <form class="form-horizontal" action="?do=Insert" method="POST">
                            <div class="row">
                              <div class="form-group col-md-5">
                                <label class="form-control-label" for="inputBasicFirstName">Name</label>
                                <input  type="text" class="form-control" id="inputBasicFirstName" name="name"
                                  placeholder="Name Of The Category"/>
                              </div>
                              <div class="form-group col-md-2">
                                <label class="form-control-label" for="inputBasicLastName">Ordering</label>
                                <input  type="text" class="test form-control" id="inputBasicLastName" name="Ordering"
                                  placeholder="Arrange"/>
                              </div>
                                <div class="form-group col-md-5">
                                    <label class="form-control-label" for="inputBasicFirstName">icon</label>
                                    <input  type="text" class="form-control" id="inputBasicFirstName" name="icon"
                                            placeholder='icon of The Categori'/>
                                </div>
                                <div class="form-group col-md-12">
                                <label class="form-control-label" for="inputBasicEmail">Description</label>
                                <input  type="" class="form-control" id="inputBasicEmail" name="description"
                                        placeholder="Describe The Categori"/>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="myselect ml-0 mt-25">
                                        <p>Parent</p>
                                        <select name="parent" class="" data-plugin="selectpicker" data-style="btn-outline btn-primary">
                                        <option value="0">...</option>
                                            <?php
                                            $stmt = $con->prepare("SELECT * FROM categoris WHERE parent = 0");
                                            $stmt->execute();
                                            $cats = $stmt->fetchAll();
                                            foreach ($cats as $cat){
                                                echo "<option value='" . $cat["ID"] ."'>" . $cat["Name"] ."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            </div>

                            <div class="mychek o_1 form-group" >
                            <label class="form-control-label" for="visible"><p>Visible</p></label>
                            <input value='1' class='Checked1' name="visible" type='hidden'/>
                            <input id='visible' type="checkbox" data-plugin="switchery" data-color="#3e8ef7" checked />
                            </div>
                            <div class="mychek o_2 form-group" >
                            <label class="form-control-label" for="comment"><p>Allow Commenting</p></label>
                            <input  value='1' class='Checked2' name="comment" type='hidden'/>
                            <input id='comment' type="checkbox" data-plugin="switchery" data-color="#3e8ef7" checked />                            </div>
                            <div class="mychek o_3 form-group" >
                            <label class="form-control-label" for="ads"><p>Allow Ads</p></label> 
                            <input value='1' class='Checked3' name="ads" type='hidden'/>
                            <input id='ads' type="checkbox" data-plugin="switchery" data-color="#3e8ef7" checked />                            </div>
                            <div  class="form-group" >
                              <button type="submit" value="save" class="save btn btn-primary">Add Categori</button>
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

}elseif ($do == "Insert"){
    echo "<div class='container'>";
          echo "<div class='alerts'>";
      //Insert member page

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name = $_POST['name'];
            $order = $_POST['Ordering'];
            $parent = $_POST['parent'];
            $icon = $_POST['icon'];
            $desc = $_POST['description'];
            $visible = $_POST['visible'];
            $comment = $_POST['comment'];
            $ads = $_POST['ads'];

            $fullerror = array();

            if (empty($name)) {
                $fullerror[] = '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">
                The name input field is empty<i class="far fa-frown"></i>
                  </div>';
            }

           


             else {
              $check = chekItems("name", "categoris", $name);

            if ($check == 1){

                $theMsg = '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">
                 Error<i class="far fa-smile-beam"></i>
                </div>';

                redirect($theMsg, 5000, "back");

            }else {

                if (empty($fullerror)){


                
                $stmt3 = $con->prepare("INSERT INTO 
                                        categoris(Name, Description, Ordering, parent, cat_icon, Visibility, Allow_comment, Allow_ads)
                                            VALUES(:name, :desc, :order, :par, :icon, :visible, :commnt, :ads)");

                $stmt3->execute(array(
                    'name' => $name,
                    'desc' => $desc,
                    'order' => $order,
                    'par' => $parent,
                    'icon'  => $icon,
                    'visible' => $visible,
                    'commnt' => $comment,
                    'ads' => $ads,
                ));                           

                $theMsg = '<div class="myalert mx-auto alert alert-success col-md-6" role="alert">
                 operation accomplished successfully<i class="far fa-smile-beam"></i>
                </div>';
                redirect($theMsg, 5000, "categoris.php");
        }
         }
           }

            foreach ($fullerror as $errors) {
                echo  $errors . "<br>";
            }


        }else {


         $theMsg = '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">you con not see is the page</div>';
         redirect($theMsg, 5000);


         
     } echo "</div>";

     echo "</div>";



//Edite page


}elseif ($do == 'Edite') {                 
         
  $catid = isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET['catid']) : 0;
       
       
  $stmt = $con->prepare("SELECT * FROM categoris WHERE ID = ?");
  $stmt->execute(array($catid));
  $cat = $stmt->fetch();
  $col = $stmt->rowCount();
       
  if ($col > 0){


?>

<div class="page">
        <div class="page-content">
              <div class="panel">
                <div class="panel-body container-fluid">
                  <div class="row row-lg">
                    <div class="col-md-8">
                      <!-- Example Basic Form (Form grid) -->
                      <div class="example-wrap">
                        <h3>Edite Categori</h3>
                        <div class="example">
                          <form class="form-horizontal" action="?do=Update" method="POST">
                          <input type="hidden" name="catid" value="<?php echo $catid; ?>" /> 
                            <div class="row">
                              <div class="form-group col-md-5">
                                <label class="form-control-label" for="inputBasicFirstName">Name</label>
                                <input value="<?php echo $cat["Name"] ?>"  type="text" class="form-control" id="inputBasicFirstName" name="name"
                                  placeholder="Name Of The Category"/>
                              </div>
                              <div class="form-group col-md-2">
                                <label class="form-control-label" for="inputBasicLastName">Ordering</label>
                                <input value="<?php echo $cat["Ordering"] ?>"  type="number" class="test form-control" id="inputBasicLastName" name="Ordering"
                                  placeholder="Number To Arrange The Categories"/>
                              </div>
                                <div class="form-group col-md-5">
                                    <label class="form-control-label" for="inputBasicLastName">Ordering</label>
                                    <input value="<?php echo htmlentities($cat["cat_icon"]); ?>" type="text" class="test form-control" id="inputBasicLastName" name="cat_icon"
                                           placeholder="icon of The Categori"/>
                                </div>
                            </div>
                            <div class="form-group">
                              <label class="form-control-label" for="inputBasicEmail">Description</label>
                              <input value="<?php echo $cat["Description"] ?>"  type="text" class="form-control" id="inputBasicEmail" name="description"
                                placeholder="Describe The Categori"/>
                            </div>
                            <div class="form-group col-md-6">
                                    <div class="myselect ml-0 mt-25">
                                        <p>Parent</p>
                                        <select name="parent" class="" data-plugin="selectpicker" data-style="btn-outline btn-primary">
                                        <option value="0">...</option>
                                            <?php
                                            $stmt = $con->prepare("SELECT * FROM categoris WHERE parent = 0");
                                            $stmt->execute();
                                            $cats = $stmt->fetchAll();
                                            foreach ($cats as $cat){
                                                echo "<option value='" . $cat["ID"] ."'>" . $cat["Name"] ."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            <div class="mychek o_1 form-group" >
                            <label class="o_1 form-control-label" for="visible"><p>Visible</p></label>
                            <input value='<?php echo $cat["Visibility"]; ?>' class='Checked1' name="visible" type='hidden'/>
                            <input id='visible' type="checkbox" data-plugin="switchery" data-color="#3e8ef7" 
                            <?php if ($cat["Visibility"] == 1) { echo  "checked"; } ?>/>
                            </div>
                            <div class="mychek o_2 form-group" >
                            <label class="o_2 form-control-label" for="comment"><p>Allow Commenting</p></label>
                            <input  value='<?php echo $cat["Allow_comment"]; ?>' class='Checked2' name="comment" type='hidden'/>
                            <input id='comment' type="checkbox" data-plugin="switchery" data-color="#3e8ef7" 
                            <?php if ($cat["Allow_comment"] == 1) { echo  "checked"; } ?> /> 
                            </div>
                            <div class="mychek o_3 form-group" >
                            <label class="o_3 form-control-label" for="ads"><p>Allow Ads</p></label> 
                            <input value='<?php echo $cat["Allow_ads"]; ?>' class='Checked3' name="ads" type='hidden'/>
                            <input id='ads' type="checkbox" data-plugin="switchery" data-color="#3e8ef7" 
                            <?php if ($cat["Allow_ads"] == 1) { echo  "checked"; } ?> />  
                             </div>
                            <div  class="form-group" >
                              <button type="submit" value="save" class="save btn btn-primary">Save</button>
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
      
}else {
       echo "<div class='container'>";
        echo "<div class='alerts'>";
      $theMsg = '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">Theres No Such ID </div>';
      redirect($theMsg, 5000);

      echo "</div>";
            echo "</div>";


} 
} elseif ($do == 'Update'){                    
         
  echo "<div class='container'>";
   echo "<div class='alerts'>";


 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
     $id = $_POST['catid'];
     $name = $_POST['name'];
     $Ordering = $_POST['Ordering'];
     $icon = $_POST["cat_icon"];
     $desc = $_POST['description'];
     $visible = $_POST['visible'];
     $comment = $_POST['comment'];
     $ads = $_POST['ads'];
     $paret = $_POST['parent'];

     
 $fullerror = array();
  

 if (empty($name)){
   $fullerror[] =  '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">
                    The name input field is empty<i class="far fa-frown"></i>
                      </div>';
 }
 if (empty($Ordering)){
   $fullerror[] =  '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">
                    The full name input field is empty<i class="far fa-frown"></i>
                      </div>';
 }
 if (empty($desc)){
   $fullerror[] =  '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">
                    The email input field is empty<i class="far fa-frown"></i>
                      </div>';
 }

 if (empty($fullerror)){
   $theMsg = '<div class="myalert mx-auto alert alert-success col-md-6" role="alert">
          operation accomplished successfully<i class="far fa-smile-beam"></i>
         </div>';

         echo $paret;

    redirect($theMsg, 500000, "back");

         
         $stmt = $con->prepare('UPDATE categoris SET Name = ?, Ordering=?, cat_icon=?, Description=?, Visibility=?, Allow_comment=?, Allow_ads=?, parent=?  WHERE ID =?');

     $stmt->execute(array($name, $Ordering, $icon, $desc, $visible, $comment, $ads, $paret, $id));
       //echo '<h1 class=\'text-center\'>'. $stmt->rowCount() . 'Record Update' .'</h1>';
 }


 foreach ($fullerror as $errors) {
   echo  $errors . "<br>";
 }
 }
 
else {
 $theMsg = '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">you con not see is the page</div>';
  redirect($theMsg, 3000, "back");  


echo "</div>";

} echo "</div>";
}elseif ($do == 'delete') {

  echo "<div class='container'>";
   echo "<div class='alerts'>";
$catid = isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET['catid']) : 0;
  
  
$check = chekItems("ID", "categoris", $catid); 


if ($check > 0){

$stmt = $con->prepare("DELETE FROM categoris WHERE ID = :catID");
$stmt->bindParam(":catID" , $catid);
$stmt->execute();
$theMsg = '<div class="myalert mx-auto alert alert-success col-md-6" role="alert">
          operation accomplished successfully<i class="far fa-smile-beam"></i>
         </div>';

         redirect($theMsg, 4000, 'categoris.php');

}else {
 echo "bad";
}
echo "</div>";
echo "</div>";
}
else {

    echo"<div class='page'>";
        echo '<div class="page-content">';

    $theMsg = '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">
                 No Page<i class="far fa-frown"></i>
                </div>';
                redirect($theMsg, 5000, "back"); 
        echo '</div>';   
         echo '</div>';                   
}



ob_end_flush();

include 'include/templets/footer.php';