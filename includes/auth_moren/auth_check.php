<?php

defined("ZHANGXUAN") or die("no hacker.");
session_start();
$navurladd = SITEHOST . "auth.php";
$user = null;
$user_id = null;
$auth_moren_exist = false;
if (isset($_SESSION['loginuser']) && !empty($_SESSION['loginuser'])) {
    $user = mysqli_real_escape_string($dbconnect, htmlspecialchars($_SESSION['loginuser']));
} else if (isset($_COOKIE['loginname']) && isset($_COOKIE['loginid']) && $_COOKIE['loginname'] != "" && $_COOKIE['loginid'] != "") {
    $usertmp = mysqli_real_escape_string($dbconnect, htmlspecialchars($_COOKIE['loginname']));
    $cookievalue = mysqli_real_escape_string($dbconnect, htmlspecialchars($_COOKIE['loginid'], ENT_QUOTES));
    $sql = "SELECT * FROM `cookiedata` WHERE `user_name`='$usertmp' AND `user_cookie` ='$cookievalue'";
    $result = mysqli_query($dbconnect, $sql);
    if (mysqli_num_rows($result) > 0) {
        $rowtemp = mysqli_fetch_array($result);
        $timedifference = time() - strtotime($rowtemp['login_time']);
        if ($timedifference <= 30 * 24 * 60 * 60) {
            $user = $usertmp;
            $_SESSION['loginuser'] = $user;
            $logincheck = 1;
            $userip = $_SERVER["REMOTE_ADDR"];
            $date = date('Y-m-d H:i:s');
            $sql = "UPDATE `cookiedata` SET `user_login_ip`='$userip' WHERE `user_name`='$user' AND `user_cookie` ='$cookievalue'";
            @mysqli_query($dbconnect, $sql);
            $sql = "SELECT `user_thistimelogin_ip`,`user_thislogin_time` FROM `users` WHERE `user_name`='$user'";
            $result = mysqli_query($dbconnect, $sql);
            $rowtemp = mysqli_fetch_array($result);
            $user_thistimelogin_ip = $rowtemp['user_thistimelogin_ip'];
            $user_thislogin_time = $rowtemp['user_thislogin_time'];
            $sql = "UPDATE `users` SET `user_lastlogin_ip`='$user_thistimelogin_ip',`user_thistimelogin_ip`='$userip',`user_lastlogin_time`='$user_thislogin_time', `user_thislogin_time`='$date' WHERE `user_name`='$user'";
            @mysqli_query($dbconnect, $sql);
        } else {
            $sql = "DELETE FROM `cookiedata` WHERE `user_name`='$usertmp' AND `user_cookie` ='$cookievalue'";
            @mysqli_query($dbconnect, $sql);
            setcookie("loginname", "", time() - 3600, "/");
            setcookie("loginid", "", time() - 3600, "/");
            $logincheck = 0;
        }
    }
} else {
    die("");
}
if (!is_null($user)) {
    $sql = "SELECT * FROM `users` WHERE `user_name`='$user'";
    $result = mysqli_query($dbconnect, $sql);
    $row = mysqli_fetch_array($result);
    $user_id = $row['user_id'];
}
if (!is_null($user_id)) {
    $sql = "SELECT * FROM `authdata` WHERE `user_id`='$user_id' AND `auth_moren`='1'";
    $result = mysqli_query($dbconnect, $sql);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $auth_moren_exist = true;
    }
}
?>