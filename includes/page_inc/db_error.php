<?php
defined("ZHANGXUAN") or die("no hacker.");
$topnavvalue = "数据库错误"
?>
<!DOCTYPE html>
<html>
    <head> 
        <script>
            var siteaddressforalljsfile="<?php echo SITEHOST; ?>";
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
        <link rel="shortcut icon" type="image/x-icon" href="resources/img/favicon.ico"> 
        <script>
            var _hmt = _hmt || [];
            (function() {
                var hm = document.createElement("script");
                var Baidu_Js_Server = (("https:" == document.location.protocol) ? "https://" : "http://");
                hm.src = Baidu_Js_Server+"hm.baidu.com/hm.js?0abf57ffe072b473a0418ad8c368f7d2";
                var s = document.getElementsByTagName("script")[0]; 
                s.parentNode.insertBefore(hm, s);
            })();
        </script>
    </head>
        
    <body>
        <div id="layout-top-nobackground">
            <div id="topwrapper">
                <div id="topnav">
                    <ul class="top-nav">
                        <li class="top-core top-home">
                            <a href="<?php echo SITEHOST ?>"  title="首页"> </a>
                        </li>
                        <li class='top-core top-all'>
                            <?php echo "<a href='" . SITEHOST . "login.php'>登入</a>或<a href='" . SITEHOST . "register.php'>注册一个战网通行证</a></li><li class='top-core top-data'><a href='" . SITEHOST . "register.php'>注册</a></li><li class='top-core top-data'><a>FAQ</a></li><li class='top-core top-final'><s>捐赠</s>"; ?>
                        </li>
                            
                    </ul>
                </div>
                <div id="header" style="height:<?php if ($topnavvalue) echo 170;else echo 130; ?>px;">
                    <div id="toplogo">
                        <a href="<?php echo SITEHOST ?>" title="首页"><img src="resources/img/bn-logo.png" alt=""></a>
                    </div>
                </div>
                    
                    
                <div class="error-page">
                    <div class="warning-graphic"></div>
                        
                    <div class="error-header">
                        <span>硬盘被怪兽吃掉了</span>
                    </div>
                        
                    <div class="error-desc">
                        网站受到外星球怪兽影响，已经无法与数据库保持SW电波通讯。
                    </div>
                        
                </div>
            </div>
        </div>
            
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
                            <li><a href='<?php echo SITEHOST ?>forgetpwd.php'>忘记密码</a></li>
                            <li><a href='<?php echo SITEHOST ?>register.php'>注册账号</a></li>
                            <li><a href='<?php echo SITEHOST ?>login.php'>登入账号</a></li>
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
                        <span>
                            <img  onclick="shareweibo('sina')" title="分享到新浪微博" alt="分享到新浪微博" src="resources/weiboimg/sina.png" style="height: 15px; width: 15px; cursor: hand; cursor: pointer;"></img>
                            <img  onclick="shareweibo('tencent')" title="分享到腾讯微博" alt="分享到腾讯微博" src="resources/weiboimg/qq.png" style="height: 15px; width: 15px; cursor: hand; cursor: pointer;"></img>
                            <img  onclick="shareweibo('sohu')" title="分享到搜狐微博" alt="分享到搜狐微博" src="resources/weiboimg/sohu.png" style="height: 15px; width: 15px; cursor: hand; cursor: pointer;"></img>
                            <img  onclick="shareweibo('netease')" title="分享到网易微博" alt="分享到网易微博" src="resources/weiboimg/163.png" style="height: 15px; width: 15px; cursor: hand; cursor: pointer;"></img>
                        </span>
                        <span><script type="text/javascript">
                            document.write('<img src="resources/img/startssl.png" alt="点击验证SSL证书" title="点击验证SSL证书" onclick="window.open(\'https://www.startssl.com/validation.ssl?referrer=' + location.host + '\',\'\',\'status=no,toolbar=no,menubar=no,titlebar=no,height=630,width=610\');" style="height: 15px; width: 80px; cursor: hand; cursor: pointer;">');
                            </script>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    $(document).ready(function() {
        $("#page-content").height($(".article-column").outerHeight(true));
        if($("#layout-middle").outerHeight(true)<360){
            $("#layout-bottom").css("background", "url('resources/img/toumin.png') no-repeat 50% 70%");
        }
    });
    
    
    function shareweibo(e){
        var _t = "<?php echo WEIBOMESSAGE; ?>";
        var _url = "<?php echo SITEHOST; ?>";
        var _sinakey = "<?php echo SINAKEY; ?>";
        var _tencentkey = "<?php echo TENCENTKEY; ?>";
        var _sohukey = "<?php echo SOHUKEY; ?>";
        var _neteasekey = "<?php echo NETEASEKEY; ?>";
        switch(e){
            case "sina":
                //(function(s,d,e){try{}catch(e){}var f='http://v.t.sina.com.cn/share/share.php?',u=d.location.href,p=['url='+_url+'&title='+_t+'&appkey='+_sinakey].join('');function a(){if(!window.open([f,p].join(''),'mb',['toolbar=0,status=0,resizable=1,width=620,height=450,left=',(s.width-620)/2,',top=',(s.height-450)/2].join('')))u.href=[f,p].join('');};if(/Firefox/.test(navigator.userAgent)){setTimeout(a,0)}else{a()}})(screen,document,encodeURIComponent);
                
                var _usina = 'http://v.t.sina.com.cn/share/share.php?url='+_url+'&title='+_t+'&appkey='+_sinakey;
                window.open( _usina,'分享到新浪微博', 'toolbar=0,status=0,resizable=1,width=620,height=450,left='+(screen.width-620)/2+',top='+(screen.height-450)/2);
                break;
            case "tencent":
                var _utencent = 'http://v.t.qq.com/share/share.php?title='+_t+'&url='+_url+'&appkey='+_tencentkey;
                window.open( _utencent,'分享到腾讯微博', 'toolbar=0,status=0,resizable=1,width=700,height=580,left='+(screen.width-700)/2+',top='+(screen.height-580)/2);
                break;
            case "sohu":
                var _usohu = 'http://t.sohu.com/third/post.jsp?title='+_t+'&url=\\n'+_url+'&appkey='+_sohukey;
                window.open( _usohu,'分享到搜狐微博', 'toolbar=0,status=0,resizable=1,width=660,height=470,left='+(screen.width-660)/2+',top='+(screen.height-470)/2);
                break;
            case "netease":
                var _unetease = 'http://t.163.com/article/user/checkLogin.do?info='+_t+' '+_url+'&key='+_neteasekey;
                window.open( _unetease,'分享到搜狐微博', 'toolbar=0,status=0,resizable=1,width=660,height=470,left='+(screen.width-660)/2+',top='+(screen.height-470)/2);
                break;
        }
    }
</script>
</html>
    