<?php

defined("ZHANGXUAN") or die("no hacker.");
session_start();
$pwdfinderrorid = -1; //1验证码错误,2用户不存在4输入错误,3信息与数据库中的不一样,5用户名存在非法字符，用户名仅允许使用中文、数字、字母、下划线，6发送邮件失败
if (isset($_POST["letters_code"]) && !empty($_POST["letters_code"]) && md5(strtolower($_POST["letters_code"])) == $_SESSION['letters_code']) {   //验证码正确才能继续搞啊
    if (isset($_POST["firstName"]) && !empty($_POST["firstName"]) && isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["question1"]) && !empty($_POST["question1"]) && isset($_POST["answer1"]) && !empty($_POST["answer1"])) {                  //要有数据啊
        if (checkzhongwenzimushuzixiahuaxian($_POST["firstName"]) && checkquestionvalue($_POST['question1']) && valid_email($_POST["email"])) {
            $user = mysqli_real_escape_string($dbconnect, htmlspecialchars($_POST["firstName"], ENT_QUOTES));
            $emailadd = mysqli_real_escape_string($dbconnect, htmlspecialchars($_POST['email']));
            $question1 = mysqli_real_escape_string($dbconnect, htmlspecialchars($_POST['question1']));
            $answer1 = mysqli_real_escape_string($dbconnect, htmlspecialchars($_POST['answer1']));
            $emailfind = randstr();
            $sql = "SELECT * FROM `users` WHERE `user_name`='$user'";
            $result = mysqli_query($dbconnect, $sql);
            $rowuserdata = mysqli_fetch_array($result);
            if ($rowuserdata) {
                if ($rowuserdata['user_email'] == $emailadd && $rowuserdata['user_question'] == $question1 && $rowuserdata['user_answer'] == $answer1) {
                    $userid = $rowuserdata['user_id'];
                    $sql = "UPDATE `users` SET `user_email_find_code`='$emailfind',`user_email_find_mode`='1' WHERE `user_id`='$userid'";
                    @mysqli_query($dbconnect, $sql);
                    $findurl = SITEHOST . "findpwdmail.php?userid=$userid&pwdcheckid=$emailfind";
                    $mailtxt = "本邮件为系统自动发送，您正在申请重置您账号的密码<br><br>" .
                            "您的用户名为：$user<br><br>" .
                            "您的用户ID为：$userid<br><br>" .
                            "您的邮箱地址为：$emailadd<br><br>" .
                            "您还需要最后一步，点击以下链接，前往密码重置页面重置您的密码。<br><br>" .
                            "<a href='$findurl' target='_blank'>$findurl</a><br><br>" .
                            "如果这不是您操作的，请忽略本邮件，绝对不要点击以上链接。<br><br>" .
                            "本邮件为自动发送，请不要回复，因为没人会看的。<br><br>" .
                            "竹井詩織里<br><br>" .
                            date('Y-m-d');
                    try {
                        $mail = new PHPMailer(true); //创建新的邮件

                        $body = $mailtxt;
                        $body = preg_replace('/\\\\/', '', $body); //替换

                        $mail->IsSMTP();                           // 使用SMTP
                        $mail->SMTPAuth = true;        // 启用SMTP验证
                        $mail->Port = SMTP_PORT;                    // 设置SMTP端口
                        $mail->Host = SMTP_HOST; // SMTP服务器
                        $mail->Username = SMTP_USERNAME;     // SMTP用户名
                        $mail->Password = SMTP_PASSWD;            // SMTP 密码
                        $mail->SMTPSecure = "ssl";
                        //$mail->IsSendmail();  // 如果报错请取消注释

                        $mail->From = SMTP_USERNAME;
                        $mail->FromName = "=?utf-8?B?" . base64_encode("竹井詩織里(战网安全令在线版)") . "?=";


                        $to = $emailadd;

                        $mail->AddAddress($to);


                        $mail->Subject = "=?utf-8?B?" . base64_encode("战网安全令在线版重置密码链接邮件") . "?=";
                        $mail->AltBody = "若要查看本邮件，请使用支持HTML显示的邮箱客户端"; // optional, comment out and test
                        $mail->WordWrap = 80; // set word wrap

                        $mail->MsgHTML($body);

                        $mail->IsHTML(true); // send as HTML

                        $mail->Send();
                        $_SESSION['lastmail'] = $date;
                        $pwdfinderrorid = 0;
                    } catch (phpmailerException $e) {
                        $pwdfinderrorid = 6;
                    }
                } else {
                    $pwdfinderrorid = 3;
                }
            } else {
                $pwdfinderrorid = 2;
            }
        } else {
            if (checkzhongwenzimushuzixiahuaxian($_POST["firstName"]) == false)
                $pwdfinderrorid = 5;
            else
                $pwdfinderrorid = 4;
        }
    } else {
        $pwdfinderrorid = 4; //POST数据不足
    }
    $_SESSION['letters_code'] = md5(rand());
} else {
    if (isset($_POST["letters_code"]) && !empty($_POST["letters_code"]) && md5(strtolower($_POST["letters_code"])) != $_SESSION['letters_code']) {
        $pwdfinderrorid = 1;
    }
}

//PHP验证邮箱格式的函数
function valid_email($email) {
    //首先确认是否有一个@符号的存在，同时验证邮箱长度是否正确
    if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
        //如果@符号的个数不对，或者邮箱每部分的长度不对则输出错误
        return false;
    }
    //把邮箱按“@”符号和“.”符号分割成几个部分分别用正则表达式匹配

    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
        if (!preg_match("/^(([A-Za-z0-9!#$%&#038;'*+\\/=?^_`{|}~-][A-Za-z0-9!#$%&#038;'*+\\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
            return false;
        }
    }
    if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) {
        //检查域名部分是否是IP地址，如果不是则应该是有效域名
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
            //域名部分的长度不能太短，否则输出错误
            return false;
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
                //域名部分如果不是字母和数字，或者允许的其他字符，则输出错误
                return false;
            }
        }
    }

    //所有检测通过，输出邮箱格式正确
    return true;
}

//随机邮件验证码
function randstr($len = 40) {
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
// characters to build the password from
    mt_srand((double) microtime() * 1000000 * getmypid());
// seed the random number generater (must be done)
    $password = '';
    while (strlen($password) < $len)
        $password.=substr($chars, (mt_rand() % strlen($chars)), 1);
    return sha1(md5($password));
}

//用户名合法性
function checkzhongwenzimushuzixiahuaxian($arrtxtabc) {
    if (!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u", $arrtxtabc)) {   //utf-8汉字字母数字下划线正则表达式
        return false;
    } else {
        return true;
    }
}

//用户名合法性
function checkquestionvalue($arrtxtabc) {
    if ($arrtxtabc == 81 || $arrtxtabc == 82 || $arrtxtabc == 83 || $arrtxtabc == 84 || $arrtxtabc == 85 || $arrtxtabc == 86 || $arrtxtabc == 87 || $arrtxtabc == 88) {   //utf-8汉字字母数字下划线正则表达式
        return true;
    } else {
        return false;
    }
}

?>