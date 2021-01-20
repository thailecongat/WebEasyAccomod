<?php
require_once 'helpers/Helper.php';
require_once 'views/layouts/header.php';
?>

    <div class="content-wrapper container" style="background-color: #fff;margin-top: 3rem!important;margin-bottom: 3rem!important;border-radius: 5px;">

        <section class="content py5" style="padding: 5px; border-radius: ">
        <br>
        <h3>Tạo tài khoản</h3>
        <h5 style="color: red"><?php echo $error?></h5>
        <form method="post" action="">
            <div class="form-group">
                <label>Tên tài khoản</label>
                <input type="text" name="username" value="" class="form-control"/>
                <label>Mật khẩu</label>
                <input type="password" name="password" value="" class="form-control"/>
                <label>Nhập lại mật khẩu</label>
                <input type="password" name="password-1" value="" class="form-control"/>
                <label>Họ và tên</label>
                <input type="text" name="name" value="" class="form-control"/>
                <label>Số điện thoại</label>
                <input type="number" name="phone" value="" class="form-control"/>
                <label>Email</label>
                <input type="email" name="email" value="" class="form-control"/>
                <label>Địa chỉ</label>
                <input type="text" name="address" value="" class="form-control"/>
            </div>
            <div class="form-group subm">
                <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
                <a href="index.php">Cancel</a>
            </div>
        </form>
        </section>
    </div>
<?php
require_once 'views/layouts/footer.php';
?>