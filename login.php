<?php

session_start();

$pagetitle = "login";

if (isset($_SESSION["user"])){
    header("Location: index.php");
}

include 'init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $uesrname = $_POST['uesrname'];
    $password = $_POST['password'];
    $gizlipass = sha1($password);


    $stmt = $con->prepare("SELECT
                               	UserID , Fullname , Password
                             FROM 
                                 users 
                              WHERE 
                                 Fullname = ? 
                              AND 
                                 Password =?");
    $stmt->execute(array($uesrname , $gizlipass));
    $row = $stmt->fetch();
    $col = $stmt->rowCount();

    if ($col > 0){

        $_SESSION['user'] = $uesrname;
        $_SESSION['uid'] = $row["UserID"];
        ?>
        <script>

           function get(){
                window.location.href = "index.php";
            }
            console.log("test");
            get();
        </script>
        <?php
    }

}

?>


<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Account</a></li>
        <li><a href="#">Login</a></li>
    </ul>

    <div class="row">
        <div id="content" class="col-sm-12">
            <div class="page-login">

                <div class="account-border">
                    <div class="row">
                        <div class="col-sm-6 customer-login">
                            <div class="myform">
                                <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
                                    <h3>Geriş yap</h3>
                                    <div class="form-group">
                                        <label class="control-label " for="input-email">UserName</label>
                                        <input type="text" name="uesrname">
                                    </div>
                                        <div class="form-group">
                                            <label class="control-label " for="input-email">Password</label>
                                            <input type="password" name="password">
                                        </div>
                                    <input type="submit" value="Geriş" class="btn btn-default pull-right">
                                </form>
                            </div>
                            </div>

                        <div class="col-sm-6 new-customer uye_ol">
                            <div class="well">
                                <h3>Üye Değil misiniz?</h3>
                                <p>Hemen üye olun, indirimli alışverişin keyfini çıkarın!</p>
                                <ul>
                                    <li>
                                        <i class="fas fa-cart-arrow-down"></i>
                                        <h2>Avantajlı Alışveriş</h2>
                                        <p>İndirim, kupon ve daha birçok özel fırsat içeride sizi bekliyor.</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-store-alt"></i>
                                        <h2>Bol Çeşit, Kolay Erişim</h2>
                                        <p>Milyonlarca ürün ve binlerce mağaza arasında aradığınıza kolayca ulaşın.</p>
                                    </li>
                                    <li>
                                        <i class="fas fa-clipboard-check"></i>
                                        <h2>Güvenli Platform</h2>
                                        <p>Ürün size ulaştıktan sonra sizin onayınızla ödemeniz mağazaya aktarılır.</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="bottom-form">
                                <a href="#" class="btn btn-default pull-right">Üye Ol</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- //Main Container -->


<?php

include $tel . 'footer.php';

?>

