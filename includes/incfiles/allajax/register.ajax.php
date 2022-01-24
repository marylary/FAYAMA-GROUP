<?php
session_start();


function verification_image($image){
	if ($image && $image['error']==false){
		if ($image['size']<99999) {
			$infosfichier = pathinfo($image['name']); 
			$extension_upload = $infosfichier['extension'];
			$extensions_autorisees = array('jpg', 'jpeg', 'png');
			if (in_array($extension_upload, $extensions_autorisees)){
				return 1;                        
				 
			}  
		}
	}
}
include("../url.inc.php");
require_once("../connexion.inc.php");

   if(isset($_POST["action"]) && $_POST["action"]=="register")
    {
       if(isset($_POST["nom"]) && !empty($_POST["nom"]))
       {
           $nom = filter_input(INPUT_POST,'nom',FILTER_SANITIZE_SPECIAL_CHARS);

           if(isset($_POST["prenom"]) && !empty($_POST["prenom"]))
           {
               $prenom = filter_input(INPUT_POST,'prenom',FILTER_SANITIZE_SPECIAL_CHARS);

               if(isset($_POST["email"]) && !empty($_POST["email"]) && filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL))
               {
                   $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);

                   $select = $bdd->PREPARE("SELECT * from clients WHERE email=?");
                   $select->EXECUTE(array($email));

                   if($select->rowcount()==0){

                    if(isset($_POST["pays"]) && !empty($_POST["pays"]))
                    {
                       $pays = filter_input(INPUT_POST,'pays',FILTER_SANITIZE_SPECIAL_CHARS);

                       $select = $bdd->PREPARE("SELECT * FROM pays WHERE pays=?");
                       $select->EXECUTE(array($pays));

                       if($select->rowcount()==1)
                       {

                            if(isset($_POST["adresse"]) && !empty($_POST["adresse"]))
                            {
                                $adresse = filter_input(INPUT_POST,'adresse',FILTER_SANITIZE_SPECIAL_CHARS);

                                if(isset($_FILES['image']))
                                {
                                    if(verification_image($_FILES['image']))
                                    {
                                        $namefile = "FAYAMA_MARKET".implode(array_rand(range(1,9),5)).$_FILES['image']['name'];
                                        $token = sha1(implode(array_rand(range(1,9),5)));

                                        $insert=$bdd->PREPARE("INSERT INTO clients(nom,prenom,email,pays,adress,avatar,token) values(?,?,?,?,?,?,?)");
                                        $insert->EXECUTE(array($nom,$prenom,$email,$pays,$adresse,$namefile,$token));

                                        if($insert->rowcount()==1){

                                            move_uploaded_file($_FILES['image']['tmp_name'],"../../../images/profiles/$namefile");
                                            $object ="Validation de compte ";

                                                $link ="http://fayama_market.test/htdocs/validation-compte/?email=" .$email ."&token=".$token;
                                                $body = "<body style='background-color:gainsboro;'>
                                                    <center>
                                                        <div
                                                            style='border-radius:12px;background-color: rgba(255, 255, 255, 0.836); width: 40%; height: auto;padding-top:20px; padding-left:75px;padding-bottom:50px; padding-right:75px'>
                                                            <h1>FAYAMA MARKET</h1>
                                                            <div style='font-style: italic;padding-bottom:20px;'>
                                                            <div> 
                                                            		M/Mme $nom $prenom
                                                            </div>
                                                            <div>
                                                            Merci de vous avoir inscrit sur le meilleur site de de vente en ligne
                                                            </div> 
                                                           Pour valider votre inscription veillez cliqué sur le lien ci-dessus
                                                            </div>
                                                            
                                                            <div>   
                                                                <a href='$link'><button type='button' style='background-color:blue;color:antiquewhite;font-weight:bold;font-size:medium;padding:10px;border-radius:10px'>
                                                                        Valider
                                                                    </button></a>
                                                            </div>
            
                                                        </div>
                                                    </center>
                                                    </body>";
                                                $heading="MINE-Version : 1.0\n";
                                                $heading .="From : suppot@fayamamarket.com\n ";
                                                $heading.="Replay-to : suppot@fayamamarket.com\n";
                                                $heading.="Cc : advhcnt23@gmail.com\n";
                                                $heading.="Bc : advhcnt23@gmail.com\n";
                                                $heading.="X-Priority : 1\n";
                                                $heading.="Content-type: text/html; charset=UTF-8\n";
                                                
                                                if(mail($email,$object,$body,$heading))
                                                {
                                                    echo(1);
                                                }
                                                else
                                                {
                                                    echo("mauvais");
                                                }
                                            ?>1 <?php

                                        }
                                        else{
                                            ?>Une erreure est suvenu lors de l'inscription <?php
                                        }
                                    }
                                    else{
                                        ?>Veillez envoyer un fichier image<?php
                                    }
                                }
                                else
                                {
                                    $namefile = "FAYAMA_MARKET".implode(array_rand(range(1,9),5)).$_FILES['image']['name'];
                                    $token = sha1(implode(array_rand(range(1,9),5)));

                                    $insert=$bdd->PREPARE("INSERT INTO clients(nom,prenom,email,pays,adress,token) values(?,?,?,?,?,?)");
                                    $insert->EXECUTE(array($nom,$prenom,$email,$pays,$adresse,$token));

                                    if($insert->rowcount()==1){
                                        $link ="http://fayama_market.test/htdocs/validation-compte/?email=" .$email ."&token=".$token;
                                                $body = "<body style='background-color:gainsboro;'>
                                                    <center>
                                                        <div
                                                            style='border-radius:12px;background-color: rgba(255, 255, 255, 0.836); width: 40%; height: auto;padding-top:20px; padding-left:75px;padding-bottom:50px; padding-right:75px'>
                                                            <h1>FAYAMA MARKET</h1>
                                                            <div style='font-style: italic;padding-bottom:20px;'>
                                                            <div> 
                                                            		M/Mme $nom $prenom
                                                            </div>
                                                            <div>
                                                            Merci de vous avoir inscrit sur le meilleur site de de vente en ligne
                                                            </div> 
                                                           Pour valider votre inscription veillez cliqué sur le lien ci-dessus
                                                            </div>
                                                            
                                                            <div>   
                                                                <a href='$link'><button type='button' style='background-color:blue;color:antiquewhite;font-weight:bold;font-size:medium;padding:10px;border-radius:10px'>
                                                                        Valider
                                                                    </button></a>
                                                            </div>
            
                                                        </div>
                                                    </center>
                                                    </body>";
                                                $heading="MINE-Version : 1.0\n";
                                                $heading .="From : suppot@fayamamarket.com\n ";
                                                $heading.="Replay-to : suppot@fayamamarket.com\n";
                                                $heading.="Cc : advhcnt23@gmail.com\n";
                                                $heading.="Bc : advhcnt23@gmail.com\n";
                                                $heading.="X-Priority : 1\n";
                                                $heading.="Content-type: text/html; charset=UTF-8\n";
                                                
                                                if(mail($email,$object,$body,$heading))
                                                {
                                                    echo(1);
                                                }
                                                
                                            ?>1<?php
                                    }
                                    else{
                                        ?>Une erreure est suvenu lors de l'inscription<?php
                                    }
                                }
                            }
                            else{
                                ?>Une erreure est suvenu lors de l'inscription<?php
                            }

                        }
                        else{
                        ?>Le champ pays est invalide<?php
                        }      
                    }
                    else
                    {
                        ?>Le champ pays est vide<?php
                    } 
                       
                   }
                   else
                   {
                       ?>Cet amil existe déja<?php
                   }  
                }
                else
                {
                    ?>Le champ email est vide<?php
                }
                
            }
            else
            {
                ?>Le champ nom est vide<?php
            }

        }
        else
        {
            ?>Le champ nom est vide<?php
        }
}
else{
    ?><script>
window.location.href = "<?=$url?>htdocs/home/";
</script><?php
}


?>