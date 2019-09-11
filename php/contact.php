<?php

$array = array("firstname" => "", "lastname" => "", "email" => "", "phonenumber" => "", "message" => "", "firstnameError" => "", "lastnameError" => "", "emailError" => "", "phonenumberError" => "", "messageError" => "", "isSuccess" => false);



$emailTo = "mborghmans@gmail.com";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $array["firstname"] = verifyInput($_POST['firstname']);
    $array["lastname"] = verifyInput($_POST['lastname']);
    $array["email"] = verifyInput($_POST['email']);
    $array["phonenumber"] = verifyInput($_POST['phonenumber']);
    $array["message"] = verifyInput($_POST['message']);
    $array["isSuccess"] = true;
    $emailText = "";

    if(empty($array["firstname"])){
        $array["firstnameError"] = "N'oublis pas ton prénom ";
        $array["isSuccess"] = false;
    }
    else{
        $emailText .= "Firstname: {$array["firstname"]}\n";// {}permet à php de comprendre qu'il s'agit d'une variable
    }
    if(empty($array["lastname"])){
        $array["lastnameError"] = "N'oublis pas ton nom ";
        $array["isSuccess"] = false;
    }
    else{
        $emailText .= "Lastname : {$array["lastname"]}\n";
    }  
    if(!isEmail($array["email"])){
        $array["emailError"] ="Ceci n'est pas un une adresse mail";
        $array["isSuccess"] = false;
    }
    else{
        $emailText .= "Email : {$array["email"]}\n";
    }
    if(!isPhone($array["phonenumber"])){
        $array["phonenumberError"] = "Que des chiffres et des espaces stp";
        $array["isSuccess"] = false;
    }
    else{
        $emailText .= "Phone : {$array["phonenumber"]}\n";
    }
    if(empty($array["message"])){
        $array["messageError"] = "Qu'est ce que tu veux me dire ? ";
        $array["isSuccess"] = false;
    }
    else{
        $emailText .= "Message : {$array["message"]}\n";
    }
    if ($array["isSuccess"]){
       $headers ="From: {$array["firstname"]} {$array["lastname"]} <{$array["email"]}>\r\nReply-To: {$array["email"]}";//entête d'email
        mail($emailTo,"Vous avez un message", $emailText, $headers);//"mail" php function to email (adress,object,text,headers)
         }
         echo json_encode($array);
}
function isPhone($var) {
    return preg_match("/^[0-9 ]*$/", $var);//preg_match expression reguliere chiffre entre 0-9 avec espace
}
function isEmail($var){
    return filter_var($var, FILTER_VALIDATE_EMAIL);// isEmail compared by FILTER_VALIDATE_EMAIL
}
function verifyInput($var){

     $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    return $var;
}


?>
