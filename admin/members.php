<?php 
include 'connect.php';
include 'MyClass.php';
$pagetitle = 'Members';


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

      $stmt = $con->prepare('SELECT * FROM users WHERE GrupID != 1 ');

      $stmt->execute();

      $rows = $stmt->FetchAll();

?>   
         
       <div class="page">
        <div class="page-content">
          <!-- Panel Filtering rows -->
          <div class="panel">
            <header class="panel-heading">
              <h3 class="panel-title">Members</h3>
            </header>
            <div class="panel-body">
        
              <table class="table table-bordered table-hover toggle-circle" id="exampleFootableFiltering"
                data-paging="true" data-filtering="true" data-sorting="true">
                <thead>
                  <tr class="footable-filtering">
                    <th data-name="id" data-type="number" data-breakpoints="xs">ID</th>
                    <th data-name="avatar">image</th>
                    <th data-name="userName">User Name</th>
                    <th data-name="Fullname">Full Name</th>
                    <th data-name="jobTitle" data-breakpoints="xs sm">Email</th>
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
                    echo "<td>" . $row['UserID'] . "</td>";
                    echo "<td><img src='data/uploads/" . $row['avater'] . "'></td>";
                    echo "<td>" . $row['Username'] . "</td>";
                    echo "<td>" . $row['Fullname'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>";

                    if ($row["RegStatus"] == 0){

                      echo "<a href='members.php?do=activate&userid=" . $row["UserID"] . "'><span class='badge badge-table badge-danger'>Activate</span></a>";
                    }else{
                     echo "<span class='badge badge-table badge-success'>Active</span>";
                    } 
                    "</td>";
              echo '<td class="member-control">
                     <a  href="members.php?do=Edite&userid=' . $row['UserID']  . '"' .'
                     ><i class="fas fa-edit"></i></a>

                    <a href="members.php?do=delete&userid=' . $row['UserID']  . '"' .' class=\'confirm\' onclick="Confrim()" id ="con"><i class="fas fa-trash-alt"></i></a>
                    </td>';
                    echo "<td>" . $row['Date'] . "</td>";
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
     <?php } elseif ($do == 'Add') { ?>
       
        <div class="page">
        <div class="page-content">
              <div class="panel">
                <div class="panel-body container-fluid">
                  <div class="row row-lg">
                    <div class="col-md-6">
                      <!-- Example Basic Form (Form grid) -->
                      <div class="example-wrap">
                        <h3>Add Member</h3>
                        <div class="example">
                          <form class="form-horizontal" action="?do=Insert" method="POST" enctype="multipart/form-data">
                            <div class="row">
                              <div class="form-group col-md-6">
                                <label class="form-control-label" for="inputBasicFirstName">User Name</label>
                                <input  type="text" class="form-control" id="inputBasicFirstName" name="username"
                                  placeholder="First Name" autocomplete="off" />
                              </div>
                              <div class="form-group col-md-6">
                                <label class="form-control-label" for="inputBasicLastName">Full Name</label>
                                <input  type="text" class="form-control" id="inputBasicLastName" name="full"
                                  placeholder="Full Name" autocomplete="off" />
                              </div>
                            
                            <div class="form-group col-md-12">
                              <label class="form-control-label" for="inputBasicEmail">Email Address</label>
                              <input  type="" class="form-control" id="inputBasicEmail" name="email"
                                placeholder="Email Address" autocomplete="off" />
                            </div>
                            <div class="form-group col-md-6">
                              <label class="form-control-label" for="inputBasicPassword">Password</label>                      
                              <input type="password" class="form-control password" id="inputBasicPassword" name="password" placeholder="Password" autocomplete="off" />           
                            </div>
                            <div class="form-group col-md-6">
                              <label class="form-control-label" for="inputBasicPassword">image</label>                      
                              <input type="file" class="form-control password p-3" id="inputBasicPassword" name="avatar"  autocomplete="off" />           
                            </div>
                            </div>
                             <div class="checkbox-custom checkbox-primary">
                            <input type="checkbox" id="inputUnchecked" />
                            <label for="inputUnchecked">show password</label>
                           </div>
                            <div class="form-group" >
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


    <?php } 


