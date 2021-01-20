<?php
require_once 'helpers/Helper.php';
require_once 'views/layouts/header.php';
?>

<div class="content-wrapper container" style="background-color: #fff;margin-top: 3rem!important;margin-bottom: 3rem!important;border-radius: 5px;">

    <section class="content py5" style="padding: 5px; border-radius: ">
        <h1>Chỉnh sửa bài đăng</h1>
        <form action="" method="post" enctype="multipart/form-data">
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
                    <img src="../backend/assets/uploads/<?php echo $product['avatar']?>"
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
                <input type="submit" class="btn btn-primary"
                       name="submit" value="Lưu" />
                <a class="btn btn-secondary"
                   href="index.php?controller=product&action=index">
                    Quay lại
                </a>
            </div>
        </form>
    </section>
</div>
<?php
require_once 'views/layouts/footer.php';
?>