<?php
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $gsm = $_POST['gsm'];
    $subject = $_POST['subject'];

    $json = array('name' => $name, 'email' => $email, 'message' => $message, 'gsm' => $gsm, 'subject' => $subject);

    $json["lastId"]= $customer->addMessage($message,$name,$subject,$email,$gsm);
    $json["status"] = "success";

}else{
    $json['error'] = "Lütfen değerleri kontrol ediniz.";
}


//
//print_r($_POST);