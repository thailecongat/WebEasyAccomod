<?php
require_once 'models/Product.php';
require_once 'models/Category.php';
class HomeController
{
  public function index() {

      //đổ dữ liệu product ra trang chủ
    $product_model = new Product();
    $products = $product_model->index();

      if(isset($_GET['id'])){
            $category_model = new Category();
            $id = $_GET['id'];
            $category = $category_model->getCategoryById($id);
        }
    require_once 'views/homes/index.php';
//    require_once 'views/user/index.php';
  }
}