<?php 
ob_start();

 session_start();
 $noNavbar = '';
 $pagetitle = 'login';
 $background = '';

 if (isset($_SESSION['Username'])){
    header('location: dashboard.php');
 }

 include 'init.php';
 
if ( $_SERVER['REQUEST_METHOD'] == 'POST'){

	$uesrname = $_POST['user'];
	$password = $_POST['pass'];
	$gizlipass = sha1($password);
    
    
    
    
    $stmt = $con->prepare("SELECT
                               	UserID , Username , Password
                             FROM 
                                 users 
                              WHERE 
                                 Username = ? 
                              AND 
                                 Password =?
                               AND
                                  GrupID = 1
                                  LIMIT 1");
    $stmt->execute(array($uesrname , $gizlipass));
    $row = $stmt->fetch();
    $col = $stmt->rowCount();
     
    if ($col > 0){
        
        $_SESSION['Username'] = $uesrname;
        $_SESSION['id'] = $row['UserID'];
        header('location: dashboard.php');
        exit();
        
    }

    
    echo $col;
}

     ?>





  <!-- Page -->
  <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
      <div class="panel">
        <div class="panel-body">
          <div class="brand">
            <img class="brand-img" src="assets/images/logo-colored.png" alt="...">
            <h2 class="brand-text font-size-18">Remark</h2>
          </div>
          <form method="post" action="#" method='POST'>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="user" class="form-control" name="user" method />
              <label class="floating-label">Username</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="password" class="form-control" name="pass" />
              <label class="floating-label">Password</label>
            </div>
            <div class="form-group clearfix">
              <div class="checkbox-custom checkbox-inline checkbox-primary checkbox-lg float-left">
                <input type="checkbox" id="inputCheckbox" name="remember">
                <label for="inputCheckbox">Remember me</label>
              </div>
              <a class="float-right" href="forgot-password.html">Forgot password?</a>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Sign in</button>
          </form>
          <p>Still no account? Please go to <a href="register-v3.html">Sign up</a></p>
        </div>
      </div>

      <footer class="page-copyright page-copyright-inverse">
        <p>WEBSITE BY Creation Studio</p>
        <p>© 2019. All RIGHT RESERVED.</p>
        <div class="social">
          <a class="btn btn-icon btn-pure" href="javascript:void(0)">
            <i class="icon bd-twitter" aria-hidden="true"></i>
          </a>
          <a class="btn btn-icon btn-pure" href="javascript:void(0)">
            <i class="icon bd-facebook" aria-hidden="true"></i>
          </a>
          <a class="btn btn-icon btn-pure" href="javascript:void(0)">
            <i class="icon bd-google-plus" aria-hidden="true"></i>
          </a>
        </div>
      </footer>
    </div>
  </div>
  <!-- End Page -->


 
<?php include $tel . 'footer.php';
ob_end_flush();
?>