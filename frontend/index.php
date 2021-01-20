<?php
session_start();
//set timezone vietnam
date_default_timezone_set('Asia/Ho_Chi_Minh');
//url luôn có dạng sau: index.php?controller=<>&action=<>
//lấy ra tham số controller từ trình duyệt
$controller = isset($_GET['controller']) ?
    $_GET['controller'] : 'home';
//lấy ra tham số action từ trình duyệt
$action = isset($_GET['action']) ? $_GET['action'] : "index";

//sẽ phải tìm cách để nhúng chính xác file Controller vào,
//sau đó khởi tạo đối tượng từ controller, gọi action bắt được từ url
//ProductController.php
//product -> Product
$controller = ucfirst($controller);
//Product

$controller_file = $controller . "Controller.php";
//ProductController.php

$path_controller = "controllers/$controller_file";
///controllers/ProductController.php

if (!file_exists($path_controller)) {
    die("Trang bạn tìm không tồn tại");
}

require_once "$path_controller";

$controller_class = $controller . "Controller";
$object = new $controller_class();

if (!method_exists($object, $action)) {
    die("Phương thức $action 
    không tồn tại trong class $controller_class");
}

$object->$action();