<?php
require_once 'helpers/Helper.php';
require_once 'views/layouts/header.php';
?>

<!-- Content Wrapper. Contains page content -->
<h1>Hello</h1>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <h1>Chi tiết bài đăng <?php echo $product['id'] ?></h1>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>
                    <?php echo $product['id'] ?>
                </td>
            </tr>
            <tr>
                <th>ID chủ hộ</th>
                <td>
                    <?php echo $product['user_id'] ?>
                </td>
            </tr>
<!--            <tr>-->
<!--                <th>Tên chủ hộ</th>-->
<!--                <td>-->
<!--                    --><?php
//                    foreach ($categories as $category){
//                        if($category['id'] == $product['id'])
//                            echo $category['name'];
//                    }
//                    ?>
<!--                </td>-->
<!--            </tr>-->
            <tr>
                <th>Địa chỉ</th>
                <td>
                    <?php echo $product['product_address'] ?>
                </td>
            </tr><tr>
                <th>Ảnh phòng</th>
                <td>
                    <?php
                    $path_img = 'assets/uploads/' . $product['avatar'];
                    ?>
                    <img src="<?php echo $path_img ?>" height="50px"/>
                </td>
            </tr>
            <tr>
                <th>Giá phòng</th>
                <td>
                    <?php echo number_format($product['price']); ?> VNĐ
                </td>
            </tr>
            <tr>
                <th>Diện tích</th>
                <td>
                    <?php echo $product['dt'] ?>m<sup>2</sup>
                </td>
            </tr>
            <tr>
                <th>Số lượng</th>
                <td>
                    <?php echo $product['qty'] ?>
                </td>
            </tr>
            <tr>
                <th>Điều hòa</th>
                <td>
                    <?php if($product['dh'] == 0)
                        echo "Không";
                    else echo "Có" ?>
                </td>
            </tr>
            <tr>
                <th>Nóng lạnh</th>
                <td>
                    <?php if($product['dh'] == 0)
                        echo "Không";
                    else echo "Có" ?>
                </td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    <?php echo Helper::getStatusText($product['status']) ?>
                </td>
            </tr>
            <tr>
                <th>Created at</th>
                <td>
                    <?php
                    $created_at = date('d-m-Y H:i:s', strtotime($product['created_at']));
                    echo $created_at;
                    ?>
                </td>
            </tr>
            <tr>
                <th>Update at</th>
                <td>
                    <?php
                    $updated_at = date('d-m-Y H:i:s', strtotime($product['updated_at']));
                    echo $updated_at;
                    ?>
                </td>
            </tr>
        </table>
        <a href="index.php?controller=category" class="btn btn-secondary">Back</a>
    </section>
    <!-- /.content -->
</div>

<?php
require_once 'views/layouts/footer.php';
?>
