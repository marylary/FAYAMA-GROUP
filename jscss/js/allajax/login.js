// function de control

function control(valeur, valeur_error, champ) {

    if (valeur.value != "") {
        valeur_error.setAttribute("class", "d-none");
        return 1
    } else if (valeur.value == "") {
        valeur_error.setAttribute("class", "text-danger");
        valeur_error.textContent = "Le champ " + champ + " vide";
        return 0;
    }
}



// les button de redirection login et register

let register_link = document.getElementById('register_link');
let login_link = document.getElementById('login_link');


// Changement de lien 

if(register_link)
{
    register_link.addEventListener("click",function(e){
        register_link.setAttribute("class","btn_3 d-none");
        login_link.setAttribute("class","btn_3");

        login_part_form.setAttribute("class","login_part_form d-none");
        register_part_form.setAttribute("class","");
    })
}

if(login_link)
{
    login_link.addEventListener("click",function(e){
        login_link.setAttribute("class","btn_3 d-none");
        register_link.setAttribute("class","btn_3");

        register_part_form.setAttribute("class","  d-none");
        login_part_form.setAttribute("class","login_part_form");
    })
}





let email = document.getElementById("email");
let email_error = document.getElementById("email_error");
let password = document.getElementById("password");
let password_error = document.getElementById("password_error");
let login = document.getElementById("login");

function controle_email() {
    let regex_email = /^[\w]+([-])?[\d]*@[\w]+[\.]{1}[a-z]+$/;

    if (email.value.match(regex_email)) {
        email_error.setAttribute("class", "d-none");
        return 1;
    } else if (email.value == "") {
        email_error.setAttribute("class", "d-none");
        return 0;
    } else {
        email_error.textContent = "Format invalide";
        email_error.setAttribute("class", "text-danger");
        return 0;
    }
}

if (email) {
    email.addEventListener("keyup", controle_email);
}

if(password){
    password.addEventListener("keyup",function(){
        password_error.setAttribute("class","d-none");

    })
}



if (login) {
    login.addEventListener("click", function(e) {
        // e est une variable pour eviter l'action pas défaut du click du button
        e.preventDefault();

        if(control(email, email_error, "Email") ==1){

            if (controle_email() == 1) {

                if (control(password, password_error, "Mot de passe") ==1) {

                    $.post("../../../includes/incfiles/allajax/login.ajax.php",{
                        email:email.value,
                        password:password.value,
                        action:"login",
                        },
                        function(data,response){

                            if(data!=0)
                            {
                               Swal.fire({
                                    icon: 'success',
                                    title: 'LOGIN',
                                    text: 'Connexion éffectué avec succès',
                                    timer:3000,
                                })

                               window.location.href="../../../htdocs/home/";
                            }
                            else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Ouppss',
                                    text: 'Client inconnu '+data,
                                    timer:3000,
                                })
                            }
                        }
                    );

                }
             }
        }
    });
}



// register part

let register = document.getElementById("register");
let nextto2 = document.getElementById("nextto2");
let nextto3 = document.getElementById("nextto3");
let backto1 = document.getElementById("backto1");
let backto2 = document.getElementById("backto2");

// les champs
let nom = document.getElementById("nom");
let prenom = document.getElementById("prenom");
let register_email = document.getElementById("register_email");
let pays = document.getElementById("pays");
let adress = document.getElementById("adresse");
let avatar = document.getElementById("avatar");

// les steps

let step1 = document.getElementById("part1");
let step2 = document.getElementById("part2");
let step3 = document.getElementById("part3");
let step4 = document.getElementById("part4");

// les erreurs
let nom_error = document.getElementById("nom_error");
let prenom_error = document.getElementById("prenom_error");
let register_email_error = document.getElementById("register_email_error");
let pays_error = document.getElementById("pays_error");
let adress_error = document.getElementById("adresse_error");


if(nom){
    nom.addEventListener("keyup", function() {
    nom_error.setAttribute("class", "d-none");
});
}

if(prenom){
    prenom.addEventListener("keyup", function() {
    prenom_error.setAttribute("class", "d-none");
});
}

if (adress) {
    adress.addEventListener("keyup", function() {
        adress_error.setAttribute("class", "d-none");
    });
}

