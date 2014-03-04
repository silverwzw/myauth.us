<?php
defined("ZHANGXUAN") or die("no hacker.");
$days = round((time() - strtotime("2013-06-20")) / 3600 / 24);
$sql = "SELECT COUNT(*) FROM `users` UNION SELECT  COUNT(*) FROM `authdata`;";
$result = @mysqli_query($dbconnect, $sql);
$rowtemp = mysqli_fetch_array($result);
$user_count = $rowtemp[0];
$rowtemp = mysqli_fetch_array($result);
$auth_count = $rowtemp[0];
?>
<div id="layout-bottom">
    <div id="homewrapperbotton">
        <div id="footer">
            <div id="footline">
                <div id="sitemap">
                    <div class="column">
                        <h3 class="pages">
                            <a href="<?php echo SITEHOST ?>" tabindex="100">站点页面</a>
                        </h3>
                        <ul>
                            <li><a href="<?php echo SITEHOST ?>welcome.php">WELCOME</a></li>
                            <li><a href="<?php echo SITEHOST ?>faq.php">FAQ</a></li>
                            <li><s>捐赠</s>(暂时不需要)</li>
                        </ul>
                    </div>
                    <div class="column">
                        <h3 class="auths">
                            <a href="<?php echo SITEHOST ?>myauthall.php" tabindex="100">安全令</a>
                        </h3>
                        <ul>
                            <li><a href="<?php echo SITEHOST ?>auth.php">默认安全令</a></li>
                            <li><a href="<?php echo SITEHOST ?>myauthall.php">我的安全令</a></li>
                            <li><a href="<?php echo SITEHOST ?>addauth.php">添加安全令</a></li>
                        </ul>
                    </div>
                    <div class="column">
                        <h3 class="account">
                            <a href="<?php echo SITEHOST ?>account.php" tabindex="100">账号</a>
                        </h3>
                        <ul>
                            <?php
                            if ($logincheck) {
                                echo "<li><a href='" . SITEHOST . "account.php'>查看我的账号</a></li>";
                                echo "<li><a href='" . SITEHOST . "changepwd.php'>修改密码</a></li>";
                                echo "<li><a href='" . SITEHOST . "changemailadd.php'>修改注册邮箱</a></li>";
                            } else {
                                echo "<li><a href='" . SITEHOST . "forgetpwd.php'>忘记密码</a></li>";
                                echo "<li><a href='" . SITEHOST . "register.php'>注册账号</a></li>";
                                echo "<li><a href='" . SITEHOST . "login.php'>登入账号</a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="column">
                        <h3 class="setting">
                            <a href="<?php echo SITEHOST ?>" tabindex="100">其他</a>
                        </h3>
                        <ul>
                            <li><a href="<?php echo SITEHOST ?>copyright.php">版权声明及免责条款</a></li>
                            <li><a href="<?php echo SITEHOST ?>about.php">关于本站</a></li>
                            <li><a href="mailto:webmaster@myauth.us">联系</a></li>
                        </ul>
                    </div>
                </div>
                <div id="copyright">
                    ©
                    <?php
                    if (date('Y') == 2013)
                        echo "2013";
                    else
                        echo "2013-" . date('Y');
                    ?> 
                    竹井詩織里版权所有。
                    <p>
                        <span>建站时间: 2013年6月20日</span>
                        <span>安全运行时间: <?php echo $days ?>天</span>
                        <span>用户总数: <?php echo $user_count; ?></span>
                        <span><script type="text/javascript">
                            document.write('<img src="resources/img/startssl.png" alt="点击验证SSL证书" title="点击验证SSL证书" onclick="window.open(\'https://www.startssl.com/validation.ssl?referrer=' + location.host + '\',\'\',\'status=no,toolbar=no,menubar=no,titlebar=no,height=630,width=610\');" style="height: 15px; width: 80px; cursor: hand; cursor: pointer;">');
                            </script>
                        </span>
                    </p>
                </div>
            </div></div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#page-content").height($(".article-column").outerHeight(true));
        if($("#layout-middle").outerHeight(true)<360){
            $("#layout-bottom").css("background", "url('resources/img/toumin.png') no-repeat 50% 70%");
        }
<?php
if ($logincheck == 1 && $auth_moren_exist == true)
    echo "document.getElementById('isolated').innerHTML='默认安全令'";
if ($logincheck == 1 && $auth_moren_exist == "manle")
    echo "document.getElementById('isolated').innerHTML='添加安全令'";
@$result->free();
@mysqli_close($dbconnect);
?>
    });
</script>
</body>
</html>