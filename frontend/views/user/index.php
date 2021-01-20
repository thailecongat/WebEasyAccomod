<?php
require_once 'helpers/Helper.php';
require_once 'views/layouts/header.php';
?>


<div class=" py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <ul class="list-group shadow"><?php $link_user = "index.php?controller=product&action=create&id=". $id;?>
                <a href="<?php echo $link_user?>" class="btn btn-success" style="width: 100px; color: #fff"><i class="fa fa-plus"></i>Thêm mới</a>
                    <?php
                    require_once 'views/layouts/error.php';
                    ?>
                <?php foreach ($products as $product): ?>
                    <li class="list-group-item">
                        <!-- Custom content-->
                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                            <div class="media-body order-2 order-lg-1">
                                <h5 class="mt-0 font-weight-bold mb-2"><?php echo $product['product_address']; ?></h5>
<!--                                <p class="font-italic text-muted mb-1 ">Chủ hộ: --><?php //echo $product['user_name']; ?><!--</p>-->
<!--                                <p class="font-italic text-muted mb-1 "> ĐT: 0--><?php
//                                    echo $product['user_phone'];
//                                    ?><!--</p>-->
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
                                <p class="font-italic text-muted mb-1 ">Trạng thái:  <?php
                                    echo Helper::getStatusText($product['status']);
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
                                <?php
                                    $link = "index.php?controller=product&action=";
                                    $url_delete = $link. "delete&id=" . $id ."&p_id=". $product['id'];
                                    $url_update = $link. "update&id=" . $id ."&p_id=". $product['id'];
                                ?>
                                <a href="<?php echo $url_update?>" class="btn btn-primary">Chỉnh sửa</a>
                                <a href="<?php echo $url_delete?>" class="btn btn-primary">Xóa</a>
                                <a href="<?php echo $index_link?>" class="btn btn-primary">Gia hạn</a>
                            </div>
                            <img src="<?php echo '../backend/assets/uploads/' . $product['avatar'] ?>" alt="Generic placeholder image" width="400" class="ml-lg-5 order-1 order-lg-2">
                        </div> <!-- End -->
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<?php
require_once 'views/layouts/footer.php';
?>
