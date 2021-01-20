<?php
require_once 'helpers/Helper.php';
require_once 'views/layouts/header.php';
?>
<style>


</style>
<!--<div class="main-container " >-->
    <?php
    require_once 'views/layouts/error.php';
    ?>
    <div class=" py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <ul class="list-group shadow">
                    <?php foreach ($products as $product): ?>
                        <?php if($product['status']==1):?>
                        <li class="list-group-item">
                        <!-- Custom content-->
                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                            <div class="media-body order-2 order-lg-1">
                                <h5 class="mt-0 font-weight-bold mb-2"><?php echo $product['product_address']; ?></h5>
                                <p class="font-italic text-muted mb-1 ">Chủ hộ: <?php echo $product['user_name']; ?></p>
                                <p class="font-italic text-muted mb-1 "> ĐT: 0<?php
                                    echo $product['user_phone'];
                                    ?></p>
                                <p class="font-italic text-muted mb-1 "> Diện tích: <?php
                                    echo $product['dt'];
                                    ?>m<sup>2</sup></p>
                                <p class="font-italic text-muted mb-1 "><?php
                                    if($product['dh'] == 0)
                                        echo "";
                                    else echo "Điều hòa"
                                    ?>
                                    <?php
                                    if($product['nl'] == 0)
                                        echo " ";
                                    else echo " Nóng lạnh"
                                    ?></p>
                                <p class="font-italic text-muted mb-1 ">Mô tả: <?php
                                    echo $product['summary'];
                                    ?></p>
                                <p class="font-italic text-muted mb-1 ">Số lượng: <?php
                                    echo $product['qty'];
                                    ?> Phòng</p>
                                <p class="font-italic text-muted mb-1 ">Ngày đăng: <?php
                                    echo date('d-m-Y H:i:s',
                                        strtotime($product['created_at']));
                                    ?></p>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <h4 class="mt-0 font-weight-bold my-3"><?php echo number_format($product['price']); ?> VNĐ</h4>
                                    <ul class="list-inline small">
                                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                        <li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li>
                                    </ul>
                                </div>
                                <a href="<?php echo $index_link?>" class="btn btn-primary">Lưu bài đăng</a>
                                <a href="<?php echo $index_link?>" style=" color: #007bff">Báo cáo</a>
                            </div>
                            <img src="<?php echo '../backend/assets/uploads/' . $product['avatar'] ?>" alt="Generic placeholder image" width="400" class="ml-lg-5 order-1 order-lg-2">
                        </div> <!-- End -->
                    </li>
                        <?php endif;?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

</div>
<?php
require_once 'views/layouts/footer.php';
?>

