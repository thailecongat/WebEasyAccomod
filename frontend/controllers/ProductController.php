<?php
//require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/Product.php';

class ProductController
{
    public $error;

    public function index() {
        $id =$_GET['id'];
        if(isset($_GET['id'])){
            $category_model = new Category();
            $category = $category_model->getCategoryById($id);
            $product_model = new Product();
            $id = $_GET['id'];
            $products = $product_model->getByCategoryId($id);
//            echo "<pre>";
//            var_dump($products);
//            echo "</pre>";
//            die;
        }
        require_once 'views/user/index.php';
    }
    public function detail() {
        //có thể bỏ qua trường hợp validate mà id không phải số
//        do trong file .htacces phần regex [0-9]+ cho id đã làm rồi
        $id = $_GET['id'];
        $product_model = new Product();
        $product = $product_model->getById($id);
        echo "<pre>";
        print_r($product);
        echo "</pre>";
        require_once 'views/products/detail.php';
    }
    public function create()
    {
        $id =$_GET['id'];
        $category_model = new Category();
        $category = $category_model->getCategoryById($id);
        //xử lý lưu dữ liệu khi submit form
        if (isset($_POST['submit'])) {

            $user_id = $id;
            $address = $_POST['address'];
            $price = $_POST['price'];
            $dt = $_POST['dt'];
            $summary = $_POST['summary'];
//          $content = $_POST['content'];
            $status = 0;
            $qty = $_POST['qty'];
            $dh = $_POST['dh'];
            $nl = $_POST['nl'];


            $avatar_arr = $_FILES['avatar'];

            //check validate
            //check trường hợp không nhập tên sản phẩm
            if (empty($address)) {
                $this->error = "Không được để trống địa chỉ";
            }
            else if (empty($price)) {
                $this->error = "Không được để trống giá";
            }else if (empty($qty)) {
                $this->error = "Không được để trống số lượng";
            }
            else if (empty($dt)) {
                $this->error = "Không được để trống diện tích";
            }
            else {
                $avatar = '';
                //lưu file upload lên nếu có
                if ($avatar_arr['error'] == 0) {
                    //kiểm tra file upload lên có phải định dạng ảnh
//                hay không
                    $extension = pathinfo($avatar_arr['name'],
                        PATHINFO_EXTENSION);
                    $extension = strtolower($extension);
                    $arr_extension_image = ['jpg', 'jpeg', 'gif', 'png'];
                    if (!in_array($extension, $arr_extension_image)) {
                        $this->error = "Cần upload file dạng ảnh: jpg, jpeg, png, gif";
                        require_once 'views/products/create.php';
                        return false;
                    } //trường hợp upload ảnh > 2Mb thì báo lỗi
                    else if ($avatar_arr['size'] > 10 * 1024 * 1024) {
                        $this->error = "Cần upload ảnh dung lượng < 10Mb";
                        require_once 'views/products/create.php';
                        return false;
                    } else {
                        //thực hiện upload ảnh
                        $dir_upload = __DIR__ . "/../../backend/assets/uploads/";
                        if (!file_exists($dir_upload)) {
                            mkdir($dir_upload);
                        }

                        $avatar = time() . $avatar_arr['name'];

                        move_uploaded_file($avatar_arr['tmp_name'],
                            $dir_upload . '/' . $avatar);
                    }
                }

                //gọi model thực hiện insert data vào CSDL
                //sử dụng cơ chế PDO
                $arr_params = [
                    ":user_id" => $user_id,
                    ":address" => $address,
                    ":price" => $price,
                    ":dt" => $dt,
                    ":avatar" => $avatar,
                    ":summary" => $summary,
//                    ":content" => $content,
                    ":status" => $status,
                    ":qty" => $qty,
                    ":dh" => $dh,
                    ":nl" => $nl,
                ];
                $product_model = new Product();
                $is_insert = $product_model->insert($arr_params);

                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm sản phẩm thành công';
                } else {
                    $_SESSION['error'] = 'Thêm sản phẩm thất bại';
                }

                header("Location: index.php?controller=product&action=index&id=".$id);
                exit();

            }
        }

        //lấy ra tất cả danh mục đang có trên hệ thống
        $category_model = new Category();
        $categories = $category_model->index();

