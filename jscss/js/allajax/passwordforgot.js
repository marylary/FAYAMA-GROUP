//Elements du premier formulaire
let forgot_email = document.getElementById('forgot_email');
let forgot_email_error = document.getElementById('forgot_email_error');
let forgotpassword_button = document.getElementById('forgotpassword_button');

//Elements du deuxieme formulaire
let forgot_code = document.getElementById('forgot_code');
let forgot_code_error = document.getElementById('forgot_code_error');
let code_button = document.getElementById('code_button');

//Elements du troisieme formulaire
let newpassword_forgot = document.getElementById('newpassword_forgot');
let newpassword_forgot_error = document.getElementById('newpassword_forgot_error');
let confirmnewpassword_forgot = document.getElementById('confirmnewpassword_forgot');
let confirmnewpassword_forgot_error = document.getElementById('confirmnewpassword_forgot_error');
let resetpasswordbutton = document.getElementById('resetpasswordbutton');

if (forgot_email) {
    let regex = /^[\w]+([-])?[\d]*@[\w]+[\.]{1}[a-z]+$/;
    forgot_email.addEventListener("keyup", function() {
        if (forgot_email.value.match(regex)) {
            forgot_email_error.setAttribute("class", "d-none");
        } else if (forgot_email.value == "") {
            forgot_email_error.setAttribute("class", "d-none");
        } else {
            forgot_email_error.setAttribute("class", "text-danger");
            forgot_email_error.textContent = "Veillez revoir le format du mail";
        }

    });
}

if (forgot_code) {
    forgot_code.addEventListener("keyup", function() {
        if (forgot_code.value.length == 6 && parseInt(forgot_code.value)) {
            $.post("../../../includes/incfiles/allajax/forgot-password.ajax.php", {
                    code: forgot_code.value,
                    action: "verificationcode",
                },
                function(data, response) {

                    if (data == 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Code Confirmé ',
                            timer: 3000,

                        })

                        window.location.href = "?nouveau=password";



                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ouppss',
                            text: data,
                            timer: 3000,
                        })
                    }
                }
            );
        }
    });
}
/*if (forgot_code) {
forgot_code.addEventListener("keyup", function() {
        forgot_code_error.setAttribute("class", "d-none");
});
} */

if (newpassword_forgot) {
    newpassword_forgot.addEventListener("keyup", function() {
        newpassword_forgot_error.setAttribute("class", "d-none");
    });
}

if (confirmnewpassword_forgot) {
    confirmnewpassword_forgot.addEventListener("keyup", function() {
        confirmnewpassword_forgot_error.setAttribute("class", "d-none");
    });
}
// Validation du mail

if (forgotpassword_button) {
    forgotpassword_button.addEventListener("click", function(e) {
        e.preventDefault();
        let voir_email = /^[\w]+([-])?[\d]*@[\w]+[\.]{1}[a-z]+$/;
        if (control(forgot_email, forgot_email_error, "Email") == 1 && forgot_email.value.match(voir_email)) {

            $.post("../../../includes/incfiles/allajax/forgot-password.ajax.php", {
                    email: forgot_email.value,
                    action: "receivecode",
                },
                function(data, response) {

                    if (data == 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Email Envoyé ',
                            text: 'Veillez vérifier votre boîte mail',
                            timer: 3000,

                        })
                        window.location.href = "?code=envoye";


                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ouppss',
                            text: data,
                            timer: 3000,
                        })
                    }
                }
            );

        }
    })
}

//Nouveaumot de passe
if (resetpasswordbutton) {
    resetpasswordbutton.addEventListener("click", function(d) {
        d.preventDefault();
        if (control(newpassword_forgot, newpassword_forgot_error, "Nouveau mot de passe")) {
            if (control(confirmnewpassword_forgot, confirmnewpassword_forgot_error, "Confirmer nouveuotdeasse ")) {
                if (confirmnewpassword_forgot.value === newpassword_forgot.value && confirmnewpassword_forgot.value.length >= 8) {
                    $.post("../../../includes/incfiles/allajax/forgot-password.ajax.php", {
                            password: newpassword_forgot.value,
                            confirmpassword: confirmnewpassword_forgot.value,
                            action: "setpassword",
                        },
                        function(data, response) {

                            if (data == 1) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Réinitalisation éffectuée avec sucsès',
                                    text: 'Veillez vérifier votre boîte mail',
                                    timer: 3000,

                                })
                                window.location.href = "../login/";


                            } else if (data == 2) {
                                window.location.href = "?code=envoye";
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Ouppss',
                                    text: data,
                                    timer: 3000,
                                })
                            }
                        });
                }
            }
        }
    })
}