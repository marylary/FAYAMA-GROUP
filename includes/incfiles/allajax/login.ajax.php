
<?php 
session_start();

include("../url.inc.php");
require_once("../connexion.inc.php");

if(isset($_POST["action"]) && $_POST["action"]=="login")
{
    if(isset($_POST["email"]) && !empty($_POST["email"]) && filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL))
    {
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);

        if(isset($_POST["password"]) && !empty($_POST["password"]))
        {
            $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);

            $select = $bdd->PREPARE("SELECT * from clients WHERE email=?");
            $select->EXECUTE(array($email));
            $info = $select->fetch();

            if ($select->rowcount()==1 && password_verify($password,$info['motdepasse'])) 
            {
                echo(intval($info['idclient']));
            }
            else
            {
                echo(0);
            }
                
        }
        else{
            echo(0);
        }
        
    }
    else{
        echo(0);
    }
}
else{
    header("location:../../../htdocs/home/");
}
?>

