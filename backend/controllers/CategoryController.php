<?php

require_once 'models/Category.php';
class CategoryController
{
  public function index() {
    $category_model = new Category();
    $categories = $category_model->index();

    require_once 'views/categories/index.php';
  }

  public function create() {
    $error = '';
    if (isset($_POST['submit'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $status = $_POST['status'];

      if (empty($username)) {
        $error = "Họ và tên không được để trống";
      }
      else if (empty($password)) {
          $error = "Email không được để trống";
      }
      else if (empty($name)) {
          $error = "Họ và tên không được để trống";
      }
      else if (empty($email)) {
        $error = "Email không được để trống";
      }
      else if (empty($phone)) {
        $error = "Số điện thoại không được để trống";
      }
      else if (empty($address)) {
        $error = "Địa chỉ không được để trống";
      }
      else {
        $category_model = new Category();
        $arr_params = [
          ':username' => $username,
          ':password' => $password,
          ':name' => $name,
          ':phone' => $phone,
          ':email' => $email,
          ':address' => $address,
          ':status' => $status,
        ];
        $is_insert = $category_model->insert($arr_params);

        if ($is_insert) {
          $_SESSION['success'] = 'Tạo tài khoản  thành công';
        }
        else {
          $_SESSION['error'] = 'Thêm mới thất bại';
        }

        header("Location: index.php?controller=category");
        exit();
      }
    }

    require_once 'views/categories/create.php';
  }

  public function edit() {

    //check validate
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = "ID phải là số";
      header("Location: index.php?controller=category");
      exit();
    }

    $id = $_GET['id'];
    //get category by id
    $category_model = new Category();
    $category = $category_model->getCategoryById($id);
    $error = '';
//    submit form
    if (isset($_POST['submit'])) {
        $password = $_POST['password'];
      $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
      $status = $_POST['status'];
      if (empty($name)) {
        $error = "Họ và tên không được để trống";
      }
        if (empty($password)) {
            $error = "Mật khẩu không được để trống";
        }
      else if (empty($email)) {
          $error = "Email không được để trống";
      }
      else if (empty($phone)) {
          $error = "Số điện thoại không được để trống";
      }
      else if (empty($address)) {
          $error = "Địa chỉ không được để trống";
      }
      else {
        $arr_params = [
          ':id' => $id,
            ':password' => $password,
          ':name' => $name,
            ':phone' => $phone,
            ':email' => $email,
            ':address' => $address,
          ':status' => $status,
          ':updated_at' => date("Y-m-d H:i:s"),
        ];
//        var_dump($arr_params);
//        die;
        $is_update = $category_model->update($arr_params);
        if ($is_update) {
          $_SESSION['success'] = 'Cập nhật danh mục thành công';
        }
        else {
          $_SESSION['error'] = 'Cập nhật thất bại';
        }
        header("Location: index.php?controller=category");
        exit();
      }
    }

    require_once 'views/categories/edit.php';
  }

  public function detail() {
    //check validate
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = "ID phải là số";
      header("Location: index.php?controller=category");
      exit();
    }

    $id = $_GET['id'];
    //get category by id
    $category_model = new Category();
    $category = $category_model->getCategoryById($id);

    require_once 'views/categories/detail.php';
  }

  public function delete() {
    //check validate
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = "ID phải là số";
      header("Location: index.php?controller=category");
      exit();
    }

    $id = $_GET['id'];
    //get category by id
    $category_model = new Category();
    $is_delete = $category_model->delete($id);
    if ($is_delete) {
      $_SESSION['success'] = 'Xóa danh mục thành công';
    }
    else {
      $_SESSION['error'] = 'Xóa danh mục thất bại';
    }
    header("Location: index.php?controller=category");
    exit();

  }
}