// Insert page


    elseif ($do == 'Insert') {            
        echo "<div class='container'>";
          echo "<div class='alerts'>";
      //Insert member page

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

          $avatarName = $_FILES["avatar"]["name"];
          $avatarSize = $_FILES["avatar"]["size"];   
          $avatarTmp  = $_FILES["avatar"]["tmp_name"]; 
          $avatarType = $_FILES["avatar"]["type"]; 

          $file_type = array("png", "jpg", "jpeg", "gif");

          $filter = explode(".", $avatarName);
          $filterNameFile = end($filter);
          

            $user = $_POST['username'];
            $pass = $_POST['password'];
            $full = $_POST['full'];
            $email = $_POST['email'];
            
            $hashpass = sha1($_POST['password']);
            
        $fullerror = array();
         

        if (empty($user)){
          $fullerror[] =  '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">
                           The name input field is empty<i class="far fa-frown"></i>
                             </div>';
        }
        if (empty($full)){
          $fullerror[] =  '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">
                           The full name input field is empty<i class="far fa-frown"></i>
                             </div>';
        }
        if (empty($email)){
          $fullerror[] =  '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">
                           The email input field is empty<i class="far fa-frown"></i>
                             </div>';
        }

        if (empty($pass)){
          $fullerror[] =  '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">
                           The password input field is empty<i claSss="far fa-frown"></i>
                             </div>';
        }

        if (! empty($avatarName) && ! in_array($filterNameFile, $file_type)){
          $fullerror[] =  '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">
                           error file type<i class="far fa-frown"></i>
                             </div>';
        }

        if (empty($fullerror)){
          $theMsg = '<div class="myalert mx-auto alert alert-success col-md-6" role="alert">
                 operation accomplished successfully<i class="far fa-smile-beam"></i>
                </div>';

                $avatar = rand(0, 100000) . "-" . $avatarName;

                $path = $_SERVER['DOCUMENT_ROOT'] . "/eCommerce/admin/data/uploads//" . $avatar;

                move_uploaded_file($avatarTmp, $path);

                $stmt = $con->prepare('INSERT INTO 
                                    users(Username, Password, Email , Fullname, RegStatus	, Date, avater)
                                    VALUES(:user, :pass , :email , :name, 1, now(), :avt)');

                $stmt->execute(array(

                  'user' =>  $user,
                  'pass' => $hashpass,  
                  'email' => $email, 
                  'name' => $full,
                  'avt' => $avatar,
                ));

            $theMsg = '<div class="myalert mx-auto alert alert-success col-md-6" role="alert">operation accomplished successfully<i class="far fa-smile-beam"></i></div>';
            redirect("$theMsg", 3000, "members.php");
        }


        foreach ($fullerror as $errors) {
          
          echo  $errors . "<br>";

          }
          
      
        }
        
     else {


         $theMsg = '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">you con not see is the page</div>';
         redirect($theMsg, 5000);


         
     } echo "</div>";

     echo "</div>";
    }


// edite page


    elseif ($do == 'Edite') {                 
         
    $userid= isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
         
         
    $stmt = $con->prepare("SELECT * FROM users WHERE UserID = ? LIMIT 1");
    $stmt->execute(array($userid));
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
                        <h3>Edit Member</h3>
                        <div class="example">
                          <form class="form-horizontal" action="?do=Update" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $userid ?>" /> 
                            <div class="row">
                              <div class="form-group col-md-6">
                                <label class="form-control-label" for="inputBasicFirstName">User Name</label>
                                <input value='<?php echo $row['Username'] ?>' type="text" class="form-control" id="inputBasicFirstName" name="username"
                                  placeholder="First Name" autocomplete="off" />
                              </div>
                              <div class="form-group col-md-6">
                                <label class="form-control-label" for="inputBasicLastName">Full Name</label>
                                <input value='<?php echo $row['Fullname'] ?>' type="text" class="form-control" id="inputBasicLastName" name="full"
                                  placeholder="Full Name" autocomplete="off" />
                              </div>
                              <div class="form-group col-md-12">
                              <label class="form-control-label" for="inputBasicEmail">Email Address</label>
                              <input value='<?php echo $row['Email'] ?>' type="" class="form-control" id="inputBasicEmail" name="email"
                                placeholder="Email Address" autocomplete="off" />
                            </div>
                            <div class="form-group col-md-6">
                              <label class="form-control-label" for="inputBasicPassword">Password</label>
                              <input type="hidden" name="oldpassword" value="<?php echo $row['Password'] ?>"/>           
                              <input type="password" class="form-control" id="inputBasicPassword" name="newpassword" placeholder="Password" autocomplete="off" />           
                            </div>
                            <div class="form-group col-md-6">
                              <label class="form-control-label" for="userimag">User image</label>
                              <input type="file" class="form-control p-3" id="userimag" name="avatar" value='<?php echo $row['avater'] ?>' autocomplete="off"/>           
                            </div>
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
        redirect($theMsg, 5000);

        echo "</div>";
              echo "</div>";

 } 
}



