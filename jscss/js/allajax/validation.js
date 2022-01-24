

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


let valide_mail = document.getElementById('client_mail');
let token = document.getElementById('client_token');

let password_set = document.getElementById('password_set');
let password_set_error = document.getElementById('password_set_error');

let password_set_confirm = document.getElementById('password_set_confirm');
let password_set_confirm_error = document.getElementById('password_set_confirm_error');

let set_pass = document.getElementById('set_pass');

if(password_set)
{
	password_set.addEventListener("keyup", 	function()
	{
			password_set_error.setAttribute("class",'d-none');
	})
}

if(password_set_confirm)
{
	password_set_confirm.addEventListener("keyup", 	function()
	{
			password_set_confirm_error.setAttribute("class",'d-none');
	})
}


if(set_pass)
{
	set_pass.addEventListener("click",function(a){

		a.preventDefault();

		if(control(password_set,password_set_error,"Mot de pass")==1)
		{
			if(control(password_set_confirm,password_set_confirm_error,"Confirmer mot de passe")==1)
			{
				if(password_set.value===password_set_confirm.value && password_set.value.length>=8)
				{
					let regex_email = /^[\w]+([-])?[\d]*@[\w]+[\.]{1}[a-z]+$/;

					if(valide_mail.value.match(regex_email))
					{
						if(token.value != ""){

							$.post("../../../includes/incfiles/allajax/validation.ajax.php",
								{
                        			password:password_set.value,
                            		passwordconfirm:password_set_confirm.value,
                            		email :valide_mail.value,
                            		token:token.value,
                        			action:"validation",
                        		},
                       			function(data,response){

                            		if(data==1)
                            		{
                               			Swal.fire({
                                    		icon: 'success',
                                    		title: 'Enregistrement',
                                    		text: 'Création de compte éffectué avec succès!',
                                    		timer:3000,
                                		});
                                		window.location.href = "../../../htdocs/home/";
                           			}
                           			else{
                                		Swal.fire({
                                    		icon: 'error',
                                    		title: 'Ouppss',
                                    		text: data,
                                    		timer:3000,
                                		})
                            		}
                        		}
                        	);
						}
					}
				}
				else{
					 password_set_confirm_error.setAttribute("class", "text-danger");
        			password_set_confirm_error.textContent = "Vos deux mots de passe sont incompatibles";
				}

			}
		}
	});
}