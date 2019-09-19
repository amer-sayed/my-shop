<?php

include 'init.php';



?>




<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Yeni Hesap</a></li>
    </ul>

    <?php

    $formerrors = array();





    if ($_SERVER["REQUEST_METHOD"] == "POST"){



        $hashpass = sha1($_POST['password']);

        if (empty($_POST["firstname"])){

            $formerrors[] = "İsim girişi boş bırakıldı";
        }

        $filterduser = filter_var($_POST["firstname"], FILTER_SANITIZE_STRING);

        if (strlen($filterduser) < 4){

            $formerrors[] = "İsiminiz en az 4 karakter uzunluğunda olmalı";
        }
    }


    if (isset($_POST["password"]) && isset($_POST["confirm"])){

        if (empty($_POST["password"])){

            $formerrors[] = "Şifre girişi boş bırakıldı";
        }

        $pass1 = $_POST['password'];
        $pass2 = $_POST['confirm'];

        if ($pass1 !== $pass2){

            $formerrors[] = "Şifre eşleşmiyor";
        }
    }


    if (isset($_POST["email"])){

        if (empty($_POST["email"])) {
            $formerrors[] = "email girişi boş bırakıldı";
        }else {

            $filterdemail = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

            if (filter_var($filterdemail, FILTER_VALIDATE_EMAIL) != true) {

                $formerrors[] = "Girdiğiniz e-posta adresi doğru değil";
            }
        }
    }


    if (empty($formerrors)) {


        $stmt = $con->prepare('INSERT INTO 
                                    users(Username, Password, Email , Fullname, RegStatus, Date)
                                    VALUES(:user, :pass , :email , :name, 0, now())');

        $stmt->execute(array(

            'user' => $user,
            'pass' => $hashpass,
            'email' => $email,
            'name' => $full,
        ));
        $succesMsg = "Tebrikler şimdi üye oldunuz";

    }


    if (!empty($formerrors)){

        echo "<div class=\"row\">";
        foreach ($formerrors as $error){
            echo "<div class='erros-front'>";
            echo "<div class='col-md-4'>";
            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";

        if (isset($succesMsg)){
            echo '<div class="alert alert-danger" role="alert">' . $succesMsg . '</div>';
        }
    }

    ?>

    <div class="row">
        <div id="content" class="col-sm-12">
            <h2 class="title">Yeni Hesap Açın</h2>
            <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix">
                <fieldset id="account">
                    <legend>Kişisel Bilgileriniz</legend>
                    <div class="form-group required" style="display: none;">
                        <label class="col-sm-2 control-label">Customer Group</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="customer_group_id" value="1" checked="checked"> Default
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-firstname">İsim</label>
                        <div class="col-sm-10">
                            <input type="text" name="firstname" value="" placeholder="İsim" id="input-firstname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-lastname">soyad ad</label>
                        <div class="col-sm-10">
                            <input type="text" name="lastname" value="" placeholder="soyad ad" id="input-lastname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-telephone">Telefon</label>
                        <div class="col-sm-10">
                            <input type="tel" name="telephone" value="" placeholder="Telefon" id="input-telephone" class="form-control">
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Şifreniz</legend>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-password">Şifre</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" value="" placeholder="Şifre" id="input-password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-confirm">Şifre onaylama</label>
                        <div class="col-sm-10">
                            <input type="password" name="confirm" value="" placeholder="Şifre onaylama" id="input-confirm" class="form-control">
                        </div>
                    </div>
                </fieldset>
                <div class="buttons">
                    <div class="pull-right">
                        <input type="submit" value="Continue" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- //Main Container -->







<?php

include $tel . 'footer.php';

?>

