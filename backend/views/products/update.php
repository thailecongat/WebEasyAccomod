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
        <h1>Cập nhật bài đăng</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Chủ hộ</label>
                <select name="user_id" class="form-control">
                    <?php foreach($categories AS $category):
                        $selected = "";
                    //tại từng vòng lặp, nếu category_id hiện tại cảu sản phẩm
//                    trùng với category id tương ứng thì gán giá trị cho biến
//                    selected
                        if ($product['user_id'] == $category['id']) {
                            $selected = "selected=TRUE";
                        }
                        ?>
                        <option <?php echo $selected; ?>
                                value="<?php echo $category['id'] ?>">
                            <?php echo $category['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="address" class="form-control"
                       value="<?php echo $product['product_address']?>" />
            </div>
            <div class="form-group">
                <label>Ảnh Phòng</label>
                <input type="file" name="avatar"
                       class="form-control" />
<!--                nếu trường avatar đang có giá trị, nghĩa là đã upload ảnh-->
<!--                thì cần hiển thị ảnh-->
                <?php if (!empty($product['avatar'])): ?>
                    <img src="assets/uploads/<?php echo $product['avatar']?>"
                         height="100px" />
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label>Nhập giá phòng</label>
                <input type="number" name="price" class="form-control"
                       value="<?php echo isset($_POST['price']) ?
                           $_POST['price'] : $product['price']?>" />
            </div>
            <div class="form-group">
                <label>Nhập diện tích</label>
                <input type="number" name="dt" class="form-control"
                       value="<?php echo isset($_POST['dt']) ?
                           $_POST['dt'] : $product['dt']?>" />
            </div>
            <div class="form-group">
                <label>Số lượng phòng</label>
                <input type="number" name="qty" class="form-control"
                       value="<?php echo $product['qty']?>" />
            </div>
            <div class="form-group">
                <label>Điều hòa</label>
                <select name="dh" class="form-control">
                    <option value="0">Không</option>
                    <option value="1" <?php if($product['dh']==1) echo "selected='true'"?>>Có</option>
                </select>
            </div>
            <div class="form-group">
                <label>Nóng lạnh</label>
                <select name="nl" class="form-control">
                    <option value="0">Không</option>
                    <option value="1" <?php if($product['nl']==1) echo "selected='true'"?>>Có</option>
                </select>
            </div>
            <div class="form-group">
                <label>Mô tả ngắn sản phẩm</label>
                <textarea name="summary" class="form-control">
                    <?php echo isset($_POST['summary'])
                        ? $_POST['summary'] : $product['summary']?>
                </textarea>
            </div>

<!--            <div class="form-group">-->
<!--                <label>Mô tả chi tiết sản phẩm</label>-->
<!--                <textarea id="ckeditor-content"-->
<!--                          name="content" class="form-control">-->
<!--                    --><?php //echo isset($_POST['content'])
//                        ? $_POST['content'] : $product['content'] ?>
<!--                </textarea>-->
<!--            </div>-->

            <div class="form-group">
                <label>Trạng thái</label>
                <?php
                $selected_inactive = '';
                $selected_active = '';
                switch ($product['status']) {
                    case Helper::STATUS_INACTIVE:
                        $selected_inactive = "selected=TRUE";
                        break;
                    case Helper::STATUS_ACTIVE:
                        $selected_active = "selected=TRUE";
                        break;
                }
                ?>
                <select name="status" class="form-control">
                    <option <?php echo $selected_inactive?>
                            value="<?php echo Helper::STATUS_INACTIVE ?>">
                        <?php echo Helper::STATUS_INACTIVE_TEXT; ?>
                    </option>
                    <option <?php echo $selected_active ?>
                            value="<?php echo Helper::STATUS_ACTIVE; ?>">
                        <?php echo Helper::STATUS_ACTIVE_TEXT; ?>
                    </option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary"
                       name="submit" value="Lưu" />
                <a class="btn btn-secondary"
                   href="index.php?controller=product&action=index">
                    Quay lại
                </a>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>

<?php
require_once 'views/layouts/footer.php';
?>

