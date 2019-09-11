

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initiale-scale=1">
    <title>Contactez-moi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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
                <form id="contact-form" class="cont-form" method="post" action="" role="form">
                    <div class="row">

                        <div class="col-md-6">
                            <label for="firstname">Prénom<span class="blue"> *</span></label>
                            <input type="text" id="firstname" name="firstname"  class="form-control" placeholder="Votre prénom" value="">
                            <p class="comments"></p>
                        </div>

                        <div class="col-md-6">
                            <label for="lastname">Nom<span class="blue"> *</span></label>
                            <input type="text" id="lastname" name="lastname"  class="form-control" placeholder="Votre nom" value="">
                            <p class="comments"></p>
                        </div>

                        <div class="col-md-6">
                            <label for="email">Email<span class="blue"> *</span></label>
                            <input type="email" id="email" name="email"  class="form-control" placeholder="Votre adressse mail" value="">
                            <p class="comments"></p>
                        </div>

                        <div class="col-md-6">
                            <label for="phonenumber">Téléphone</label>
                            <input type="tel" id="phonenumber" name="phonenumber" class="form-control" placeholder="Votre numéro de téléphone" value="">
                            <p class="comments"></p>
                        </div>

                        <div class="col-md-12">
                            <label for="message">Message<span class="blue"> *</span></label>
                            <textarea name="message" id="message"  class="form-control" placeholder="Votre message" rows="4" ></textarea>
                            <p class="comments"></p>
                        </div>

                        <div class="col-md-12">
                            <p class="blue"><strong>* Ces informations sont requises.</strong></p>
                        </div>

                        <div class="col-md-12">
                            <input type="submit" class="button1" value="Envoyer">
                        </div>

                    </div>
                   
                </form>

            </div>
        </div>
    </div>
    
   
    <script src="js/script.js"></script>

</body></html>
