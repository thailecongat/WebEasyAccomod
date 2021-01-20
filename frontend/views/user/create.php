<?php
require_once 'helpers/Helper.php';
require_once 'views/layouts/header.php';
?>

<div class="content-wrapper container" style="background-color: #fff;margin-top: 3rem!important;margin-bottom: 3rem!important;border-radius: 5px;">

    <section class="content py5" style="padding: 5px; border-radius: ">
        <?php
        require_once 'views/layouts/error.php';
        ?>
        <h1>Thêm mới bài đăng</h1>
        <form action="" method="post" enctype="multipart/form-data">


            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="address" class="form-control" value="" />
            </div>

            <div class="form-group">
                <label>Ảnh phòng</label>
                <input type="file" name="avatar" class="form-control" />
            </div>

            <div class="form-group">
                <label>Nhập giá phòng</label>
                <input type="number" name="price" class="form-control"
                       value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''?>" />
            </div>
            <div class="form-group">
                <label>Diện tích</label>
                <input type="number" name="dt" class="form-control" value="" />
            </div>
            <div class="form-group">
                <label>Số lượng phòng</label>
                <input type="number" name="qty" class="form-control" value="" />
            </div>
            <div class="form-group">
                <label>Điều hòa</label>
                <select name="dh" class="form-control">
                    <option value="0">Không</option>
                    <option value="1">Có</option>
                </select>
            </div>
            <div class="form-group">
                <label>Nóng lạnh</label>
                <select name="nl" class="form-control">
                    <option value="0">Không</option>
                    <option value="1">Có</option>
                </select>
            </div>
            <div class="form-group">
                <label>Mô tả ngắn </label>
                <textarea name="summary" class="form-control"><?php echo isset($_POST['summary']) ? $_POST['summary'] : ''?></textarea>
            </div>

            <!--            <div class="form-group">-->
            <!--                <label>Mô tả chi tiết sản phẩm</label>-->
            <!--                <textarea id="ckeditor-content"-->
            <!--                          name="content" class="form-control">-->
            <!--                    --><?php //echo isset($_POST['content']) ? $_POST['content'] : '' ?>
            <!--                </textarea>-->
            <!--            </div>-->

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

