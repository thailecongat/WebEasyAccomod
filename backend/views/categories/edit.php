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
        <h1>Sửa tài khoản: <?php echo $category['username'] ?> </h1>
        <h2>ID: <?php echo $category['id'] ?></h2>
      <?php
      require_once 'views/layouts/error.php'
      ?>
        <form method="post" action="">
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" name="password"
                       value="<?php echo isset($_POST['password']) ? $_POST['password'] : $category['password'] ?>"
                       class="form-control"/>
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
                <label>Trạng thái</label>
              <?php
              $selected_active = '';
              $selected_inactive = '';
              $status = $category['status'];
              if (isset($_POST['status'])) {
                $status = $_POST['status'];
              }
              switch ($status) {
                case Helper::STATUS_ACTIVE:
                  $selected_active = "selected='true'";
                  break;
                case Helper::STATUS_INACTIVE:
                  $selected_inactive = "selected='true'";
                  break;
              }
              ?>
                <select name="status" class="form-control">
                    <option value="<?php echo Helper::STATUS_ACTIVE ?>" <?php echo $selected_active ?>>
                      <?php echo Helper::STATUS_ACTIVE_TEXT ?>
                    </option>
                    <option value="<?php echo Helper::STATUS_INACTIVE ?>" <?php echo $selected_inactive ?>>
                      <?php echo Helper::STATUS_INACTIVE_TEXT ?>
                    </option>
                </select>
            </div>
            <div class="form-group">
                <h4 style="color: red"><?php echo $error?></h4>
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

