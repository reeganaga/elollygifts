<?php
include "koneksi.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

// var_dump($_POST);

//check db
$email = $_POST['email'];
$query = mysql_query("SELECT * FROM admin where email='{$email}' ");
//generate verification code 
$code = md5(strtotime('now'));

//diisi terlebih dahulu
$email_smtp = "";
$password_smtp = "";

//update database code
$query_update = mysql_query("UPDATE admin set verification_code='{$code}' where email='{$email}' ");

// var_dump($code);
// var_dump($query_update);
// die();
$data = mysql_fetch_array($query);
$total = mysql_num_rows($query);
// var_dump($total);
$url_website = "http://localhost/elollygifts";

if ($total >= 1) {
    // var_dump($data);
    //send email data
    $to = $data['email'];
    $id_admin = $data['id_admin'];
    $subject = "Elolly Gift - Reset Password";
    $message = "Please click this link to reset your password <a href='{$url_website}/admin-web/prosesreset.php?id_admin={$id_admin}&code={$code}'>Reset Link</a>";
    

    $mail = new PHPMailer(true);
 
    //Send mail using gmail
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = $email_smtp; // GMAIL username
    $mail->Password = $password_smtp; // GMAIL password
    $mail->IsHTML(true);
    
    //Typical mail data
    $name_from = "ElollyGift";
    $email_from = "admin@ellolygift.com";
    $mail->AddAddress($to, 'admin');
    $mail->SetFrom($email_from, $name_from);
    $mail->Subject = $subject;
    $mail->Body = $message;
    
    try{
        $mail->Send();
        echo '<script>alert("Silahkah cek email anda"); window.location="login.php";</script>';
        
        // echo "Silahkah cek email anda";
    } catch(Exception $e){
        echo '<script>alert("terdapat masalah silahkan hubungi admin"); window.location="login.php";</script>';
        //Something went bad
        // echo "Fail :(";
    }
}