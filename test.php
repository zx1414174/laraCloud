<?php
/**
 * 测试访问
 */
//该文件名为 sendemailPHPMail.php
/* use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'php/Exception.php';
require 'php/PHPMailer.php';
require 'php/SMTP.php'; */
include_once "class.phpmailer.php";
include_once "class.smtp.php";
//include_once "Exception.php";
//获取一个外部文件的内容
$mail=new PHPMailer();
$mailcontent = "测试邮兼嘎嘎的发送到发送到";//邮件内容
///

//设置smtp参数
$mail->IsSMTP();
$mail->SMTPAuth=true;
$mail->SMTPKeepAlive=true;
$mail->Host="ssl://smtpdm.aliyun.com";
$mail->Port=465;
//填写你的email账号和密码
$mail->Username="zx1414174";
$mail->Password="PYHzx1414174";#注意这里要填写授权码就是我在上面网易邮箱开启SMTP中提到的，不能填邮箱登录的密码哦。
//设置发送方，最好不要伪造地址
$mail->From="594330048@qq.com";
$mail->FromName="asdfasdfasdf";//发送者用户名
$mail->Subject="ahahah";//邮件标题
$mail->AltBody=$mailcontent; //邮件内容
$mail->WordWrap=50; // set word wrap
$mail->MsgHTML($mailcontent);
//设置回复地址
$mail->AddReplyTo("594330048@qq.com","***");
//设置邮件接收方的邮箱和姓名
$mail->AddAddress("594330048@qq.com","一话");//接收者邮箱和用户名
//使用HTML格式发送邮件
$mail->IsHTML(true);
//通过Send方法发送邮件
//根据发送结果做相应处理
if(!$mail->Send()){
    //echo "Mailer Error:".$mail->ErrorInfo;
    echo "<meta charset=\"UTF-8\">";
    echo "<script language=\"JavaScript\">\r\n";
    echo " alert(\"对不起，邮件发送失败！！请充实\");\r\n";
    echo " history.back();\r\n";
    echo "</script>";
    exit;
    exit();
}else{
    echo "<meta charset=\"UTF-8\">";
    echo "<script language=\"JavaScript\">\r\n";
    echo " alert(\"发送成功！！\");\r\n";
    echo " history.back();\r\n";
    echo "</script>";
    exit;
}