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
        <h1>Thêm mới tài khoản</h1>
          <?php
          require_once 'views/layouts/error.php';
          ?>
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
            <div class="form-group">
                <label>Trạng thái</label>
                <select name="status" class="form-control">
                    <option value="<?php echo Helper::STATUS_ACTIVE ?>">
                      <?php echo Helper::STATUS_ACTIVE_TEXT ?>
                    </option>
                    <option value="<?php echo Helper::STATUS_INACTIVE ?>">
                      <?php echo Helper::STATUS_INACTIVE_TEXT ?>
                    </option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
                <a href="index.php?controller=category" class="btn btn-secondary">Cancel</a>
            </div>
        </form>

    </section>
    <!-- /.content -->
</div>

<?php
require_once 'views/layouts/footer.php';
?>

