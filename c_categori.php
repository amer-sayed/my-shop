<?php
session_start();
  include 'init.php';

  $parent = $_GET["parent"];

  $cats = get_cat($parent);

?>

<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li>
            <a href='<?php echo "categoris.php" . "?pageid=" . $parent ?>'><?php

                foreach ($cats as  $cat){
                    echo $cat["Name"];
                }

                ?></a>
        </li>
        <li>
            <a href="#"><?php

                $cat_name = $_GET["pageid"];

                $getCat = $con->prepare('SELECT * FROM categoris where ID = ? ORDER BY ID ASC ');
                $getCat->execute(array($cat_name));

                $cats = $getCat->fetchAll();

                foreach ($cats as  $cat){
                    echo $cat["Name"];
                }


                ?></a>
        </li>

    </ul>

    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-md-12 col-sm-8">
            <div class="products-category">

                <!--changed listings-->
                <div class="products-list row grid">

                    <?php



                    $getItem = $con->prepare("SELECT * FROM items WHERE cat_id = ? ORDER BY item_ID DESC ");

                    $getItem->execute(array($cat_name));

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
                                            <span class="price-new"><?php echo $item["Price"] ?></span>
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

                    <?php } ?>


                </div>					<!--// End Changed listings-->
            </div>

        </div>


    </div>
    <!--Middle Part End-->
</div>

<?php
  include $tel . 'footer.php';
?>
