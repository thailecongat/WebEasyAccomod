<?php
require_once 'helpers/Helper.php';
require_once 'views/layouts/header.php';
?>
    <style>
        .create-form{
            margin-top: 100px;
        }
        .create-form a ,input{
            width: 100px;
            height: 40px;
            text-decoration: none;
        }
        .create-form .subm input{
            color: #fff;
            background-color: #03A9F4;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
        }
        .create-form .subm a{
            color: #03A9F4;
        }
    </style>
    <div class="create-form">
        <div class="container">
            <h3>Tạo tài khoản</h3>
            <h4 style="color: red"><?php echo $error?></h4>
            <form method="post" action="">
                <div class="form-group">
                    <label>Tên tài khoản</label>
                    <input type="text" name="username" value="" class="form-control"/>
                    <label>Mật khẩu</label>
                    <input type="password" name="password" value="" class="form-control"/>
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
                    <input type="submit" name="submit" value="Save"/>
                    <a href="index.php">Cancel</a>
                </div>
            </form>
        </div>
    </div>
<?php
require_once 'views/layouts/footer.php';
?>