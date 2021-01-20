<?php
require_once 'helpers/Helper.php';
require_once 'views/layouts/header.php';
?>

<!-- Content Wrapper. Contains page content -->
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
        <?php
        require_once 'views/layouts/error.php';
        ?>
        <h1>Quản lý bài đăng</h1>
        <a href="index.php?controller=product&action=create" class="btn btn-primary">
            <i class="fa fa-plus"></i>Thêm mới
        </a>
        <br>
        <br>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Tên chủ hộ</th>
                <th>Địa chỉ</th>
                <th>Ảnh sản phẩm</th>
                <th>Giá phòng</th>
                <th>Diện tích</th>
                <th>Số lượng</th>
                <th>Điều hòa</th>
                <th>Nóng lạnh</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
<!--                <th>Ngày cập nhật</th>-->
                <th>Hành động</th>
            </tr>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td>
                        <?php echo $product['id']; ?>
                    </td>
                    <td>
                        <?php
                        echo $product['user_name'];
                        ?>
                    </td>
                    <td>
                        <?php echo $product['product_address']; ?>
                    </td>
                    <td>
                        <?php
                        $path_img = 'assets/uploads/' . $product['avatar'];
                        ?>
                        <img src="<?php echo $path_img ?>" height="50px"/>
                    </td>
                    <td>
                        <?php echo number_format($product['price']); ?> VNĐ
                    </td>
                    <td>
                        <?php
                        echo $product['dt'];
                        ?>m<sup>2</sup>
                    </td>
                    <td>
                        <?php
                        echo $product['qty'];
                        ?>
                    </td>
                    <td>
                        <?php
                        if($product['dh'] == 0)
                            echo "Không";
                        else echo "Có"
                        ?>
                    </td>
                    <td>
                        <?php
                        if($product['nl'] == 0)
                            echo "Không";
                        else echo "Có"
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $product['summary'];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo Helper::getStatusText($product['status']);
                        ?>
                    </td>
                    <td>
                        <?php
                        echo date('d-m-Y H:i:s',
                            strtotime($product['created_at']));
                        ?>
                    </td>
<!--                    <td>-->
<!--                        --><?php
//                        echo date('d-m-Y H:i:s',
//                            strtotime($product['updated_at']));
//                        ?>
<!--                    </td>-->
                    <td>
                        <?php
                        $url_detail = "index.php?controller=product&action=detail&id=" . $product['id'];
                        $url_update = "index.php?controller=product&action=update&id=" . $product['id'];
                        $url_delete = "index.php?controller=product&action=delete&id=" . $product['id'];
                        ?>
                        <a href="<?php echo $url_detail ?>" title="Chi tiết">
                            <i class="fa fa-eye"></i>
                        </a>&nbsp;
                        <a href="<?php echo $url_update ?>" title="Cập nhật">
                            <i class="fa fa-pencil-alt"></i> &nbsp;
                        </a>
                        <a onclick="return confirm('Xóa ?')"
                           href="<?php echo $url_delete ?>" title="Xóa">
                            <i class="fa fa-trash"></i> &nbsp;
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
    <!-- /.content -->
</div>

<?php
require_once 'views/layouts/footer.php';
?>

