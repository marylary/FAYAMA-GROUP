<?php

function connexion($host=null,$database=null,$user=null,$password=null)
{
  global $bdd;
    if($host && $database && $user && $password)
    {
       try
       {
        $bdd = new PDO("mysql:host=$host;dbname=$database",$user,$password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $bdd;

       }
       catch(PDOException $e)
       {
           die("Impossible de se connecter à la base de données ".$database . " à cause l'erreur suivante ".$e->getMessage());
       }
    }
    else
    {
        try
        {
         $bdd = new PDO("mysql:host=127.0.0.1;dbname=fayama_market","root","");
         $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         return $bdd;
 
        }
        catch(PDOException $e)
        {
            die("Impossible de se connecter à la base de données ".$database . " à cause l'erreur suivante ".$e->getMessage());
        }
    }
    
}
$bdd=connexion();
?>