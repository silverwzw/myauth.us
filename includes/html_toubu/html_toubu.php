<?php
defined("ZHANGXUAN") or die("no hacker.");
?>
<!DOCTYPE html>
<html>
    <head> 
        <script>
            var siteaddressforalljsfile="<?php echo SITEHOST; ?>";
            var ifnotloginiframecanchangethisvalue=false;
            Login.embeddedUrl = '<?php echo SITEHOST?>/iframelogin.php';
        </script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo TITLENAME . "-$topnavvalue" ?></title>
        <link rel="stylesheet" href="resources/css/articles.css" type="text/css" />
        <link rel="stylesheet" href="resources/css/header.css" type="text/css" />
        <link rel="stylesheet" href="resources/css/body.css" type="text/css" />
        <link rel="stylesheet" href="resources/css/footer.css" type="text/css" />
        <link rel="shortcut icon" type="image/x-icon" href="resources/img/favicon.ico"> 
        <?php
        if (SSLMODE == 1) {
            echo '<script type="text/javascript" src="https://lib.sinaapp.com/js/jquery/1.7.2/jquery.min.js"></script>';
        } else {
            echo '<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.7.2/jquery.min.js"></script>';
        }
        ?>
        <script type="text/javascript" src="resources/js/common.js"></script>
        <script type="text/javascript" src="resources/js/third-party.js"></script>
    </head>
    <body>
