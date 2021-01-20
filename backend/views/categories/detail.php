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
        <h1>Chi tiết tài khoản <?php echo $category['id'] ?></h1>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>
                  <?php echo $category['id'] ?>
                </td>
            </tr>
            <tr>
                <th>Name</th>
                <td>
                  <?php echo $category['name'] ?>
                </td>
            </tr>
            <tr>
                <th>Số Điện thoại</th>
                <td>
                    0<?php echo $category['phone'] ?>
                </td>
            </tr><tr>
                <th>Email</th>
                <td>
                    <?php echo $category['email'] ?>
                </td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                  <?php echo Helper::getStatusText($category['status']) ?>
                </td>
            </tr>
            <tr>
                <th>Created at</th>
                <td>
                  <?php
                  $created_at = date('d-m-Y H:i:s', strtotime($category['created_at']));
                  echo $created_at;
                  ?>
                </td>
            </tr>
            <tr>
                <th>Update at</th>
                <td>
                  <?php
                  $updated_at = date('d-m-Y H:i:s', strtotime($category['updated_at']));
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

