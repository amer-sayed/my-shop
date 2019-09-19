<?php
session_start();
include 'init.php';
 

?>

    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i></a></li>
            <li>
            <a href="#"><?php

               $Catid = $_GET["pageid"];

                $getCat = $con->prepare('SELECT * FROM categoris where ID = ? ORDER BY ID ASC ');
                $getCat->execute(array($Catid));

                $Cats = $getCat->fetchAll();

                foreach ($Cats as  $Cat){
                    echo $Cat["Name"];
                }

                ?></a>
        </li>
        </ul>

        <div class="row">
            <!--Left Part Start -->
            <aside class="col-sm-4 col-md-3" id="column-left">
                <div class="module menu-category titleLine">
                    <h3 class="modtitle">Categories</h3>
                     <div class="modcontent">
                        <div class="box-category">
                            <ul id="cat_accordion" class="list-group">

        <?php
        
        $catid = $_GET["pageid"];
        $cats =  getAllFrom("categoris", "ID", "where parent = " . $catid);
        
        foreach ($cats as $cat) {

            echo "<li class=\"hadchild\">";
            echo '<a href="c_categori.php?pageid=' . $cat["ID"] . "&parent=" . $cat["parent"] . '&pagename=' . str_replace(' ', '-', $cat["Name"]) . '" class=\"cutom-parent\">' . $cat["Name"] . '</a>';
            echo "</li>";
        }
        ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="module latest-product titleLine">
                    <h3 class="modtitle">Latest Product</h3>
                    <div class="modcontent ">
                        <div class="product-latest-item">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#"><img src="them/image/demo/shop/product/m1.jpg" alt="Cisi Chicken" title="Cisi Chicken" class="img-responsive" style="width: 100px; height: 82px;"></a>
                                </div>
                                <div class="media-body">
                                    <div class="caption">
                                        <h4><a href="#">Sunt Molup</a></h4>

                                        <div class="price">
                                            <span class="price-new">$100.00</span>
                                        </div>
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="product-latest-item">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#"><img src="them/image/demo/shop/product/m2.jpg" alt="Cisi Chicken" title="Cisi Chicken" class="img-responsive" style="width: 100px; height: 82px;"></a>
                                </div>
                                <div class="media-body">
                                    <div class="caption">
                                        <h4><a href="#">Et Spare</a></h4>

                                        <div class="price">
                                            <span class="price-new">$99.00</span>
                                        </div>
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="product-latest-item">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#"><img src="them/image/demo/shop/product/18.jpg" alt="Cisi Chicken" title="Cisi Chicken" class="img-responsive" style="width: 100px; height: 82px;"></a>
                                </div>
                                <div class="media-body">
                                    <div class="caption">
                                        <h4><a href="#">Cisi Chicken</a></h4>

                                        <div class="price">
                                            <span class="price-new">$59.00</span>
                                        </div>
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="product-latest-item transition">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#"><img src="them/image/demo/shop/product/9.jpg" alt="Cisi Chicken" title="Cisi Chicken" class="img-responsive" style="width: 100px; height:82px;"></a>
                                </div>
                                <div class="media-body">
                                    <div class="caption">
                                        <h4><a href="#">Kevin Labor</a></h4>
                                        <div class="price">
                                            <span class="price-new">$245.00</span>
                                        </div>
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="module">
                    <div class="modcontent clearfix">
                        <div class="banners">
                            <div>
                                <a href="#"><img src="them/image/demo/cms/left-image-static.png" alt="left-image"></a>
                            </div>
                        </div>

                    </div>
                </div>
            </aside>
            <!--Left Part End -->

            <!--Middle Part Start-->
            <div id="content" class="col-md-9 col-sm-8">
                <div class="products-category">
                    <!--changed listings-->
                    <div class="products-list row grid">

<?php

$catid = $_GET["pageid"];
$cats =  getAllFrom("categoris", "ID", "where parent = " . $catid);

foreach ($cats as  $Cat){
    $cat_name = $_GET["pageid"];

    
   $getItem = $con->prepare("SELECT * FROM items WHERE cat_id = ? ORDER BY item_ID DESC ");

   $getItem->execute(array($Cat["ID"]));

   $items = $getItem->fetchAll();


   

    foreach ($items as $item){
       
?>

<div class="product-layout col-md-4 col-sm-6 col-xs-12 ">
<div class="product-item-container">
    <div class="left-block">
        <div class="product-image-container lazy second_img ">
            <?php if (!empty($item["item_img"])){
                                    
    ?>
    <img data-src="<?php echo "admin/data/uploads/" . $item["item_img"]; ?>" src="them/data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  alt="Apple Cinema 30&quot;" class="img-responsive" />
            <img data-src="<?php echo "admin/data/uploads/" . $item["item_img_2"]; ?>" src="them/data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  alt="Apple Cinema 30&quot;" class="img_0 img-responsive" />

        <?php  }else { ?>

        <img src="admin\data\uploads\no-image.jpg"  alt="Apple Cinema 30&quot;" class="img-responsive" />
        <img src="admin\data\uploads\no-image.jpg"  alt="Apple Cinema 30&quot;" class="img_0 img-responsive" />
        
        <?php } ?>
       </div>
    </div>


    <div class="right-block">
        <div class="caption">
            <h4><a href="item.php?itemid=<?php echo $item["item_ID"]?>"><?php echo $item["Name"] ?></a></h4>
            <div class="ratings">
                <div class="rating-box">
                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                </div>
            </div>

            <div class="price">
                <span class="price-new"><?php echo $item["Price"] ?> TL</span>
            </div>
            <div class="description item-desc hidden">
                <p><?php echo $item["Description"] ?></p>
            </div>
        </div>

        <div class="button-group">
            <button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs">Add to Cart</span></button>
            <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('42');"><i class="fa fa-heart"></i></button>
            <button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
        </div>
    </div><!-- right block -->

 </div>
</div>
                        <div class="clearfix visible-xs-block"></div>

 <?php } }?>


                    </div>					<!--// End Changed listings-->
                </div>

            </div>


        </div>
        <!--Middle Part End-->
    </div>
    <!-- //Main Container -->

<?php include $tel . 'footer.php';
?>




