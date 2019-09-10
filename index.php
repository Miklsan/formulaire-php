<?php
$firstname = $lastname = $email = $phonenumber = $message ="";
$firstnameError = $lastnameError = $emailError = $phonenumberError = $messageError ="";
$isSuccess = false;
$emailTo = "mborghmans@gmail.com";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $firstname = verifyInput ($_POST['firstname']);
    $lastname = verifyInput ($_POST['lastname']);
    $email = verifyInput ($_POST['email']);
    $phonenumber = verifyInput ($_POST['phonenumber']);
    $message = verifyInput ($_POST['message']);
    $isSuccess = true;
    $emailText = "";

    if(empty($firstname)){
        $firstnameError = "N'oublis pas ton prénom ";
        $isSuccess = false;
    }
    else{
        $emailText .= "Firstname: $firstname\n";
    }
    if(empty($lastname)){
        $lastnameError = "N'oublis pas ton nom ";
        $isSuccess = false;
    }
    else{
        $emailText .= "Lastname : $lastname\n";
    }  
    if(!isEmail($email)){
        $emailError ="Ceci n'est pas un une adresse mail";
        $isSuccess = false;
    }
    else{
        $emailText .= "Email : $email\n";
    }
    if(!isPhone($phonenumber)){
        $phonenumberError = "Que des chiffres et des espaces stp";
        $isSuccess = false;
    }
    else{
        $emailText .= "Phone : $phonenumber\n";
    }
    if(empty($message)){
        $messageError = "Qu'est ce que tu veux me dire ? ";
        $isSuccess = false;
    }
    else{
        $emailText .= "Message : $message\n";
    }
    if ($isSuccess){
       $headers ="From: $firstname $lastname <$email>\r\nReply-To: $email";//entête d'email
        mail($emailTo,"Vous avez un message", $emailText, $headers);//"mail" php function to email (adress,object,text,headers)
        $firstname = $lastname = $email = $phonenumber = $message ="";// reset form's values
    }
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


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initiale-scale=1">
    <title>Contactez-moi</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
</head>






<body>
>



    <div class="container">
        <div class="divider">
        </div>
        <div class="heading">
            <h2>Contactez-moi</h2>
        </div>
        <div class="row">
            <div class="col-xl-10 col-xl-offset-1" id="form">
                <form id="contact-form" method="post" action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']);?>" role="form">
                    <div class="row">

                        <div class="col-md-6">
                            <label for="firstname">Prénom<span class="blue"> *</span></label>
                            <input type="text" id="firstname" name="firstname"  class="form-control" placeholder="Votre prénom" value="<?php echo $firstname; ?>">
                            <p class="comments"><?php echo $firstnameError ?></p>
                        </div>

                        <div class="col-md-6">
                            <label for="lastname">Nom<span class="blue"> *</span></label>
                            <input type="text" id="lastname" name="lastname"  class="form-control" placeholder="Votre nom" value="<?php echo $lastname; ?>">
                            <p class="comments"><?php echo $lastnameError ?></p>
                        </div>

                        <div class="col-md-6">
                            <label for="email">Email<span class="blue"> *</span></label>
                            <input type="email" id="email" name="email"  class="form-control" placeholder="Votre adressse mail" value="<?php echo $email; ?>">
                            <p class="comments"><?php echo $emailError ?></p>
                        </div>

                        <div class="col-md-6">
                            <label for="phonenumber">Téléphone</label>
                            <input type="tel" id="phonenumber" name="phonenumber" class="form-control" placeholder="Votre numéro de téléphone" value="<?php echo $phonenumber; ?>">
                            <p class="comments"><?php echo $phonenumberError ?></p>
                        </div>

                        <div class="col-md-12">
                            <label for="message">Message<span class="blue"> *</span></label>
                            <textarea name="message" id="message"  class="form-control" placeholder="Votre message" rows="4" ><?php echo $message; ?></textarea>
                            <p class="comments"><?php echo $messageError ?></p>
                        </div>

                        <div class="col-md-12">
                            <p class="blue"><strong>* Ces informations sont requises.</strong></p>
                        </div>

                        <div class="col-md-12">
                            <input type="submit" class="button1" value="Envoyer">
                        </div>

                    </div>
                    <p class="merci" style="display:<?php if($isSuccess) echo 'block'; else echo 'none'?>">Votre message a bien été envoyé.Merci de m'avoir contacté </p>
                </form>

            </div>
        </div>
    </div>

</body></html>
