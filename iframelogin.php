<?php
include('includes/config.php');
include('includes/html_toubu/html_toubu_iframelogin.php');
include('includes/login/login_check.php');
if ($logincheck == 1)
    include('includes/login/iframelogin_checked.php');
else
    include('includes/login/iframelogin_inc.php');
?>

