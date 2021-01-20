<?php
require_once 'helpers/Helper.php';
require_once 'views/layouts/header.php';
?>
<style>
    .login-form-index{
        width: 360px;
        background: #f1f1f1;
        height: 600px;
        padding: 80px 40px;
        border-radius: 10px;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
    }

    .login-form-index h1{
        text-align: center;
        margin-bottom: 60px;
    }

    .txtb{
        border-bottom: 2px solid #adadad;
        position: relative;
        margin: 30px 0;
    }

    .txtb input{
        font-size: 15px;
        color: #333;
        border: none;
        width: 100%;
        outline: none;
        background: none;
        padding: 0 5px;
        height: 40px;
    }

    .txtb span::before{
        content: attr(data-placeholder);
        position: absolute;
        top: 50%;
        left: 5px;
        color: #adadad;
        transform: translateY(-50%);
        z-index: -1;
        transition: .5s;
        top: -5px;
    }

    .txtb span::after{
        content: '';
        position: absolute;
        width: 0%;
        height: 2px;
        background: linear-gradient(120deg,#3498db,#8e44ad);
        transition: .5s;
    }

    .login-form-index .focus + span::before{
        top: -5px;
    }
    .logbtn{
        display: block;
        width: 100%;
        height: 50px;
        border: none;
        background: linear-gradient(120deg,#3498db,#8e44ad,#3498db);
        background-size: 200%;
        color: #fff;
        outline: none;
        cursor: pointer;
        transition: .5s;
    }

    .logbtn:hover{
        background-position: right;
    }

    .bottom-text{
        margin-top: 60px;
        text-align: center;
        font-size: 13px;
    }
    .login-form{
        background: linear-gradient(to right, #c04848, #480048);
    }
</style>
<div class="login-form">
    <form action="" method="post" class="login-form-index">
            <h1>Đăng nhập</h1>
        <p style="color: red"><?php echo $error?></p>
            <div class="txtb">
              <input type="text" name="username">
              <span data-placeholder="Username"></span>
            </div>

            <div class="txtb">
              <input type="password" name="password">
              <span data-placeholder="Password"></span>
            </div>

            <input name="submit" type="submit" class="logbtn" value="Login">

            <div class="bottom-text">
            Don't have account? <a href="index.php?controller=category&action=create">Sign up</a>
            </div>

    </form>
</div>
<?php
require_once 'views/layouts/footer.php';
?>