<?php
$pagetitle = "Anasyafa";

session_start();

include 'init.php';

?>

<!-- Block Spotlight1  -->
<section class="so-spotlight1 ">
<div class="container">
<div class="row">
<div id="yt_header_left" class="col-md-9 col-md-12">
    <div class="slider-container ">
        <div id="so-slideshow" >
            <div class="module navbar-category clearfix hidden-lg hidden-md">
                <div class="navbar-header">
                    <button type="button" id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle fa fa-list-alt"></button>
                    All Categories
                </div>
            </div>
            <div class="module ">
                <div class="yt-content-slider yt-content-slider--arrow1"  data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                    <div class="yt-content-slide">
                        <a href="#"><img src="them/image/demo/slider/v2-slide1.jpg" alt="slider1" class="img-responsive"></a>
                    </div>
                    <div class="yt-content-slide">
                        <a href="#"><img src="them/image/demo/slider/v2-slide2.jpg" alt="slider2" class="img-responsive"></a>
                    </div>
                    <div class="yt-content-slide">
                        <a href="#"><img src="them/image/demo/slider/v2-slide3.jpg" alt="slider3" class="img-responsive"></a>
                    </div>
                </div>
                <div class="loadeding"></div>
            </div>

        </div>


    </div>
</div>
<div id="yt_header_right" class="col-md-3 hidden-sm hidden-xs">
    <div class="module">
        <div class="modcontent clearfix">
            <div class="banners">
                <div>
                    <a href="#"><img src="them/image/demo/cms/v3-banner-header.png" alt="left-image"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="banner-html col-sm-12">
    <div class="module customhtml policy-v3">
        <div class="modcontent clearfix">
            <div class="block-policy-v3">
                <div class="policy policy1 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="policy-inner"><span class="ico-policy"></span>
                        <h2>30 GÜN DÖNÜŞ</h2><a href="#">para iadesi</a>
                    </div>
                </div>
                <div class="policy policy2 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="policy-inner"><span class="ico-policy"></span><a href="#"><h2>Ücretsiz Kargo</h2>25 den fazla alışveriş için</a>
                    </div>
                </div>
                <div class="policy policy3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="policy-inner"><span class="ico-policy"></span><a href="#"><h2>en düşük fiyat</h2>garanti</a>
                    </div>
                </div>
                <div class="policy policy4 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="policy-inner"><span class="ico-policy"></span><a href="#"><h2>güvenli alışveriş</h2>garanti </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
<!-- //Block Spotlight1  -->

<!-- Main Container  -->
<div class="main-container container">

<div class="row">
<div id="content" class="col-md-9 col-md-push-3 col-sm-12 col-xs-12">



