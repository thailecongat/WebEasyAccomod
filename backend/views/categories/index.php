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
      require_once 'views/layouts/error.php'
      ?>
        <h1>Quản lý tài khoản</h1>
        <a href="index.php?controller=category&action=create" class="btn btn-primary">
           <i class="fa fa-plus"></i> Thêm mới
        </a>
        <br />
        <br>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Họ và tên</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Status</th>
                <th>Created_at</th>
<!--                <th>Updated at</th>-->
                <th>Action</th>
            </tr>
          <?php if (!empty($categories)) : ?>
            <?php foreach ($categories AS $category): ?>
                  <tr>
                      <td>
                        <?php echo $category['id'] ?>
                      </td>
                      <td>
                        <?php echo $category['username'] ?>
                      </td>
                      <td>
                          <?php echo $category['name'] ?>
                      </td>
                      <td>
                        0<?php echo $category['phone'] ?>
                      </td>
                      <td>
                        <?php echo $category['email'] ?>
                      </td>
                      <td>
                        <?php echo $category['address'] ?>
                      </td>
                      <td>
                        <?php echo Helper::getStatusText($category['status']); ?>
                      </td>
                      <td>
                        <?php
                        $created_at = date('d-m-Y H:i:s', strtotime($category['created_at']));
                        echo $created_at;
                        ?>
                      </td>
<!--                      <td>-->
<!--                        --><?php
//                        $updated_at = date('d-m-Y H:i:s', strtotime($category['updated_at']));
//                        echo $updated_at;
//                        ?>
<!--                      </td>-->
                      <td>
                          <?php
                          $link_detail = "index.php?controller=category&action=detail&id=" . $category['id'];
                          $link_update = "index.php?controller=category&action=edit&id=" . $category['id'];
                          $link_delete = "index.php?controller=category&action=delete&id=" . $category['id'];
                          ?>
                          <a href="<?php echo $link_detail?>" title="Xem chi tiết">
                              <i class="fas fa-eye"></i>
                          </a> &nbsp;
                          <a href="<?php echo $link_update?>" title="Sửa">
                              <i class="fa fa-pencil-alt"></i>
                          </a> &nbsp;
                          <a href="<?php echo $link_delete?>" title="Xóa" onclick="return confirm('Are you sure delete?')">
                              <i class="fa fa-trash"></i>
                          </a>
                      </td>
                  </tr>
            <?php endforeach; ?>
          <?php else: ?>
              <tr>
                  <td colspan="5">
                      No result
                  </td>
              </tr>
          <?php endif; ?>

        </table>

    </section>
    <!-- /.content -->
</div>

<?php
require_once 'views/layouts/footer.php';
?>

