<!DOCTYPE html>
<html lang="en">
<head>

    <base href="<?php echo $_SERVER['SCRIPT_NAME']?>" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo MVC</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <script src="assets/js/"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        .header{
            /*background-color: red;*/
            position: sticky;
            top: 0;
            z-index: 1071;
            /*position: fixed;*/
            /*height: 50px;*/
            /*width: 100%;*/
            /*background-color: #0b2e13;*/
        }
        .login-form{
            float: right;
            margin-left: 8px;
            margin-right: 30px;
        }
        .lg{
            display: <?php if(isset($id) )echo "none"?>;
        }
        .lgd{
            display: <?php if(!isset($id) )echo "none"?>;
        }
        .c_p{
            display: <?php if($category['status'] == 0 )echo "none"?>;
        }
        body{
            background: linear-gradient(to right, #c04848, #480048);
        }
    </style>
</head>

<body>
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <?php
        if(isset($_GET['id'])){
            $index_link = "index.php?id=".$_GET['id'];
        }else $index_link = "index.php";

        ?>
        <h3><a class="navbar-brand" href="<?php echo $index_link?>">EasyAccomod</a></h3>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo $index_link?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sắp xếp theo
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Giá phòng</a>
                        <a class="dropdown-item" href="#">Diện tích phòng</a>
<!--                        <div class="dropdown-divider"></div>-->
                        <a class="dropdown-item" href="#">Số lượng</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">

                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button>
                <div class="login-form">
                    <div class=" " style="display: <?php if(isset($id) )echo "none"?>;">
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tài Khoản
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a href="index.php?controller=category&action=login" class="dropdown-item">Đăng nhập</a>
                                <a href="index.php?controller=category&action=create" class="dropdown-item">Đăng kí</a>
                            </div>
                        </div>
                    </div>

                    <div class="" style="display: <?php if(!isset($id) )echo "none"?>;">
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $category['name'];?>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <?php $link_user = "index.php?controller=product&action=index&id=". $id;
                                    $link_user_update = "index.php?controller=category&action=update&id=". $id;
                                ?>
                                <a class="dropdown-item" style="display: <?php if($category['status'] == 0 )echo "none"?>;" href="<?php echo $link_user;?>">Quản lý bài đăng</a>
                                <a class="dropdown-item " href="<?php echo $link_user_update;?>">Chỉnh sửa thông tin</a>
                                <a class="dropdown-item" href="#">Đăng xuất</a>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </nav>
</header>
<!-- header end -->