<div class="module">
    <div class="modcontent clearfix">
        <div class="banner-wraps ">
            <div class="m-banner row">
                <div class="banner htmlconten1 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="banners">
                        <div>
                            <a href="#"><img src="them/image/demo/cms/banner2-1.png" alt="banner1"></a>
                        </div>
                    </div>
                </div>
                <div class="htmlconten2 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="banners" style="margin-bottom:20px;">
                            <div>
                                <a href="#"><img src="them/image/demo/cms/banner2-2.png" alt="banner1"></a>
                            </div>
                    </div>

                    <div class="banners">
                        <div>
                            <a href="#"><img src="them/image/demo/cms/banner2-3.png" alt="banner1"></a>
                        </div>
                    </div>

                </div>
                <div class="banner htmlconten3 hidden-sm col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="banners">
                        <div>
                            <a href="#"><img src="them/image/demo/cms/banner2-4.png" alt="banner1"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="module tab-slider titleLine">
    <h3 class="modtitle">Yeni Ürünlen</h3>
    <div id="so_listing_tabs_2" class="so-listing-tabs first-load module">
        <div class="ltabs-wrap">
            <div class="ltabs-tabs-container" data-delay="300" data-duration="600" data-effect="starwars" data-ajaxurl="" data-type_source="0" data-lg="3" data-md="2" data-sm="2" data-xs="1"  data-margin="30">
                <!--Begin Tabs-->
                <div class="ltabs-tabs-wrap">
                <span class="ltabs-tab-selected">Jewelry &amp; Watches</span> <span class="ltabs-tab-arrow"></span>
                    <div class="item-sub-cat">
                        <ul class="ltabs-tabs cf">
                            <li class="ltabs-tab tab-sel"  data-active-content=".items-category-20"></li>
                        </ul>
                    </div>
                </div>
                <!-- End Tabs-->
            </div>
            <div class="ltabs-items-container">
                <!--Begin Items-->
                <div class="ltabs-items ltabs-items-selected items-category-20 grid" data-total="10">
                    <div class="ltabs-items-inner ltabs-slider ">
                        <?php
                     $items =  getAllFrom("items", "item_ID", "WHERE Approve = 1");

                        foreach ($items as $item){
                        ?>
                        <div class="ltabs-item product-layout">
                            <div class="product-item-container">
                                <div class="left-block">
                                    <div class="product-image-container second_img ">
                                    <?php if (!empty($item["item_img"])){
                                    
                                    ?>

                                        <img src="<?php echo "admin/data/uploads/" . $item["item_img"]; ?>"  alt="Apple Cinema 30&quot;" class="img-responsive" />
                                      <img src="<?php echo "admin/data/uploads/" . $item["item_img_2"]; ?>"  alt="Apple Cinema 30&quot;" class="img_0 img-responsive" />

                                      <?php  }else { ?>

                                        <img src="admin\data\uploads\no-image.jpg"  alt="Apple Cinema 30&quot;" class="img-responsive" />
                                        <img src="admin\data\uploads\no-image.jpg"  alt="Apple Cinema 30&quot;" class="img_0 img-responsive" />
                                        
                                      <?php } ?>
                                    </div>
                                </div>
                                <form action="<?php 
                                        
                                        if (isset($_SESSION['uid']) > 0){

                                            echo "cart.php?do=manage";
                                        }else{
                                            echo "login.php";
                                        }
                                        
                                        
                                        ?>" method="post">
                                        <input type="hidden" name="u_id" value="<?php echo $_SESSION["uid"] ?>">
                                        <input type="hidden" name="price" value="<?php echo $item["Price"]; ?>">
                                        <input type="hidden" name="item_name" value="<?php echo $item["Name"] ?>">
                                        <input type="hidden" name="img" value="<?php echo $item["item_img"]; ?>">
                                        <input type="hidden" name="item_id" value="<?php echo $item["item_ID"]; ?>">
                                <div class="right-block">
                                    <div class="caption">
                                        <h4><a href="item.php?itemid=<?php echo $item["item_ID"] . "&parent="?>"><?php echo $item["Name"] ?></a></h4>
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
                                            <span class="price-new"><?php echo $item["Price"]; ?> TL</span>
                                        </div>
                                    </div>

                                      <div class="button-group">
                                      
                                        
                                        <button class="addToCart"><i class="fa fa-shopping-cart"></i> <span class="">Add to Cart</span></button>
                                        </form>
                                        <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('42');"><i class="fa fa-heart"></i></button>
                                        <button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
                                      </div>
                                </div><!-- right block -->
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                </div>
                <div class="ltabs-items items-category-18 grid" data-total="11">
                    <div class="ltabs-loading"></div>

                </div>
                <div class="ltabs-items  items-category-25 grid" data-total="11">
                    <div class="ltabs-loading"></div>
                </div>
            </div>
            <!--End Items-->


        </div>

    </div>
</div>

<div class="module no-margin titleLine ">
    <h3 class="modtitle">COLLECTIONS</h3>
    <div class="modcontent clearfix">
        <div id="collections_block" class="clearfix  block">
            <ul class="width6">
                <li class="collect collection_0">
                    <div class="color_co"><a href="#">Furniture</a> </div>
                </li>
                <li class="collect collection_1">
                    <div class="color_co"><a href="#">Gift idea</a> </div>
                </li>
                <li class="collect collection_2">
                    <div class="color_co"><a href="#">Cool gadgets</a> </div>
                </li>
                <li class="collect collection_3">
                    <div class="color_co"><a href="#">Outdoor activities</a> </div>
                </li>
                <li class="collect collection_4">
                    <div class="color_co"><a href="#">Accessories for</a> </div>
                </li>

            </ul>
        </div>
    </div>
</div>

</div>

<aside class="col-md-3 col-md-pull-9 col-sm-12  content-aside left_column">
<div class="module aside-verticalmenu">
    <div class="modcontent">
        <div class="sidebar-menu ">
            <div class="responsive so-megamenu ">
                <div class="so-vertical-menu no-gutter compact-hidden">
                    <nav class="navbar-default">
                        <div class="container-megamenu vertical open">
                            <div id="menuHeading">
                                <div class="megamenuToogle-wrapper">
                                    <div class="megamenuToogle-pattern">
                                        <div class="container">
                                            <div>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            Kategoriler
                                            <i class="fa pull-right arrow-circle fa-chevron-circle-up"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="navbar-header hidden-sm hidden-xs">
                                <button type="button" id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle fa fa-list-alt">
                                </button>
                                All Categories
                            </div>
<div class="vertical-wrapper" >
<span id="remove-verticalmenu" class="fa fa-times"></span>
<div class="megamenu-pattern">
<div class="container">
<ul class="megamenu">
    <?php



    foreach (getcat() as $cat) {

        echo '<li class="item-vertical style1 with-sub-menu hover">';
        echo '<p class="close-menu"></p>';
        echo '<a href="categoris.php?pageid=' . $cat["ID"] . '&pagename=' . "&parent=" . $cat["parent"] . "&" . str_replace(' ','-',$cat["Name"]) . '" class="clearfix">';
        echo '<span class="icon">' . $cat["cat_icon"] . '</span>';
        echo '<span>' . $cat["Name"] . '</span>';
        echo '<b class="caret"></b>';
        echo '</a>';

        $childcat = $con->prepare("SELECT * FROM categoris where parent =  {$cat["ID"]}");
        $childcat->execute();
        $childs = $childcat->fetchAll();

        if (! empty($childs)){

        ?>

        <div class="sub-menu" data-subwidth="100" >
            <div class="content" >
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-10 static-menu">
                                <div class="menu">
                                    <ul>
                                        <li>
                                            <ul><?php



                                            foreach ($childs as $c){

                                                echo "<li>";
                                                echo '<a href="c_categori.php?pageid=' . $c["ID"] . '&pagename=' . "&parent=" . $c["parent"] . "&" . str_replace(' ','-',$cat["Name"]) . '" class="clearfix">';
                                                echo $c["Name"] . "</a>";
                                                echo  "</li>";
                                            }
                                           ?></ul>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <?php } echo '</li>';

    }
  ?>
       </ul>
      </div>
      </div>
     </div>
    </div>
   </nav>
  </div>
</div>

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
<div class="module titleLine">
    <h3 class="modtitle">Clients say</h3>
    <div class="modcontent">
        <div class="block-clientsay block ">
            <div class="yt-content-slider slider-clients-say"  data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                <div class="yt-content-slide">
                    <div class="client-cont">Aliquam ut tellus dignissim, cursus erat ultricies tellus. Nulla tempus sollicitudin mauris cursus dictum. Etiam id diam diam.</div>
                    <div class="client-info"><img src="them/image/demo/cms/client-img1.jpg" alt="">
                        <div class="inner">Aliquam Tellus
                            <p>Vitae Ornare Mauris</p>
                        </div>
                    </div>
                </div>
                <div class="yt-content-slide">
                    <div class="client-cont">Aliquam ut tellus dignissim, cursus erat ultricies tellus. Nulla tempus sollicitudin mauris cursus dictum. Etiam id diam diam.</div>
                    <div class="client-info"><img src="them/image/demo/cms/client-img1.jpg" alt="">
                        <div class="inner">Aliquam Tellus
                            <p>Vitae Ornare Mauris</p>
                        </div>
                    </div>
                </div>
                <div class="yt-content-slide">
                    <div class="client-cont">Aliquam ut tellus dignissim, cursus erat ultricies tellus. Nulla tempus sollicitudin mauris cursus dictum. Etiam id diam diam.</div>
                    <div class="client-info"><img src="them/image/demo/cms/client-img1.jpg" alt="">
                        <div class="inner">Aliquam Tellus
                            <p>Vitae Ornare Mauris</p>
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
                <a href="#"><img src="them/image/demo/cms/v3-banner-home-left.jpg" alt="banner1"></a>
            </div>
        </div>

    </div>
</div>
</aside>


</div>
</div>
<!-- //Main Container -->

<script type="text/javascript">
<!--
var $typeheader = 'header-home3';
//-->
</script>



</div>
<!-- Social widgets -->
<section class="social-widgets visible-lg">
<ul class="items">
<li class="item item-01 facebook"> <a href="php/facebook8859.html?account=envato" class="tab-icon"><span class="fa fa-facebook"></span></a>
<div class="tab-content">
<div class="title">
    <h5>FACEBOOK</h5>
</div>
<div class="loading">
    <img src="them/image/theme/lazy-loader.gif" class="ajaxloader" alt="loader">
</div>
</div>
</li>
<li class="item item-02 twitter"> <a href="php/twitterfdaa.html?account_twitter=envato" class="tab-icon"><span class="fa fa-twitter"></span></a>
<div class="tab-content">
<div class="title">
    <h5>TWITTER FEEDS</h5>
</div>
<div class="loading">
    <img src="them/image/theme/lazy-loader.gif" class="ajaxloader" alt="loader">
</div>
</div>
</li>
<li class="item item-03 youtube"> <a href="php/youtubevideo2de8.html?account_video=PY2RLgTmiZY" class="tab-icon"><span class="fa fa-youtube"></span></a>
<div class="tab-content">
<div class="title">
    <h5>YouTube</h5>
</div>
<div class="loading"> <img src="them/image/theme/lazy-loader.gif" class="ajaxloader" alt="loader"></div>
</div>
</li>
</ul>
</section>	<!-- End Social widgets -->

<?php

include $tel . 'footer.php';

?>