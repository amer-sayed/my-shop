<?php
$pagetitle = "Yeni Ürün";
session_start();
include 'init.php';

if (isset($_SESSION["user"])){




}else { ?>


    <script>

        function get(){
            window.location.href = "login.php";
        }
        get();
    </script>

<?php }


?>




    <!-- Main Container  -->
    <div class="main-container container">

        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Yeni Ürün</a></li>
        </ul>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $formErrors = array();

            $title    = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
            $desc     = filter_var($_POST["desc"], FILTER_SANITIZE_STRING);
            $price    = filter_var($_POST["price"], FILTER_SANITIZE_NUMBER_INT);
            $country   = filter_var($_POST["country"], FILTER_SANITIZE_STRING);
            $status   = filter_var($_POST["status"], FILTER_SANITIZE_NUMBER_INT);
            $cate      = filter_var($_POST["categoris"], FILTER_SANITIZE_NUMBER_INT);



            if (strlen($title) < 4){
                $formErrors [] = "ürürn adı en az 4 karakter uzunluğunda olmalı";
            }
            if (empty($price)){
                $formErrors [] = "fiyat girişi boş bırakıldı";
            }
            if (strlen($country)  < 2){
                $formErrors [] = "Üretim yeri en az 3 karakter uzunluğunda olmalı";
            }

        }

        ?>
        <div class="row">
            <!--Middle Part Start-->
            <div class="col-sm-12" id="content">
                <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <legend>Ürün bilgileri</legend>
                            <div class="form-group required">
                                <label for="input-firstname" class="control-label">Ürün Ad</label>
                                <input type="text" class="form-control" id="input-firstname" placeholder="Ürün Ad" value="" name="name">
                            </div>
                            <div class="form-group required">
                                <label for="input-email" class="control-label">Üretim yeri</label>
                                <input type="text" class="form-control" id="input-email" placeholder="Country" value="" name="country">
                            </div>
                            <div class="form-group required">
                                <label for="input-telephone" class="control-label">Fiyat</label>
                                <input type="tel" class="form-control" id="input-telephone" placeholder="Price" value="TL" name="price">
                            </div>
                            <div class="form-group required">
                                <label for="input-lastname" class="control-label">Ürün Açıklamsı</label>
                                    <textarea class="form-control" id="input-comment" placeholder="Other details" rows="10" name="desc"></textarea>
                            </div>
                            <div class="form-group required">
                                <p>Ürün durumu</p>
                                <select name="status" class="" data-plugin="selectpicker" data-style="btn-outline btn-warning">
                                <option value="1">Yeni</option>
                                <option value="2">2.el</option>
                            </select>
                            </div>
                            <div class="form-group required selects">
                                <p>kategori</p>
                                <select name="categoris" class="" data-plugin="selectpicker" data-style="btn-outline btn-warning">
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
                        </div>
                        <div class="col-sm-6">
                            <?php

                            if (!empty($formErrors)){

                                foreach ($formErrors as $error){

                                    echo "<div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i>" . $error . "</div>";
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="buttons clearfix">
                        <div class="pull-right">
                            <input type="submit" class="btn btn-md btn-primary" value="Kayıt et">
                        </div>
                    </div>
                </form>
            </div>
            <!--Middle Part End-->
        </div>
    </div>

<?php

print_r($_SESSION);

if ($_SERVER["REQUEST_METHOD"] == "POST"){

if (empty($formErrors)){

    echo $cate;

        $stmt = $con->prepare('INSERT INTO 
                                    items(Name, Description ,Price, Country_Made, Status, Add_Date, Cat_ID, Member_ID)
                                    VALUES(:name, :desc , :price , :contry, :status, now(), :catID, :memberID)');

        $stmt->execute(array(

            'name' =>  $title,
            'desc' => $desc,
            'price' => $price,
            'contry' => $country,
            'status' => $status,
            'catID' => $cate,
            'memberID' => $_SESSION["uid"],
        ));


    }

}
?>


?>




    <!-- //Main Container -->




<?php

include $tel . 'footer.php';

?>