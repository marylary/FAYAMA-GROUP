<?php
session_start();
include("../url.inc.php");
require_once("../connexion.inc.php");

if(isset($_POST['action']) &&$_POST['action']=="validation" ){
    if(isset($_POST['email']) && !empty($_POST['email']) && filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL))
    {
        $email =  filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
        if(isset($_POST['token']) && !empty($_POST['token']))
        {
            $token= filter_input(INPUT_POST,"token",FILTER_SANITIZE_SPECIAL_CHARS);

            $select = $bdd->PREPARE("SELECT * from clients WHERE email=? AND token=?");
            $select->EXECUTE(array($email,$token));
            $info = $select->fetch();

            if($select->rowcount()==1){
                if(isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['passwordconfirm']) && !empty($_POST['passwordconfirm']) && $_POST['passwordconfirm']==$_POST['password'] && strlen($_POST['passwordconfirm'])>=8)
                {
                    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

                    $update = $bdd->PREPARE("UPDATE clients set motdepasse=? where token=? AND email=?");
                    $update ->EXECUTE(array($password,$token,$email));

                    if($update->rowcount()==1){

                        $delete = $bdd->PREPARE("UPDATE clients set token=?,statut=? where  email=?");
                        $delete ->EXECUTE(array("",1,$email));

                        $_SESSION["client_id"] = $info['idclient'];

                        ?>
                            1
                        <?php
                    }
                    else
                    {
                        echo("Impossible de definir un mot de passe");
                    }

                }
            }


        }
    }
}