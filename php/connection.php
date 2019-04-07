<?php
//inclure un fichier
include "config.php";

//appel fonction
$base=connect();

//recuperation des donnees
$email=$_POST["email"];
$m=$_POST["mdp"];
$mdp=md5($m);

$test=0;

$req="SELECT * FROM users ";
$result=$base->query($req);
while($user=$result->fetchObject())  
{
    if($user->email=="$email")
    {   
        $test=1;
        if($user->mdp==$mdp)
        {   
            $id=$user->id_user;
            echo"success";
            header('Location: ../html/home.html');
            exit;
        }
        else
            echo "mot de passe incorrect";
    }
}
if(!$test)
    echo"email inexistant !";


?>