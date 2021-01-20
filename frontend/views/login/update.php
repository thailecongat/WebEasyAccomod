<?php
require_once 'helpers/Helper.php';
require_once 'views/layouts/header.php';
?>

<div class="content-wrapper container" style="background-color: #fff;margin-top: 3rem!important;margin-bottom: 3rem!important;border-radius: 5px;">

    <section class="content py5" style="padding: 5px; border-radius: ">
            <h1>Sửa tài khoản: <?php echo $category['username'] ?> </h1>
            <h2>ID: <?php echo $category['id'] ?></h2>
            <?php
            require_once 'views/layouts/error.php'
            ?>
            <form method="post" action="">
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input type="text" name="name"
                           value="<?php echo isset($_POST['name']) ? $_POST['name'] : $category['name'] ?>"
                           class="form-control"/>
                    <label>Số điện thoại</label>
                    <input type="number" name="phone"
                           value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : $category['phone'] ?>"
                           class="form-control"/>
                    <label>Email</label>
                    <input type="email" name="email"
                           value="<?php echo isset($_POST['email']) ? $_POST['email'] : $category['email'] ?>"
                           class="form-control"/>
                    <label>Địa chỉ</label>
                    <input type="text" name="address"
                           value="<?php echo isset($_POST['address']) ? $_POST['address'] : $category['address'] ?>"
                           class="form-control"/>
                </div>
                <div class="form-group">
                    <h4 style="color: red"><?php echo $error?></h4>
                    <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
                    <a href="index.php?controller=category" class="btn btn-secondary">Cancel</a>
                </div>
            </form>

        </section>
</div>

<?php
require_once 'views/layouts/footer.php';
?>
