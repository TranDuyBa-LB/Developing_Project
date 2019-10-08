<?php 
    if(!empty($_GET['error']))
        $error = $_GET['error'];
    else
        $error = "";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đăng nhập</title>
        <meta charset="UTF-8" />
        <link rel="shortcut icon" type="img/png" href="imgs/logo.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="css/loginCSS.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    </head>
    <body>
        <form action="../controller/routeLogin.php" method="POST">
            <div id="screen">
                <a href="https://eobi.000webhostapp.com">
                    <img src="imgs/logo.gif" />
                </a>
                <p>Đăng nhập</p>
                <p id="warning">
                    <?php echo $error; ?>
                </p>
                <input type="text" name="userName" placeholder="Tài khoản" required />
                <input type="password" name="password" placeholder="Mật khẩu" required />
                <input type="submit" value="Đăng nhập" />
                <input id="help" type="button" value="Gợi ý" />
            </div>
        </form>
    </body>
    <script type="text/javascript" src="js/helpLogin.js"></script>
    <script type="text/javascript" src="js/displayLogin.js"></script>
</html>