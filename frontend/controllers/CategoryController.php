<?php

require_once 'models/Category.php';
class CategoryController
{
    public function index() {
//        if(isset($_GET['id'])){
//            $category_model = new Category();
//            $id = $_GET['id'];
//            $category = $category_model->getCategoryById($id);
//        }
        require_once 'views/categories/index.php';
    }

    public function create() {
        $error = '';
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password1 = $_POST['password-1'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $status = 0;

            if (empty($username)) {
                $error = "Họ và tên không được để trống";
            }
            else if (empty($password)) {
                $error = "Passworld không được để trống";
            }
            else if (empty($password1)) {
                $error = "Passworld không được để trống";
            }
            else if ($password1 != $password) {
                $error = "Passworld không khớp";
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
                    $_SESSION['success'] = 'Tạo tài khoản thành công';
                }
                else {
                    $_SESSION['error'] = 'Thêm mới thất bại';
                }

                header("Location: index.php");
                exit();
            }
        }

        require_once 'views/login/create.php';
    }

    public function update() {

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
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            if (empty($name)) {
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
                $arr_params = [
                    ':id' => $id,
                    ':name' => $name,
                    ':phone' => $phone,
                    ':email' => $email,
                    ':address' => $address,
                    ':updated_at' => date("Y-m-d H:i:s"),
                ];
//        var_dump($arr_params);
//        die;
                $is_update = $category_model->update($arr_params);
                if ($is_update) {
                    $_SESSION['success'] = 'Cập nhật  thành công';
                }
                else {
                    $_SESSION['error'] = 'Cập nhật thất bại';
                }
                header("Location: index.php?id=".$id);
                exit();
            }
        }

        require_once 'views/login/update.php';
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

    public function login(){
        $error = '';
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if(empty($username)){
                $error = 'Tên đăng nhập không được đẻ trống';
            }else if(empty($password)){
                $error = 'Mật khẩu không được đẻ trống';
            }else{
                $arr_param = [
                    ':username' => $username,
                    ':password' => $password,
                ];
                $category_model = new Category();
                $user_login = $category_model->login($arr_param);
                if($user_login == [])
                    $error = 'Sai tài khoản hoặc mật khẩu';
                else{
                    header("Location: index.php?id=".$user_login['id']);
                    exit();
                }
//                echo "<pre>";
//                var_dump($arr_param);
//                var_dump($user_login);
//                echo "</pre>";
//                echo $user_login['id'];
//                if($user_login == [])echo 0; else echo 1;
//                die();
            }
        }
//
        require_once 'views/login/login.php';
    }
}