<?php
function is_SSL(){  
if(!isset($_SERVER['HTTPS']))  
return FALSE;  
 if($_SERVER['HTTPS'] === 1){  //Apache  
  return TRUE;  
 }elseif($_SERVER['HTTPS'] === 'on'){ //IIS  
  return TRUE;  
 }elseif($_SERVER['SERVER_PORT'] == 443){ //其他  
  return TRUE;  
 }  
 return FALSE;  
}  

/* * 通用设置 */
date_default_timezone_set("Asia/Shanghai");//时区
error_reporting(0);//隐藏所有错误报告

// ** MySQL 设置 - 具体信息来自您正在使用的主机 - 请首先建立auth数据库,然后导入根目录中的auth.sql ** //
/* * 数据库名称 */
define('DB_NAME', 'auth');

/** MySQL 数据库用户名 */
define('DB_USER', 'root');

/** MySQL 数据库密码 */
define('DB_PASSWORD', '12345678');

/** MySQL 主机 */
define('DB_HOST', 'localhost');

//过期COOKIE清除SQL指令:
//DELETE FROM `cookiedata` WHERE unix_timestamp(`login_time`) < unix_timestamp('2014-02-27 20:01:43')

/** 每个用户最多的安全令数量  * */
define('MOST_AUTH', 10);

// ** 邮件设置 - 推荐使用腾讯域名邮箱以便与代码适配 ** //
/* * 邮局地址* */
define('SMTP_HOST', "smtp.qq.com");

/* * 邮局端口* */
define('SMTP_PORT', 465);

/* * 邮件用户名* */
define('SMTP_USERNAME', "10000@qq.com");

/* * 邮件密码* */
define('SMTP_PASSWD', "12345678");

//禁止直接include
define('ZHANGXUAN',true);

//是否SSL
if(is_SSL()){
	define('SSLMODE',1);
    define("SITEHOST", "https://myauth.us/");
    define("SITEHOSTSAFEMODE", "http://myauth.us/");
}else{
	define('SSLMODE',0);
    define("SITEHOST", "http://myauth.us/");
    define("SITEHOSTSAFEMODE", "https://myauth.us/");
}


define("TITLENAME", "战网安全令");

/* * 微博分享内容* */
//4个KEY
define("SINAKEY", "11111");
define("TENCENTKEY", "1111");
define("SOHUKEY", "111fafas");
define("NETEASEKEY", "23121321321312");
define("WEIBOMESSAGE", "战网安全令在线版,轻松生成/还原战网安全令,支持US/EU/CN系列安全令,随时随地获取安全令动态密码,再也不用担心将军令丢了不能玩游戏了!");


$dbconnect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); //连接数据库
@mysqli_select_db($dbconnect, DB_NAME);
?>
