<?php 

session_start();
if (isset($_POST['action'])) {
    require_once('../connexion.inc.php');
    //require_once("mailer/vendor/autoload.php");
    if ($_POST['action']=="receivecode") {
        if (isset($_POST['email']) && !empty($_POST['email']) && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            $_SESSION['email']=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

            

            $selectinfoclient = $bdd->PREPARE("SELECT * FROM clients WHERE email=?");
            $selectinfoclient->EXECUTE(array($_SESSION['email']));

            $infoclients = $selectinfoclient->fetch();

            if ($selectinfoclient->rowCount()==1) {
                $receiver = $_SESSION['email'];

                $token= implode(array_rand(range(1, 10), 6));
                $_SESSION['token']= $token;
                
                $receivername =$infoclients['prenom'].' '.$infoclients['nom'] ;

                $temps = time()+600;
                $selectinfoclient = $bdd->PREPARE("INSERT INTO resetpassword(email,token,delais) values(?,?,?) ");
                $selectinfoclient->EXECUTE(array($_SESSION['email'],$token,$temps));

                $object ="Réinitialisation de mot de pass";

                
                $body = "<body style='background-color:gainsboro;'>
                    <center>
                        <div style='border-radius:12px;background-color: rgba(255, 255, 255, 0.836); width: 40%; height: auto;padding-top:20px; padding-left:75px;padding-bottom:50px; padding-right:75px'>
                            <h1>NUMERO VIRTUEL</h1>
                            <div style='font-style: italic;padding-bottom:20px;'>
                                <div> 
                                    M/Mme $receivername
                                </div>
                                <div>
                                    Vous avez oublié votre mot de passe alors pas de panique.
                                </div> 
                                Votre code de réinitialisation est :<br>
                                $token
                            </div>
                
                        </div>
                    </center>
                </body>";
                $heading="MINE-Version : 1.0\n";
                $heading .="From : suppot@fayamashop.com\n ";
                $heading.="Replay-to : suppot@fayamashop.com\n";
                $heading.="Cc : advhcnt23@gmail.com\n";
                $heading.="Bc : advhcnt23@gmail.com\n";
                $heading.="X-Priority : 1\n";
                $heading.="Content-type: text/html; charset=UTF-8\n";

                if(mail($_SESSION['email'],$object,$body,$heading))
                {
                    echo(1);
                }
                else
                {
                    echo(1);
                }

               
                /*require_once("mailer/vendor/autoload.php");
                $receivermail=$mail;
                require_once("mailer/connect_mail.php");
                
                $result=$mailer->send($message);
                unset($message);
                echo("super"); */
            } else {
                echo("client inconnu");
            }
        } else {
            echo("Veillez revoir votre mail");
        }
    } elseif ($_POST['action']=="verificationcode") {
        if(isset($_SESSION['email']) && !empty($_SESSION['email']) && filter_var($_SESSION['email'],FILTER_VALIDATE_EMAIL))
        {
            if(isset($_POST['code']) && !empty($_POST['code']) && intval($_POST['code']))
            {
                $select = $bdd->PREPARE("SELECT * FROM resetpassword WHERE email=? AND token=?");
                $select->EXECUTE(array($_SESSION['email'],$_POST['code']));

                if($select->rowcount()==1){

                    $info = $select->fetch();
                    if($info['delais']>=intval(time())){

                        $update = $bdd->PREPARE("UPDATE resetpassword set statut=? WHERE email=? AND token=?");
                        $update->EXECUTE(array(1,$_SESSION['email'],$_POST['code']));

                      
                            echo(1);
                       

                       
                    }
                    else
                    {
                        $select = $bdd->PREPARE("DELETE FROM resetpassword WHERE email=? ");
                        $select->EXECUTE(array($_SESSION['email']));
                        echo("Le delais d'attente est dépassé");
                    }
                }
                else{
                    echo("Code de réinitialisation incorrect");
                    
                }
            }
            else{
                echo("Veillez revoir le champ de code de réinitialisation");
               
            }
        }
        else{
            echo(2);
        }
    }elseif ($_POST['action']=="setpassword"){

        if(isset($_SESSION['token']) && !empty($_SESSION['token']) && intval($_SESSION['token']) && isset($_SESSION['email']) && !empty($_SESSION['email']) && filter_var($_SESSION['email'],FILTER_VALIDATE_EMAIL)){

            $select = $bdd->PREPARE("SELECT * FROM resetpassword WHERE email=? AND token=? AND statut=?");
            $select->EXECUTE(array($_SESSION['email'],$_SESSION['token'],1));

            if($select->rowcount()==1){

                if(isset($_POST['password']) && !empty($_POST['password']))
                {
                    if(isset($_POST['confirmpassword']) && !empty($_POST['confirmpassword']))
                    {

                        if($_POST['confirmpassword']===$_POST['password'] && strlen($_POST['password'])>=8)
                        {
                            
                           $password=password_hash($_POST['confirmpassword'],PASSWORD_DEFAULT);
                           
                           $update = $bdd->PREPARE("UPDATE clients SET motdepasse=? WHERE email=?");
                           $update ->EXECUTE(array($password,$_SESSION['email']));

                           if($update->rowcount()==1){

                                $delete = $bdd->PREPARE("DELETE FROM resetpassword WHERE email=? ");
                                $delete->EXECUTE(array($_SESSION['email']));
                                
                                    echo(1);
                               
                           }
                           else{
                               echo("Impossible de mettre à jour votre mot de passe");
                           }
                        }
                        else{
                            echo("Veillez revoir vos mots de passe");
                        }

                    }
                    else{
                        echo("Veillez revoir le champ confirmer mot de passe");
                    }
                }
                else{
                    echo("Veillez revoir le champ mot de passe");
                }
            }
            else{
                echo("TATA");
            }
        }
        else{
            echo("TOTO");
        }

    }
    else{
        echo(2);
    }
}
else{
   echo(2); 
}

?>
