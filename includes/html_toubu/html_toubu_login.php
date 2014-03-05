<?php
defined("ZHANGXUAN") or die("no hacker.");
?>
<!DOCTYPE html>
<html>
    <head> 
        <script>
            var siteaddressforalljsfile="<?php echo SITEHOST; ?>";
        </script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>战网安全令在线版-
            <?php
            if ($logoutorlogin)
                echo "登出";
            else
                echo "登入";
            ?>
        </title>
        <link rel="stylesheet" href="resources/logincss/footer.css" type="text/css" />
        <link rel="stylesheet" href="resources/logincss/login.css" type="text/css" />
        <link rel="shortcut icon" type="image/x-icon" href="resources/img/favicon.ico"> 
        <?php
        if (SSLMODE == 1) {
            echo '<script type="text/javascript" src="https://lib.sinaapp.com/js/jquery/1.7.2/jquery.min.js"></script>';
        } else {
            echo '<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.7.2/jquery.min.js"></script>';
        }
        ?>

    </head>
    <body>