        //gọi view
        require_once 'views/user/create.php';
    }
    public function delete() {
        $id =$_GET['id'];
        $category_model = new Category();
        //bắt id từ trình duyệt
        //validate nếu ko có tham số id thì báo lỗi và chuyển hướng
//        về trang danh sách
        if (!isset($_GET['p_id'])) {
            $_SESSION['error'] = "Tham số ID không hợp lệ";
            header("Location: index.php?controller=product&action=index&id=".$id);
            exit();
        }

        $p_id = $_GET['p_id'];

        $product_model = new Product();
        $is_delete = $product_model->delete($p_id);

        if ($is_delete) {
            $_SESSION['success'] = "Xóa thành công";
        } else {
            $_SESSION['error'] = "Xóa thất bại";
        }

        header("Location: index.php?controller=product&action=index&id=".$id);
        exit();
    }
    public function update()
    {
        $id =$_GET['id'];
        $category_model = new Category();
        $category = $category_model->getCategoryById($id);
        //lấy ra thông tin sản phẩm dựa theo id truyền trên url
        //check 1 số trường hợp validate cho id
        if (!isset($_GET['p_id'])) {
            $_SESSION['error'] = "ID không tồn tại";
            header("Location: index.php?controller=product&action=index&id=".$id);
            exit();
        }

        $p_id = $_GET['p_id'];
        //lấy ra thông tin sản phẩm dựa vào id
        $product_model = new Product();
        $product = $product_model->getById($p_id);
        //xử lý lưu dữ liệu khi submit form
        if (isset($_POST['submit'])) {

            $user_id = $id;
            $address = $_POST['address'];
            $price = $_POST['price'];
            $dt = $_POST['dt'];
            $summary = $_POST['summary'];
//          $content = $_POST['content'];
            $qty = $_POST['qty'];
            $dh = $_POST['dh'];
            $nl = $_POST['nl'];

            $avatar_arr = $_FILES['avatar'];


            //check validate
            //check trường hợp không nhập tên sản phẩm
            if (empty($address)) {
                $this->error = "Không được để trống địa chỉ";
            }
            else if (empty($price)) {
                $this->error = "Không được để trống giá";
            }else if (empty($qty)) {
                $this->error = "Không được để trống số lượng";
            }else if (empty($dt)) {
                $this->error = "Không được để trống diện tích";
            }else {
//                $avatar = '';
                $avatar = $product['avatar'];
                //lưu file upload lên nếu có
                if ($avatar_arr['error'] == 0) {
                    //kiểm tra file upload lên có phải định dạng ảnh
//                hay không
                    $extension = pathinfo($avatar_arr['name'],
                        PATHINFO_EXTENSION);
                    $extension = strtolower($extension);
                    $arr_extension_image = ['jpg', 'jpeg', 'gif', 'png'];
                    if (!in_array($extension, $arr_extension_image)) {
                        $this->error = "Cần upload file dạng ảnh: jpg, jpeg, png, gif";
                        require_once 'views/products/create.php';
                        return false;
                    } //trường hợp upload ảnh > 2Mb thì báo lỗi
                    else if ($avatar_arr['size'] > 10 * 1024 * 1024) {
                        $this->error = "Cần upload ảnh dung lượng < 10Mb";
                        require_once 'views/products/create.php';
                        return false;
                    } else {
                        //thực hiện upload ảnh
                        $dir_upload = __DIR__ . "/../../backend/assets/uploads/";
                        if (!file_exists($dir_upload)) {
                            mkdir($dir_upload);
                        }
                        //cần check nếu đã có ảnh upload rồi
//                        tương đương với biến avatar khác rỗng
//                        thì cần xử lý xóa ảnh đã upload lên
                        if (!empty($avatar)) {
                            //thêm @ để không hiển thị thông báo lỗi
//                            khi mà xóa 1 file không tồn tại
                            @unlink($dir_upload . '/' . $avatar);
                        }
                        $avatar = time() . $avatar_arr['name'];

                        move_uploaded_file($avatar_arr['tmp_name'],
                            $dir_upload . '/' . $avatar);
                    }
                }

                //gọi model thực hiện insert data vào CSDL
                //sử dụng cơ chế PDO
                $arr_params = [
                    ":id" => $p_id,
                    ":user_id" => $id,
                    ":product_address" => $address,
                    ":price" => $price,
                    ":dt" => $dt,
                    ":avatar" => $avatar,
                    ":summary" => $summary,
//                    ":content" => $content,
                    ":qty" => $qty,
                    ":dh" => $dh,
                    ":nl" => $nl,
                    ":updated_at" => date('Y-m-d H:i:s'),
                ];
//                echo"<pre>";
//                var_dump($arr_params);
//                echo"</pre>";
//                update sản phẩm
                $is_update = $product_model->update($arr_params);
//                var_dump($is_update);
//                die;
                if ($is_update) {
                    $_SESSION['success'] = 'Update sản phẩm thành công';
                } else {
                    $_SESSION['error'] = 'Update sản phẩm thất bại';
                }

                header("Location: index.php?controller=product&action=index&id=".$id);
                exit();

            }
        }

        //lấy ra tất cả danh mục đang có trên hệ thống
        $category_model = new Category();
        $categories = $category_model->index();

        //gọi view
        require_once 'views/user/update.php';
    }
}