if (register_email) {
    let register_emaile = /^[\w]+([-])?[\d]*@[\w]+[\.]{1}[a-z]+$/;
    register_email.addEventListener("keyup", function() {
        if (register_email.value.match(register_emaile)) {
            register_email_error.setAttribute("class", "d-none");
        } else if(register_email.value=="")
        {
            register_email_error.setAttribute("class", "d-none");
        }
        else {
            register_email_error.setAttribute("class", "text-danger");
            register_email_error.textContent = "Veillez revoir le format du mail";
        }

    });
}









if (nextto2) {
    nextto2.addEventListener("click", function(a) {
        a.preventDefault();

        if (control(nom, nom_error, "nom") == 1) {
            //alert("salut");
            if (control(prenom, prenom_error, "prenom") == 1) {
                let rege_email = /^[\w]+([-])?[\d]*@[\w]+[\.]{1}[a-z]+$/;
                if ( control(register_email,register_email_error,"Email") && register_email.value.match(rege_email)) {
                    step1.setAttribute("class", "d-none");
                    step2.setAttribute("class", "");

                    nextto3.addEventListener("click", function(b) {
                        b.preventDefault();
                        if (control(pays, pays_error, "pays") == 1) {
                            if (control(adress, adress_error, "adress") == 1) {
                                step2.setAttribute("class", "d-none");
                                step3.setAttribute("class", "");

                                register.addEventListener("click", function(c) {
                                    c.preventDefault();
                                    if (avatar.value != "") {
                                        let file = avatar.value;

                                        let tableau = ["png", "jpeg", "jpg"]
                                        let type = file.split(".");

                                       

                                        if (tableau.indexOf(type[(type.length)-1]) != -1) {
                                            
                                            let data = new FormData();

                                            data.append("action","register");
                                            data.append("nom",nom.value);
                                            data.append("prenom",prenom.value);
                                            data.append("email",register_email.value);
                                            data.append("pays",pays.value);
                                            data.append("adresse",adress.value);
                                            data.append("image",avatar.files[0]);

                                            a

                                            $.ajax({
                                                url:'../../../includes/incfiles/allajax/register.ajax.php',
                                                type:'post',
                                                data:data,
                                                contentType:false,
                                                processData:false,
                                                success: function(response){
                                                    

                                                    if(response==1)
                                                    {
                                                        step3.setAttribute("class", "d-none");
                                                        step4.setAttribute("class", "");
                                                       

                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Enregistrement',
                                                            text: 'Création de compte éffectué avec succès!',
                                                        })

                                                    }
                                                    else{
                                                        
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'OUpppsssss',
                                                            text: response,
                                                        })
                                                    }

                                                }
                                            });

                                            


                                            
                                        }
                                    } else {

                                        let data = new FormData();

                                            data.append("action","register");
                                            data.append("nom",nom.value);
                                            data.append("prenom",prenom.value);
                                            data.append("email",register_email.value);
                                            data.append("pays",pays.value);
                                            data.append("adresse",adress.value);
                                            

                                            $.ajax({
                                                url:'../../../includes/incfiles/allajax/register.ajax.php',
                                                type:'post',
                                                data:data,
                                                contentType:false,
                                                processData:false,
                                                success: function(response){

                                                    if(response==1)
                                                    {
                                                        step3.setAttribute("class", "d-none");
                                                        step4.setAttribute("class", "");
                                                       

                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Enregistrement',
                                                            text: 'Création de compte éffectué avec succès!',
                                                        })

                                                    }
                                                    else{
                                                       
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'OUpppsssss',
                                                            text: response,
                                                        })
                                                    }

                                                }
                                            });
                                    }

                                });

                            }
                        }
                    });


                }
            }

        }
    })

}


// Click des buttons de retour
if(backto1)
{
    backto1.addEventListener("click",function(d){
        d.preventDefault();
        step2.setAttribute("class","d-none");
        step1.setAttribute("class","");
    });
  

}

if(backto2)
{
    backto2.addEventListener("click",function(d){
        d.preventDefault();
        step3.setAttribute("class","d-none");
        step2.setAttribute("class","");
    });
  

}

