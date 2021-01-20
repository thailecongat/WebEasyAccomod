<?php
require_once 'helpers/Helper.php';
require_once 'views/layouts/header.php';
?>

<!--Main container start -->
<main class="main-container">

    <div class="col-12 col-sm-3">
        <div class="card bg-light mb-3">
            <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Categories</div>
            <ul class="list-group category_block">
                <li class="list-group-item"><a href="category.html">Cras justo odio</a></li>
                <li class="list-group-item"><a href="category.html">Dapibus ac facilisis in</a></li>
                <li class="list-group-item"><a href="category.html">Morbi leo risus</a></li>
                <li class="list-group-item"><a href="category.html">Porta ac consectetur ac</a></li>
                <li class="list-group-item"><a href="category.html">Vestibulum at eros</a></li>
            </ul>
        </div>
        <div class="card bg-light mb-3">
            <div class="card-header bg-success text-white text-uppercase">Last product</div>
            <div class="card-body">
                <img class="img-fluid" src="https://dummyimage.com/600x400/55595c/fff" />
                <h5 class="card-title">Product title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <p class="bloc_left_price">99.00 $</p>
            </div>
        </div>
    </div>
    <section class="main-content">
        <div class="main-content-wrapper">

            <div class="content-body">
                <div class="alert alert-success" role="alert">
                    Thêm sản phẩm vào giỏ hàng thành công
                </div>
                <div class="content-timeline">
                    <!--Timeline header area start -->
                    <div class="post-list-header">
                        <span class="post-list-title">Giỏ hàng của bạn</span>
                    </div>
                    <!--Timeline header area end -->
                    <!--Timeline items start -->
                    <?php if (!isset($_SESSION['cart'])): ?>
                        <h4>Giỏ hàng trống</h4>
                    <?php else: ?>
                        <div class="timeline-items">
                            <form action="" method="post">
                                <table class="table table-bordered">

                                    <tbody>
                                    <tr>
                                        <th width="40%">Tên sản phẩm</th>
                                        <th width="12%">Số lượng</th>
                                        <th>Giá</th>
                                        <th>Thành tiền</th>
                                        <th></th>
                                    </tr>

                                    <?php foreach ($_SESSION['cart'] AS $id => $product):
                                        if (!is_numeric($id)) {
                                            continue;
                                        }
                                        $image_path = "../backend/assets/uploads/" . $product['avatar'];
                                        $alias = Helper::alias($product['title']);
                                        $product_detail_url = "chi-tiet-san-pham/$alias/$id";
                                        ?>
                                        <tr>
                                            <td>
                                                <img class="product-avatar img-responsive"
                                                     src="<?php echo $image_path; ?>" width="80">
                                                <div class="content-product">
                                                    <a href="<?php echo $product_detail_url ?>"
                                                       class="content-product-a">
                                                        <?php echo $product['title'] ?>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" min="0" name="2"
                                                       class="product-amount form-control"
                                                       value="<?php echo $product['quality']; ?>">
                                            </td>
                                            <td>
                                            <span class="product-price">
                                                <?php
                                                $price = $product['price'];
                                                $price =
                                                    number_format($price, 0, '.', ',');
                                                echo $price;
                                                ?>vnđ
                                            </span>
                                            </td>
                                            <td>
                                                <span class="product-price-total">
                                                    <?php
                                                    $price_total = $product['quality'] * $product['price'];
                                                    echo number_format($price_total, 0, '.', ',');
                                                    ?>
                                                    vnđ
                                                </span>
                                            </td>
                                            <td>
                                                <a
                                                   class="content-product-a"
                                                   href="xoa-san-pham/<?php echo $id ?>">
                                                    Xóa
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>


                                    <tr>
                                        <td colspan="5" style="text-align: right">
                                            Tổng giá trị đơn hàng:
                                            <span class="product-price">
                                            <?php

                                            echo number_format($_SESSION['cart']['total'], 0, '.', ',');
                                            ?> vnđ
                                                </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="product-payment">
                                            <input type="submit" name="submit" value="Cập nhật lại giá"
                                                   class="btn btn-primary">
                                            <a href="thanh-toan" class="btn btn-success">Đến trang thanh toán</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    <?php endif; ?>
                    <!--Timeline items end -->
                </div>

            </div>
            <div class="content-sidebar">
                <div class="sidebar_inner" style="position: absolute; top: 0px;">

                    <div class="widget-item">
                        <div class="w-header">
                            <div class="w-title">Đọc nhiều nhất</div>
                            <div class="w-seperator"></div>
                        </div>
                        <div class="w-boxed-post">
                            <ul>
                                <li>
                                    <a href="tin-tuc/arsenal-pha-ky-luc-chuyen-nhuong-cua-clb-vi-tien-dao-24-tuoi/2"
                                    "="">
                                    <div class="box-wrapper">
                                        <div class="box-left">
                                            <img src="../backend/assets/uploads/news-1565674603-news3.jpg" width="80">
                                            <!--                                    <span>--><!--</span>-->
                                        </div>
                                        <div class="box-right">
                                            <h3 class="p-title">
                                                Arsenal phá kỷ lục chuyển nhượng của CLB vì tiền đạo 24 tuổi </h3>
                                            <div class="p-icons">
                                                6 likes . 7 comments
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="tin-tuc/milinkovic-savic-dong-y-dieu-khoan-ca-nhan-o-man-utd/3" "="">
                                    <div class="box-wrapper">
                                        <div class="box-left">
                                            <img src="../backend/assets/uploads/news-1565674590-tivi.jpg" width="80">
                                            <!--                                    <span>--><!--</span>-->
                                        </div>
                                        <div class="box-right">
                                            <h3 class="p-title">
                                                Milinkovic-Savic đồng ý điều khoản cá nhân ở Man Utd </h3>
                                            <div class="p-icons">
                                                5 likes . 4 comments
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="tin-tuc/bo-truong-tran-hong-ha-khen-nu-sinh-keu-goi-'khong-tha-bong-bay'/1"
                                    "="">
                                    <div class="box-wrapper">
                                        <div class="box-left">
                                            <img src="../backend/assets/uploads/news-1565674623-product1.jpg"
                                                 width="80">
                                            <!--                                    <span>--><!--</span>-->
                                        </div>
                                        <div class="box-right">
                                            <h3 class="p-title">
                                                Bộ trưởng Trần Hồng Hà khen nữ sinh kêu gọi 'không thả bóng bay' </h3>
                                            <div class="p-icons">
                                                4 likes . 2 comments
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="tin-tuc/patrice-evra-giai-nghe/4" "="">
                                    <div class="box-wrapper">
                                        <div class="box-left">
                                            <img src="../backend/assets/uploads/news-1565674575-news1.jpg" width="80">
                                            <!--                                    <span>--><!--</span>-->
                                        </div>
                                        <div class="box-right">
                                            <h3 class="p-title">
                                                Patrice Evra giải nghệ </h3>
                                            <div class="p-icons">
                                                1 likes . 1 comments
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="widget-item">
                        <div class="w-header">
                            <div class="w-title">Carousel Posts</div>
                            <div class="w-seperator"></div>
                        </div>
                        <div class="w-carousel-post">
                            <div class="owl-carousel" id="widgetCarousel">
                                <div class="item">
                                    <a href="#">
                                        <div class="w-play-img">
                                            <img src="http://tevratgundogdu.com/works/ideabox-html-template/img/news-test-images/news-img4.jpg"
                                                 width="300">
                                            <span class="w-video-icon"><i class="material-icons"></i></span>
                                        </div>
                                        <span class="w-post-title">It has roots in a piece of classical Latin literature from</span>

                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#">
                                        <img src="http://tevratgundogdu.com/works/ideabox-html-template/img/news-test-images/news-img5.jpg"
                                             width="300">
                                        <span class="w-post-title">Lorem Ipsum used since</span>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#">
                                        <img src="http://tevratgundogdu.com/works/ideabox-html-template/img/news-test-images/news-img6.jpg"
                                             width="300">
                                        <span class="w-post-title">English versions from the 1914 translation</span>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#">
                                        <img src="http://tevratgundogdu.com/works/ideabox-html-template/img/news-test-images/news-img7.jpg"
                                             width="300">
                                        <span class="w-post-title">The standard chunk of Lorem Ipsum used since</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="seperator"></div>

                    <a href="#" class="widget-ad-box">
                        <img src="http://tevratgundogdu.com/works/ideabox-html-template/img/adbox300x250.png"
                             width="300" height="250">
                    </a>

                </div>
            </div>
        </div>
    </section>

</main>

<?php
require_once 'views/layouts/footer.php';
?>

