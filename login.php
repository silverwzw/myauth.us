<?php

include('includes/config.php');
include('includes/html_toubu/html_toubu_login.php');
include('includes/login/logincheck.php');
if ($logincheck == 1)
    include('includes/login/login_checked.php');
else
    include('includes/login/login_inc.php');
include('includes/page_inc/footer.php');
?>