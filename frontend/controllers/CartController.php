<?php
require_once 'models/Product.php';
class CartController
{
    public $error;
    public function add() {
        $id = $_GET['id'];

        //lấy ra thông tin của sản phẩm vừa click
        $product_model = new Product();
        $product = $product_model->getProductCartById($id);

        //tạo 1 mảng lưu trữ trước thông tin sản phẩm vừa click
        $product_item = [
            'title' => $product['title'],
            'price' => $product['price'],
            'avatar' => $product['avatar'],
            'quality' => 1
        ];


        //xây dựng giỏ hàng
//        giỏ hàng có tên (key) là cart
        //nếu chưa từng tồn tại giỏ hàng trước đó, thì khởi tạo
//        giỏ hàng mới $_SESSION['cart']
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'][$id] = $product_item;
            $_SESSION['cart']['total'] = $product['price'];
        }
        //trường hợp ngược lại, đã tồn tại giỏ hàng rồi
        else {
            //xảy ra 2 trường hợp, trong cả 2 trường hợp
//            luôn cần tính toán lại tổng giá trị đơn hàng
//            1 - Sản phẩm thêm vào giỏ hàng đã tồn tại trong giỏ hàng
//            , tại bước này chỉ cần cập
            // nhật lại số lượng của sản phẩm đó tăng lên 1
            if (array_key_exists($id, $_SESSION['cart'])) {
                //update lại số lượng của sản phẩm đã tồn tại
                $_SESSION['cart'][$id]['quality']++;
            }
//            2 - Sản phẩm thêm vào giỏ hàng chưa từng tồn tại trong
//            giỏ hàng, thì thực hiện thêm mới
            else {
                $_SESSION['cart'][$id] = $product_item;
            }

            //thực hiện tính toán lại tổng giá trị đơn hàng
//            bằng việc cộng dồn tổng giá trị đơn hàng cũ với giá
//            sản phẩm mới thêm
//            session_destroy();
            $_SESSION['cart']['total'] += $product['price'];


        }

        //chuyển hướng tới trang giỏ hàng của bạn
//        echo "<pre>";
//        print_r($_SESSION['cart']);
//        echo "</pre>";
        $url_redirect = 'gio-hang-cua-ban';
        header("Location: $url_redirect");
        exit();
    }

    public function index() {
//        echo "<pre>";
//        print_r($_SESSION['cart']);
//        echo "</pre>";
////        die;
        require_once 'views/carts/index.php';
    }
    public function payment() {
        require_once 'views/carts/payment.php';
    }

    public function delete() {
        echo "<pre>";
        print_r($_SESSION['cart']);
        echo "</pre>";
        $id = $_GET['id'];

        //xóa sản phẩm trong giỏ hàng tương đương với việc
//        xóa mảng tương ứng theo key - id sản phẩm

//        bước đầu tiên là cập nhật lại tổng giá trị đơn hàng total
//        trước khi xóa
        $price_total_item =
            $_SESSION['cart'][$id]['quality']
            * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart']['total'] -= $price_total_item;

        //sau đó mới thực hiện xóa sản phẩm khỏi đơn hàng
        unset($_SESSION['cart'][$id]);

        //trường hợp giỏ hàng trống thì cần unset mảng cart này đi
        if ($_SESSION['cart']['total'] == 0) {
            unset($_SESSION['cart']);
        }

        //chuyển hướng về trang giỏ hàng của bạn
        header("Location: gio-hang-cua-ban");
        exit();
    }



}