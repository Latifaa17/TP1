<?php
//inclure un fichier
include "config.php";

//appel fonction
$base=connect();

//recuperation des donnees
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$tel=$_POST["tel"];
$genre=$_POST["genre"];
$mail=$_POST["mail"];
$naiss=$_POST["naiss"];
$nat=$_POST["nat"];

$interet="";
if (!empty($_POST['choix'])) {
    foreach($_POST['choix'] as $val)
    {
        $interet=$interet.$val." ";
    }
}

$m=$_POST["mdp"];

//hashage du mot de passe
$mdp=md5($m);

$cmdp=$_POST["cmdp"];

//insertion dans la bd
if ($m==$cmdp)
{
    $req="INSERT INTO users(id_user,nom,prenom,tel,genre,email,date_naiss,nationalite,mdp,interets) VALUES (null,'$nom','$prenom','$tel','$genre','$mail','$naiss','$nat','$mdp','$interet')";
    $resp=$base->exec($req);
    if($resp==1)
    {
        echo"données insérées avec succees";
        header('Location: ../html/home.html');
        exit;
    }
    else
    {
        echo "erreur d'insertion: verifier la req ou le fichier req";  
    }
}
else
{
    echo"verifiez la confirmation du mot de passe";
}
?>

