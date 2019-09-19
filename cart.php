<?php

$pagetitle = "sepetim";

session_start();

include 'init.php';
$user_id = $_SESSION['uid'];

$do ='';
        if (isset($_GET['do'])){

            $do = $_GET['do'];
        } else {
            $do = 'manage';
        }

  if($do == "manage"){



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_id = $_POST["u_id"];
    $name    = $_POST["item_name"];
    $price   = $_POST["price"];
    $imag   = $_POST["img"];
    $item_id   = $_POST["item_id"];
    

    $stmt = $con->prepare("INSERT INTO 
      cart(item_name, item_price, item_img, item_user, item_id)
      VALUES(:name, :price, :img, :id, :i_id)
    ");

$stmt->execute(array(

    'name' =>  $name,
    'price' => $price,
    'img' => $imag,
    'id' => $user_id, 
    'i_id' => $item_id,
));

}

$getCart = $con->prepare('SELECT * FROM cart where item_user = ? ORDER BY ID DESC');
     $getCart->execute(array($user_id));
     $cats = $getCart->fetchAll();

    
?>
  
  <div class="container">
  <div class="row">
  <div class="col-md-9">

  <?php

  $total = 0;
foreach ($cats as $item) {



  $total = $total + (int)$item["item_price"];

?>

<div class="table-responsive form-group">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td class="text-center">Image</td>
                    <td class="text-left">Product Name</td>
                    <td class="text-left">Quantity</td>
                    <td class="text-right">Unit Price</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center"><a href="<?php echo "item.php?itemid=" . $item["item_id"]; ?>"><img width="70px" src="<?php echo "admin/data/uploads/" . $item["item_img"]; ?>" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-thumbnail" /></a></td>
                    <td class="text-left"><a href="<?php echo "item.php?itemid=" . $item["item_id"]; ?>"><?php echo $item["item_name"]; ?></a><br />                    <td class="text-left" width="200px"><div class="input-group btn-block quantity">
                    <form action="cart.php?do=delete" method="post">
                    <input type="hidden" name="C_idnum" value="<?php echo $item["ID"]; ?>">
                        <span class="input-group-btn">
                        <button type="submit" data-toggle="tooltip" title="sil" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></button>   
                        </form></span></div></td>
                    <td class="text-right"><?php echo $item["item_price"]; ?>TL</td>
                 </tr>
                </tbody>
              </table>
              </div>
              
              
              
<?php } 

$stmt2 = $con->prepare("SELECT COUNT(ID) FROM cart WHERE item_user = ?");

$stmt2->execute(array($user_id));

$count =  $stmt2->fetchColumn();  

?>

</div>
<div class="col-md-3">
<div class="m-auto">
<h2>Sipariş Özeti</h2>
<hr>
<h5>Toplam <?php echo $count; ?> ürün</h5>
<p>Ürün Toplamı:<span class="pl-20"><?php echo $total; ?> TL</span></p>
<button class="btn btn-warning btn-block">Satın Al</button>
</div>
    </div>
   </div>
  </div>
 </div>
<?php

}

if($do == "delete"){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

     $ca_id = $_POST["C_idnum"];


      $stmt = $con->prepare("DELETE FROM cart WHERE ID = :cart_iD");
      $stmt->bindParam(":cart_iD" , $ca_id);
      $stmt->execute();

}
}

?>






<?php 



include $tel . 'footer.php';

?>






