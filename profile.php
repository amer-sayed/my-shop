<?php
$pagetitle = "Profile";
session_start();
include 'init.php';


if (isset($_SESSION["user"])){

    $getUser = $con->prepare("SELECT * FROM users WHERE Fullname = ? ");
    $getUser->execute(array($usersession));
    $info = $getUser->fetch();
}else { ?>


    <script>

        function get(){
            window.location.href = "login.php";
        }
        get();
    </script>

<?php }

$userid = $info["UserID"];
$items = getitem($userid, "Member_ID", 1);
?>




    <!-- Main Container  -->
    <div class="main-container container">

        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Hesapım</a></li>
        </ul>

        <div class="row">
            <!--Middle Part Start-->
            <div class="col-sm-12" id="content">
                <p class="lead">Merhaba, <strong><?php echo $usersession; ?></strong> - Hesap bilgilerinizi güncellemek için.</p>
                <form action="index.php">
                    <div class="row">
                        <div class="col-sm-6">
                                <legend>Hesap bilgileri</legend>
                                <div class="form-group required">
                                    <label for="input-firstname" class="control-label">Ad</label>
                                    <input type="text" class="form-control" id="input-firstname" placeholder="Ad" value="<?php echo $info["Username"]; ?>" name="firstname">
                                </div>
                                <div class="form-group required">
                                    <label for="input-lastname" class="control-label">Soyad</label>
                                    <input type="text" class="form-control" id="input-lastname" placeholder="Soyad" value="<?php echo $info["Fullname"]; ?>" name="lastname">
                                </div>
                                <div class="form-group required">
                                    <label for="input-email" class="control-label">E-Mail</label>
                                    <input type="email" class="form-control" id="input-email" placeholder="E-Mail" value="<?php echo $info["Email"]; ?>" name="email">
                                </div>
                                <div class="form-group required">
                                    <label for="input-telephone" class="control-label">Telefon</label>
                                    <input type="tel" class="form-control" id="input-telephone" placeholder="Telefon" value="<?php echo $info["userPhone"]; ?>" name="telephone">
                                </div>

                            <br>
                        </div>
                        <div class="col-sm-6">
                            <fieldset>
                                <legend>Şifre değiştir</legend>
                                <div class="form-group required">
                                    <label for="input-password" class="control-label">Eski şifre</label>
                                    <input type="password" class="form-control" id="input-password" placeholder="Eski şifre" value="" name="old-password">
                                </div>
                                <div class="form-group required">
                                    <label for="input-password" class="control-label">Yeni Şifre</label>
                                    <input type="password" class="form-control" id="input-password" placeholder="Yeni Şifre" value="" name="new-password">
                                </div>
                            </fieldset>
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




            <!--Middle Part Start-->
        <legend class="mt-15 mb-20">Ürünlerim</legend>
            <div id="content" class="col-md-12 col-sm-8">
               <?php
               if (!empty($items)) { ?>
                    <!-- Filters -->
                    <div class="product-filter filters-panel">
                        <div class="row">
                            <div class="col-md-2 visible-lg">
                                <div class="view-mode">
                                    <div class="list-view">
                                        <button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip"  data-original-title="Grid"><i class="fa fa-th"></i></button>
                                        <button class="btn btn-default list " data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="short-by-show form-inline text-right col-md-7 col-sm-8 col-xs-12">
                                <div class="form-group short-by">
                                    <label class="control-label" for="input-sort">Sort By:</label>
                                    <select id="input-sort" class="form-control">
                                        <option value="" selected="selected">Default</option>
                                        <option value="">Name (A - Z)</option>
                                        <option value="">Name (Z - A)</option>
                                        <option value="">Price (Low &gt; High)</option>
                                        <option value="">Price (High &gt; Low)</option>
                                        <option value="">Rating (Highest)</option>
                                        <option value="">Rating (Lowest)</option>
                                        <option value="">Model (A - Z)</option>
                                        <option value="">Model (Z - A)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-limit">Show:</label>
                                    <select id="input-limit" class="form-control">
                                        <option value="" selected="selected">9</option>
                                        <option value="">25</option>
                                        <option value="">50</option>
                                        <option value="">75</option>
                                        <option value="">100</option>
                                    </select>
                                </div>
                            </div>
                            <div class="box-pagination col-md-3 col-sm-4 col-xs-12 text-right">
                                <ul class="pagination">
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li><li><a href="#">&gt;</a></li>
                                    <li><a href="#">&gt;|</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- //end Filters -->
                    <!--changed listings-->
                    <div class="products-list row grid">
<?php

$userid = $info["UserID"];
$items = getitem($userid, "Member_ID", 1);



    foreach ($items as $item) {

        ?>

        <div class="product-layout col-md-4 col-sm-6 col-xs-12 ">
            <div class="product-item-container">
                <div class="left-block">
                    <div class="product-image-container lazy second_img ">
                        <img data-src="them/image/demo/shop/product/e11.jpg"
                             src="them/data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                             alt="Apple Cinema 30&quot;" class="img-responsive"/>
                        <img data-src="them/image/demo/shop/product/e12.jpg"
                             src="them/data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                             alt="Apple Cinema 30&quot;" class="img_0 img-responsive"/>
                    </div>


                    <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe" href="quickview.html">
                        Quickview</a>

                </div>


                <div class="right-block">
                    <div class="caption">
                        <h4><a href="item.php?itemid=<?php echo $item["item_ID"] ?>"><?php echo $item["Name"] ?></a></h4>
                        <div class="ratings">
                            <div class="rating-box">
                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                            class="fa fa-star-o fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                            class="fa fa-star-o fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                            class="fa fa-star-o fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                            class="fa fa-star-o fa-stack-1x"></i></span>
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
                        <button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart"
                                onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span
                                    class="hidden-xs">Add to Cart</span></button>
                        <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List"
                                onclick="wishlist.add('42');"><i class="fa fa-heart"></i></button>
                        <button class="compare" type="button" data-toggle="tooltip" title="Compare this Product"
                                onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
                    </div>
                </div>

            </div>
        </div>

    <?php }

 ?>

                    </div>					<!--// End Changed listings-->
                    <!-- Filters -->
                    <div class="product-filter product-filter-bottom filters-panel" >
                        <div class="row">
                            <div class="col-md-2 hidden-sm hidden-xs">

                            </div>
                            <div class="short-by-show text-center col-md-7 col-sm-8 col-xs-12">
                                <div class="form-group" style="margin: 7px 10px">Showing 1 to 9 of 10 (2 Pages)</div>
                            </div>
                            <div class="box-pagination col-md-3 col-sm-4 text-right"><ul class="pagination"><li class="active"><span>1</span></li><li><a href="#">2</a></li><li><a href="#">&gt;</a></li><li><a href="#">&gt;|</a></li></ul></div>

                        </div>
                    </div>
                    <!-- //end Filters -->
                   <?php
               } else {
                   echo "<p>Ürün yok yeni ürün eklemek &nbsp;<a href='newitem.php'>yeni ürün ekle</a></p>";
               }
               ?>
                </div>

            </div>


    <!-- //Main Container -->




        <?php

include $tel . 'footer.php';

?>