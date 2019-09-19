<?php

session_start();

getenv('REQUEST_METHOD');

include 'init.php';

$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;

$stmt = $con->prepare("SELECT items.*,  categoris.Name AS cat_name, users.Username FROM items
     INNER JOIN categoris ON categoris.ID = items.Cat_ID
      INNER JOIN users ON users.UserID = items.Member_ID WHERE item_ID = ? AND Approve = 1");

$stmt->execute(array($itemid));

$items = $stmt->fetch();

$count = $stmt->rowCount();

$pagetitle = $items["Name"];

if ($count > 0) {

$c_no =  $items["Cat_ID"];
$getCat = $con->prepare('SELECT * FROM categoris where ID = ?');
     $getCat->execute(array($c_no));
     $cats = $getCat->fetchAll();
     foreach ($cats as $cat){
     }
     $parent = $con->prepare('SELECT * FROM categoris where ID = ?');
     $parent->execute(array($cat["parent"]));
     $parents = $parent->fetchAll();
     foreach ($parents as $Parent){
     }
?>


<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="categoris.php?pageid=<?php echo $Parent["ID"] . "&parent=" . $Parent["ID"] ?> "><?php echo $Parent["Name"]; ?></a></li>
        <li><a href="c_Categori.php?pageid=<?php echo $cat["ID"] . "&parent=" . $Parent["ID"] ?> "><?php  echo $cat["Name"]; ?></a></li>
        
    </ul>

    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-md-12 col-sm-12">

            <div class="product-view row">
                <div class="left-content-product col-lg-10 col-xs-12">
                    <div class="row">
                        <div class="content-product-left  col-sm-7 col-xs-12 ">
                            <div id="thumb-slider-vertical" class="thumb-vertical-outer">
                                <span class="btn-more prev-thumb nt"><i class="fa fa-angle-up"></i></span>
                                <span class="btn-more next-thumb nt"><i class="fa fa-angle-down"></i></span>
                                <ul class="thumb-vertical">
                                    <li class="owl2-item">
                                        <a data-index="0" class="img thumbnail" data-image="image/demo/shop/product/J9.jpg" title="Canon EOS 5D">
                                            <img src="<?php echo "admin/data/uploads/" . $items["item_img"]; ?>" title="Canon EOS 5D" alt="Canon EOS 5D">
                                        </a>
                                    </li>
                                    <li class="owl2-item">
                                        <a data-index="2" class="img thumbnail" data-image="image/demo/shop/product/J5.jpg" title="Bint Beef">
                                            <img src="<?php echo "admin/data/uploads/" . $items["item_img_2"]; ?>" title="Bint Beef" alt="Bint Beef">
                                        </a>
                                    </li>
                                </ul>


                            </div>
                            <div class="large-image  vertical">
                                <img itemprop="image" class="product-image-zoom" src="<?php echo "admin/data/uploads/" . $items["item_img"]; ?>" data-zoom-image="image/demo/shop/product/J9.jpg" title="Bint Beef" alt="Bint Beef">
                            </div>
                            <a class="thumb-video pull-left" href="https://www.youtube.com/watch?v=HhabgvIIXik"><i class="fa fa-youtube-play"></i></a>

                        </div>

                        <div class="content-product-right col-sm-5 col-xs-12">
                            <div class="title-product">
                                <h1><?php echo $items["Name"]; ?></h1>
                            </div>
                            <!-- Review ---->
                            <div class="box-review form-group">
                                <div class="ratings">
                                    <div class="rating-box">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                    </div>
                                </div>

                                <a class="reviews_button" href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">0 yorum</a>	|
                                <a class="write_review_button" href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Bir değerlendirme yazın</a>
                            </div>

                            <div class="product-label form-group mb-15 mt-15">
                                <div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer">
                                    <span class="price-new" itemprop="price"><?php echo $items["Price"]; ?>TL</span>
                                </div>
                                <div class="stock"><span class="status-stock">Stok Var</span></div>
                            </div>

                            <div class="product-box-desc mb-20 mt-30">
                                <div class="inner-box-desc">
                                    <div class="price-tax"><span>üretim yeri:&nbsp;	</span><?php echo $items["Country_Made"]; ?></div>
                                    <div class="reward"><span>Satıcı:&nbsp;</span><?php echo $items["Username"]; ?></div>
                                    <div class="brand"><span>Tarih :&nbsp;</span><a href="#"><?php echo $items["Add_Date"]; ?></a></div>
                                    <div class="model"><span>Açıklama :&nbsp;	</span><?php echo $items["Description"]; ?></div>
                                </div>
                            </div>
                            <div id="product" class="mt-30">
                                <div class="form-group box-info-product">
                                    <div class="option quantity">
                                        <div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;">
                                            <label>Qty</label>
                                            <input class="form-control" type="text" name="quantity"
                                                   value="1">
                                            <input type="hidden" name="product_id" value="50">
                                            <span class="input-group-addon product_quantity_down">−</span>
                                            <span class="input-group-addon product_quantity_up">+</span>
                                        </div>
                                    </div>
                                    <div class="cart">
                                        <input type="button" data-toggle="tooltip" title="" value="Add to Cart" data-loading-text="Loading..." id="button-cart" class="btn btn-mega btn-lg" onclick="cart.add('42', '1');" data-original-title="Add to Cart">
                                    </div>
                                    <div class="add-to-links wish_comp">
                                        <ul class="blank list-inline">
                                            <li class="wishlist">
                                                <a class="icon" data-toggle="tooltip" title=""
                                                   onclick="wishlist.add('50');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i>
                                                </a>
                                            </li>
                                            <li class="compare">
                                                <a class="icon" data-toggle="tooltip" title=""
                                                   onclick="compare.add('50');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                            </div>
                            <!-- end box info product -->

                        </div>
                    </div>
                </div>

                <section class="col-lg-2 hidden-sm hidden-md hidden-xs slider-products">
                    <div class="module col-sm-12 four-block">
                        <div class="modcontent clearfix">
                            <div class="policy-detail">
                                <div class="banner-policy">
                                    <div class="policy policy1">
                                        <a href="#"> <span class="ico-policy">&nbsp;</span>30 gün
                                            <br>
                                            PARA İADE </a>
                                    </div>
                                    <div class="policy policy2">
                                        <a href="#"> <span class="ico-policy">&nbsp;</span>	MAĞAZA İÇİ DEĞİŞİM </a>
                                    </div>
                                    <div class="policy policy3">
                                        <a href="#"> <span class="ico-policy">&nbsp;</span>	en düşük fiyat  </a>
                                    </div>
                                    <div class="policy policy4">
                                        <a href="#"> <span class="ico-policy">&nbsp;</span>	alışveriş garantisi </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="producttab ">
                <div class="tabsslider  col-xs-12">
                    <ul class="nav nav-tabs">
                        <li class="item_nonactive"><a data-toggle="tab" href="#tab-review">Commentler</a></li>
                        <li class="item_nonactive"><a data-toggle="tab" href="#tab-4">Comment Yazın</a></li>
                    </ul>
                    <div class="tab-content col-xs-12">
                        <div id="tab-review" class="tab-pane fade">
                           <?php
                           $stmt = $con->prepare('SELECT comments.*, users.Username FROM comments
    INNER JOIN users ON users.UserID = comments.user_id
    WHERE item_id = ?');

                           $stmt->execute(array($items["item_ID"]));

                           $comments = $stmt->FetchAll();

                           if(empty($comments)){
                               echo "<div class='row'>";
                               echo "<div class='col-md-3'>No comment</div>";
                               echo "</div>";
                           }else {

                           foreach ($comments as $comment){
                               echo "<div class='row'>";
                               echo "<div class='col-md-3'>" . $comment["Username"] . "</div>";
                               echo "<div class='col-md-5'>" . $comment["comment"] . "</div>";
                               echo "</div>";
                           }
                           }


                           ?>
                        </div>
                        <div id="tab-4" class="tab-pane fade">
                            <form class="comment-reply" action="" method="post">
                                <div class="form-group">
                                    <textarea name="comment" class="form-control" rows="5" placeholder="Comment here"></textarea>
                                </div>
                                <div class="form-group">
                                    <a href=""><button type="submit" class="btn btn-primary">Comment</button></a>
                                </div>
                            </form>
                            <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                                $comment = filter_var($_POST["comment"], FILTER_SANITIZE_STRING);
                                $itemID =  $items["item_ID"];
                                $user_id = $_SESSION['uid'];

                                if(! empty($comment)){

                                  $stmt = $con->prepare("INSERT INTO 
                                                         comments(comment, status, comment_date, item_id, user_id)
                                                         VALUES(:comment, 0, NOW(), :itemid, :userid)");
                                  $stmt->execute(array(
                                      "comment" => $comment,
                                      "itemid"  => $itemID,
                                      "userid"  => $user_id,

                                  ));

                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            <div class="related titleLine products-list grid module ">
                <h3 class="modtitle">İLGİLİ ÜRÜNLER  </h3>
                <div class="releate-products ">
                    <div class="product-layout">
                        <div class="product-item-container">
                            <div class="left-block">
                                <div class="product-image-container second_img ">
                                    <img  src="them/image/demo/shop/product/e11.jpg"  title="Apple Cinema 30&quot;" class="img-responsive" />
                                    <img  src="them/image/demo/shop/product/e12.html"  title="Apple Cinema 30&quot;" class="img_0 img-responsive" />
                                </div>
                                <!--Sale Label-->
                                <span class="label label-sale">Sale</span>
                                <!--full quick view block-->
                                <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.html">  Quickview</a>
                                <!--end full quick view block-->
                            </div>


                            <div class="right-block">
                                <div class="caption">
                                    <h4><a href="product.html">Apple Cinema 30&quot;</a></h4>
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
                                        <span class="price-new">$74.00</span>
                                        <span class="price-old">$122.00</span>
                                        <span class="label label-percent">-40%</span>
                                    </div>
                                    <div class="description item-desc hidden">
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut l..</p>
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
                    <div class="product-layout">
                        <div class="product-item-container">
                            <div class="left-block">
                                <div class="product-image-container second_img ">
                                    <img  src="them/image/demo/shop/product/11.jpg"  title="Apple Cinema 30&quot;" class="img-responsive" />
                                    <img  src="them/image/demo/shop/product/10.jpg"  title="Apple Cinema 30&quot;" class="img_0 img-responsive" />

                                </div>
                                <!--Sale Label-->
                                <span class="label label-sale">Sale</span>
                                <!--full quick view block-->
                                <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.html">  Quickview</a>
                                <!--end full quick view block-->
                            </div>


                            <div class="right-block">
                                <div class="caption">
                                    <h4><a href="product.html">Apple Cinema 30&quot;</a></h4>
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
                                        <span class="price-new">$74.00</span>
                                        <span class="price-old">$122.00</span>
                                        <span class="label label-percent">-40%</span>
                                    </div>
                                    <div class="description item-desc hidden">
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut l..</p>
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
                    <div class="product-layout ">
                        <div class="product-item-container">
                            <div class="left-block">
                                <div class="product-image-container second_img ">
                                    <img  src="them/image/demo/shop/product/35.jpg"  title="Apple Cinema 30&quot;" class="img-responsive" />
                                    <img  src="them/image/demo/shop/product/34.jpg"  title="Apple Cinema 30&quot;" class="img_0 img-responsive" />
                                </div>
                                <!--Sale Label-->
                                <span class="label label-sale">Sale</span>
                                <!--full quick view block-->
                                <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.html">  Quickview</a>
                                <!--end full quick view block-->
                            </div>


                            <div class="right-block">
                                <div class="caption">
                                    <h4><a href="product.html">Apple Cinema 30&quot;</a></h4>
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
                                        <span class="price-new">$74.00</span>
                                        <span class="price-old">$122.00</span>
                                        <span class="label label-percent">-40%</span>
                                    </div>
                                    <div class="description item-desc hidden">
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut l..</p>
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
                    <div class="product-layout ">
                        <div class="product-item-container">
                            <div class="left-block">
                                <div class="product-image-container second_img ">
                                    <img  src="them/image/demo/shop/product/35.jpg"  title="Apple Cinema 30&quot;" class="img-responsive" />
                                    <img  src="them/image/demo/shop/product/34.jpg"  title="Apple Cinema 30&quot;" class="img_0 img-responsive" />
                                </div>
                                <!--Sale Label-->
                                <span class="label label-sale">Sale</span>
                                <!--full quick view block-->
                                <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.html">  Quickview</a>
                                <!--end full quick view block-->
                            </div>


                            <div class="right-block">
                                <div class="caption">
                                    <h4><a href="product.html">Apple Cinema 30&quot;</a></h4>
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
                                        <span class="price-new">$74.00</span>
                                        <span class="price-old">$122.00</span>
                                        <span class="label label-percent">-40%</span>
                                    </div>
                                    <div class="description item-desc hidden">
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut l..</p>
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
                </div>
            </div>

            <script type="text/javascript">
                $(document).ready(function() {
                    var zoomCollection = '.large-image img';
                    $( zoomCollection ).elevateZoom({
                        zoomType    : "inner",
                        lensSize    :"200",
                        easing:true,
                        gallery:'thumb-slider-vertical',
                        cursor: 'pointer',
                        galleryActiveClass: "active"
                    });
                    $('.large-image').magnificPopup({
                        items: [
                            {src: 'image/demo/shop/product/J9.jpg' },
                            {src: 'image/demo/shop/product/J6.jpg' },
                            {src: 'image/demo/shop/product/J5.jpg' },
                            {src: 'image/demo/shop/product/J4.jpg' },
                        ],
                        gallery: { enabled: true, preload: [0,2] },
                        type: 'image',
                        mainClass: 'mfp-fade',
                        callbacks: {
                            open: function() {

                                var activeIndex = parseInt($('#thumb-slider-vertical .img.active').attr('data-index'));
                                var magnificPopup = $.magnificPopup.instance;
                                magnificPopup.goTo(activeIndex);
                            }
                        }
                    });
                    $("#thumb-slider-vertical .owl2-item").each(function() {
                        $(this).find("[data-index='0']").addClass('active');
                    });

                    $('.thumb-video').magnificPopup({
                        type: 'iframe',
                        iframe: {
                            patterns: {
                                youtube: {
                                    index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
                                    id: 'v=', // String that splits URL in a two parts, second part should be %id%
                                    src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
                                },
                            }
                        }
                    });

                    $('.product-options li.radio').click(function(){
                        $(this).addClass(function() {
                            if($(this).hasClass("active")) return "";
                            return "active";
                        });

                        $(this).siblings("li").removeClass("active");
                        $(this).parent().find('.selected-option').html('<span class="label label-success">'+ $(this).find('img').data('original-title') +'</span>');
                    });

                    var _isMobile = {
                        iOS: function() {
                            return navigator.userAgent.match(/iPhone/i);
                        },
                        any: function() {
                            return (_isMobile.iOS());
                        }
                    };

                    $(".thumb-vertical-outer .next-thumb").click(function () {
                        $( ".thumb-vertical-outer .lSNext" ).trigger( "click" );
                    });

                    $(".thumb-vertical-outer .prev-thumb").click(function () {
                        $( ".thumb-vertical-outer .lSPrev" ).trigger( "click" );
                    });

                    $(".thumb-vertical-outer .thumb-vertical").lightSlider({
                        item: 3,
                        autoWidth: false,
                        vertical:true,
                        slideMargin: 15,
                        verticalHeight:340,
                        pager: false,
                        controls: true,
                        prevHtml: '<i class="fa fa-angle-up"></i>',
                        nextHtml: '<i class="fa fa-angle-down"></i>',
                        responsive: [
                            {
                                breakpoint: 1199,
                                settings: {
                                    verticalHeight: 330,
                                    item: 3,
                                }
                            },
                            {
                                breakpoint: 1024,
                                settings: {
                                    verticalHeight: 235,
                                    item: 2,
                                    slideMargin: 5,
                                }
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    verticalHeight: 340,
                                    item: 3,
                                }
                            }
                            ,
                            {
                                breakpoint: 480,
                                settings: {
                                    verticalHeight: 100,
                                    item: 1,
                                }
                            }

                        ]

                    });



                    // Product detial reviews button
                    $(".reviews_button,.write_review_button").click(function (){
                        var tabTop = $(".producttab").offset().top;
                        $("html, body").animate({ scrollTop:tabTop }, 1000);
                    });
                });

            </script>


        </div>


    </div>
    <!--Middle Part End-->
</div>
<!-- //Main Container -->
</div>


<?php

}else { ?>
<div class="container">
    <div class="row">
        <div class="error mb-30 mx-auto col-md-6 float-right">
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i>error</div>
       </div>
     </div>
</div>
 <?php }



include $tel . 'footer.php';

?>
