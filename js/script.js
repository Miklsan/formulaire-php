$(document).ready(()=>{
    $('#contact-form').submit(function(e){

        e.preventDefault();//enlève le comportement par défaut
        $('.comments').empty();//prend tous les commentaires et vide tout 
        var postdata = $('#contact-form').serialize();
        $.ajax({
            type: 'POST',
            url: './php/contact.php',
            data: postdata,
            dataType: 'json',
            success: function(result){
            if(result.isSuccess){
                
                $("#contact-form").append("<p class='merci'>Votre message a bien été envoyé. Merci de m'avoir contacté.</p>");// si success renvoie texte 'merci'
                $("#contact-form")[0].reset();//remet à zéro les éléments du contact form
                
                setTimeout(()=> {
                    window.location = "index.php";
                }, 3000);
                
            }
            else{
                $("#firstname + .comments").html(result.firstnameError);
                $("#lastname + .comments").html(result.lastnameError);
                $("#email + .comments").html(result.emailError);
                $("#phonenumber + .comments").html(result.phonenumberError);
                $("#message + .comments").html(result.messageError);
            }

            }

        });

    });
        });