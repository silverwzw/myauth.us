<?php
defined("ZHANGXUAN") or die("no hacker.");
?>
<div id="layout-top">
    <div id="topwrapper">
        <div id="topnav">
            <ul class="top-nav">
                <li class="top-core top-home">
                    <a href="<?php echo SITEHOST ?>"  title="首页"> </a>
                </li>
                <li class='top-core top-all'>
                    <?php
                    session_start();
                    $logincheck = 0;
                    if (isset($_SESSION['loginuser']) && !empty($_SESSION['loginuser'])) {
                        $user = mysqli_real_escape_string($dbconnect, htmlspecialchars($_SESSION['loginuser']));
                        echo "欢迎，" . strtoupper($user) . " | <a  onclick=\"if(confirm('若你的账号在其他电脑登录过本站,亦会一并登出,你确认要登出吗'))return true;else return false;\" href='" . SITEHOST . "logout.php'>登出</a></li><li class='top-core top-data'><a href='" . SITEHOST . "account.php'>账号管理</a></li><li class='top-core top-data'><a href='" . SITEHOST . "myauthall.php'>我的安全令</a></li><li class='top-core top-final'><s>捐赠</s>";
                        $logincheck = 1;
                    } else if (isset($_COOKIE['loginname']) && isset($_COOKIE['loginid']) && $_COOKIE['loginname'] != "" && $_COOKIE['loginid'] != "") {
                        $user = mysqli_real_escape_string($dbconnect, htmlspecialchars($_COOKIE['loginname']));
                        $cookievalue = mysqli_real_escape_string($dbconnect, htmlspecialchars($_COOKIE['loginid'], ENT_QUOTES));
                        $sql = "SELECT * FROM `cookiedata` WHERE `user_name`='$user' AND `user_cookie` ='$cookievalue'";
                        $result = mysqli_query($dbconnect, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $rowtemp = mysqli_fetch_array($result);
                            $timedifference = time() - strtotime($rowtemp['login_time']);
                            if ($timedifference <= 30 * 24 * 60 * 60) {
                                $_SESSION['loginuser'] = $user;
                                echo "欢迎，" . strtoupper($user) . " | <a  onclick=\"if(confirm('若你的账号在其他电脑登录过本站,亦会一并登出,你确认要登出吗'))return true;else return false;\" href='" . SITEHOST . "logout.php'>登出</a></li><li class='top-core top-data'><a href='" . SITEHOST . "account.php'>账号管理</a></li><li class='top-core top-data'><a href='" . SITEHOST . "myauthall.php'>我的安全令</a></li><li class='top-core top-final'><s>捐赠</s>";
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
                                $sql = "DELETE FROM `cookiedata` WHERE `user_name`='$user' AND `user_cookie` ='$cookievalue'";
                                @mysqli_query($dbconnect, $sql);
                                setcookie("loginname", "", time() - 3600, "/");
                                setcookie("loginid", "", time() - 3600, "/");
                                echo "<a href='login.php' onclick='return Login.open()'>登入</a> 或 <a href='" . SITEHOST . "register.php'>注册一个账号</a></li><li class='top-core top-data'><a href='" . SITEHOST . "faq.php'>FAQ</a></li><li class='top-core top-data'><a href='" . SITEHOST . "account.php'>账号管理</a></li><li class='top-core top-final'><s>捐赠</s>(暂时不需要)";
                    }
                        } else {
                            setcookie("loginname", "", time() - 3600, "/");
                            setcookie("loginid", "", time() - 3600, "/");
                            echo "<a href='login.php' onclick='return Login.open()'>登入</a> 或 <a href='" . SITEHOST . "register.php'>注册一个账号</a></li><li class='top-core top-data'><a href='" . SITEHOST . "faq.php'>FAQ</a></li><li class='top-core top-data'><a href='" . SITEHOST . "account.php'>账号管理</a></li><li class='top-core top-final'><s>捐赠</s>(暂时不需要)";
                    }
                    } else {
                        echo "<a href='login.php' onclick='return Login.open()'>登入</a> 或 <a href='" . SITEHOST . "register.php'>注册一个账号</a></li><li class='top-core top-data'><a href='" . SITEHOST . "faq.php'>FAQ</a></li><li class='top-core top-data'><a href='" . SITEHOST . "account.php'>账号管理</a></li><li class='top-core top-final'><s>捐赠</s>(暂时不需要)";
                    }
                    if (isset($_GET['authid'])) {
                        if ($logincheck == 1) {
                            if (ctype_digit($_GET['authid'])) {
                                $auth_id = $_GET['authid'];
                                $sql = "SELECT * FROM `users` WHERE `user_name`='$user'";
                                $result = mysqli_query($dbconnect, $sql);
                                $rowtemp = mysqli_fetch_array($result);
                                $user_id = $rowtemp['user_id'];
                                $sql = "SELECT * FROM `authdata` WHERE `user_id`='$user_id' AND `auth_id`='$auth_id'";
                                $result = mysqli_query($dbconnect, $sql);
                                $rowauth = mysqli_fetch_array($result);
                                if ($rowauth) {//是你的
                                    $autherrid = 0; //没错
                                } else {
                                    $autherrid = 1; //1不是你所有的安全令
                                }
                            } else {
                                $autherrid = 2; //2错误的GET数据
                            }
                        } else {
                            $autherrid = 3; //3他妈没登入就想玩啊
                        }
                    } else {
                        $autherrid = 2;
                    }
                    ?></li>

            </ul>
        </div>
        <div id="header" style="height:<?php if ($topnavvalue) echo 170;else echo 130; ?>px;">
            <div id="toplogo">
                <a href="<?php echo SITEHOST ?>" title="首页"><img src="resources/img/bn-logo.png" alt=""></a>
            </div>
            <?php
            if ($topnavvalue) {
                echo '<div id="navigation"><div id="page-menu" class="large"><h2 id="isolated" class="isolated">' . $topnavvalue . '</h2></div></div>';
            }
            ?>
        </div>
    </div>
</div>