//  update page

 elseif ($do == 'Update'){                    
         
         echo "<div class='container'>";
          echo "<div class='alerts'>";


        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

          $avatarName = $_FILES["avatar"]["name"];
          $avatarSize = $_FILES["avatar"]["size"];   
          $avatarTmp  = $_FILES["avatar"]["tmp_name"]; 
          $avatarType = $_FILES["avatar"]["type"]; 

          $file_type = array("png", "jpg", "jpeg", "gif");

          $filter = explode(".", $avatarName);
          $filterNameFile = end($filter);

            $id = $_POST['id'];
            $user = $_POST['username'];
            $full = $_POST['full'];
            $email = $_POST['email'];
            
        $pass = empty($_POST['newpassword']) ?  $_POST['oldpassword'] : sha1($_POST['newpassword']);



        $fullerror = array();
         

        if (empty($user)){
          $fullerror[] =  '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">
                           The name input field is empty<i class="far fa-frown"></i>
                             </div>';
        }
        if (empty($full)){
          $fullerror[] =  '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">
                           The full name input field is empty<i class="far fa-frown"></i>
                             </div>';
        }
        if (empty($email)){
          $fullerror[] =  '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">
                           The email input field is empty<i class="far fa-frown"></i>
                             </div>';
        }

        if (empty($fullerror)){

          $theMsg = '<div class="myalert mx-auto alert alert-success col-md-6" role="alert">
                 operation accomplished successfully<i class="far fa-smile-beam"></i>
                </div>';

                $avatar = rand(0, 1000000) . "-" . $avatarName;

                $path = $_SERVER['DOCUMENT_ROOT'] . "/eCommerce/admin/data/uploads//" . $avatar;

                move_uploaded_file($avatarTmp, $path);

           redirect($theMsg, 4000, "back");
                
                $stmt = $con->prepare('UPDATE users SET Username = ?, Fullname=?, Email=?, Password=?, avater= ?  WHERE UserID =?');
                $stmt->execute(array($user, $full, $email, $pass, $avatar, $id));
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
          echo "<div class='alerts'>";
    $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
         
         
    $check = chekItems("userid", "users", $userid); 


    if ($check > 0){

      $stmt = $con->prepare("DELETE FROM users WHERE UserID = :useriD");
      $stmt->bindParam(":useriD" , $userid);
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
    }elseif ($do == 'activate') {
      echo "<div class='container'>";
          echo "<div class='alerts'>";
    $userid= isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
         
         
    $check = chekItems("userid", "users", $userid); 


    if ($check > 0){

      $stmt = $con->prepare("UPDATE users SET RegStatus = 1 WHERE UserID = ? ");
      $stmt->execute(array($userid));
      $theMsg = '<div class="myalert mx-auto alert alert-success col-md-6" role="alert">
      The member has been successfully activated<i class="far fa-smile-beam"></i>
                </div>';

                redirect($theMsg, 4000, 'members.php');

      }else {
        $theMsg = '<div class="myalert mx-auto alert alert-danger col-md-6" role="alert">
                 This ID is Not Exist<i class="far fa-smile-beam"></i>
                </div>';

                redirect($theMsg, 4000, 'members.php');
      }
      echo "</div>";
       echo "</div>";
     }      
  
    
     include 'include/templets/footer.php'; 
?>