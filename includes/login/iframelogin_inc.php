<?php
defined("ZHANGXUAN") or die("no hacker.");
?>
<div id="embedded-login">
    <h1>Battle.net</h1>

    <form id="form" method="post" action="<?php echo SITEHOST ?>iframelogin.php">
        <p><label class="label" for="accountName"> 用户名 </label>
            <input id="accountName" 
            <?php
            if ($loginerrorid == 1)
                echo "class='input input-error' onfocus=\"this.className = 'input';if(document.getElementById('password').className=='input'){document.getElementById('errorspan').removeChild(document.getElementById('emailAddress-message')); }\"";
            else
                echo "class='input' ";
            ?> type="text" value="" name="username" maxlength="32" tabindex="1"/>
        </p>
        <p><label class="label" for="password">
                密码</label>
            <input id="password"
            <?php
            if ($loginerrorid == 1)
                echo "class='input input-error' onfocus=\"this.className = 'input';if(document.getElementById('accountName').className=='input'){document.getElementById('errorspan').removeChild(document.getElementById('emailAddress-message')); }\"";
            else
                echo "class='input' ";
            ?>type="password" name="password" maxlength="16" tabindex="2" autocomplete="off"/>
                   <?php
                   if ($loginerrorid == 1) {
                       echo '<div id="errorspan"><span id="emailAddress-message" class="inline-message">用户名或密码输入错误!</span></div>';
                   }
                   ?></p>
        <div class="imgandreloader">
            <div id="captcha-image"><img id="sec-string" onclick="refreshCaptcha();document.getElementById('letters_code').focus();" src="/includes/check/code.php?rand=<?php echo rand(0, 20); ?>" alt="换一个" title="换一个" class="border-5" /></div>
            <div id="captcha-reloader">
                看不清楚？<br />
                <a href="javascript:void(0);" onclick="refreshCaptcha();document.getElementById('letters_code').focus();">换一个</a>
                <script type='text/javascript'>
                    //定义的刷新请求
                    function refreshCaptcha()
                    {
                        var img = document.images['sec-string'];
                        img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
                    }
                    jquerycodechecked=false;
                    //<![CDATA[
                    $(document).ready(function(){
                        $("#letters_code").keyup(function(){
                            if($("#letters_code")[0].value.length==6){
                                checkyanzhenma($("#letters_code")[0].value);
                                jquerycodechecked=true;
                            }else{
                                jquerycodechecked=false;
                                document.getElementById('checkyanzhenmaajax').innerHTML = "";
                            }
                        });
                    });
                    //]]>
                </script> 
            </div>
        </div>
        <p><label class="label" for="letters_code">
                出于安全性考虑，请输入上方图示中的字符。（这并不是您的密码）</label>

            <input id="letters_code" 
            <?php
            if ($loginerrorid == 2)
                echo "class='input input-error'  onfocus=\"this.className = 'input';document.getElementById('errorspan').removeChild(document.getElementById('emailAddress-message'));\"";
            else
                echo "class='input' ";
            ?>type="text" onblur="if(!jquerycodechecked){checkyanzhenma(this.value);}" style="width:290px;" name="letters_code" maxlength="6" tabindex="2" autocomplete="off"/>&nbsp;&nbsp;<span id="checkyanzhenmaajax"></span>
                   <?php
                   if ($loginerrorid == 2) {
                       echo '<div id="errorspan"><span id="emailAddress-message" class="inline-message">验证码输入错误!</span></div>';
                   }
                   ?>
        </p>


        <p><span id="remember-me"><label for="persistLogin">
                    <input id="persistLogin" type="checkbox" checked="checked" name="persistLogin"/>保持登录状态
                </label></span> 
            <button id="creation-submit" class="ui-button button1" type="submit" data-text="正在处理……"><span class="button-left"><span class="button-right">
                        登录
                    </span></span></button>
        </p>
    </form>
    <script> 
        $(window.parent.document).find("iframe").load(function(){
            var main = $(window.parent.document).find("iframe");
            var thisheight = $(document).height();
            $(window.parent.document).find("#login-embedded").height(thisheight);
            main.height(thisheight);
        });
        $(function() {
            $('#accountName').focus();
        });
        function closeiframe() { 
            $(window.parent.document).find("#login-embedded").fadeOut("slow", function() {
                $(window.parent.document).find("#blackout").css('display','none'); 
                $(this).remove();
            });
        }
    </script>
</div>
</body>
</html>