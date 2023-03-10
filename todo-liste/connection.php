<?php

 session_start();
// exit();
require('src/connection.php');

if(isset($_SESSION['connect'])){
    // header('location: index.php'); 
    header('location: to-dolist.php');     
    // exit();
 }
 

require('src/connection.php');
//CONNEXION
if(!empty($_POST['email']) && !empty($_POST['password'])){



    // VARIABLES
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $error      = 1;
    
    
    // CRYPTER LE PASSWORD
    $password = "aq1".sha1($password."1254")."25";



    $req = $db->prepare('SELECT * FROM users WHERE email = ?');
    $req->execute(array($email));
    // recuperer toutes les utilisateur
    while($user = $req->fetch()){
        if($password = $user['password']){

            $error = 0;
            $_SESSION['connect'] = 1;
            $_SESSION['pseudo']  = $user['pseudo'];
            if(isset($_POST['connect'])){
                setcookie('log', $user['secret'], time() + 365*24*3600, '/', null, false, true);
            }



            header('location: connection.php?success=1');

        }
        

    
}
if($error == 1){

    // header('location: connection.php?error=1');
}

}




?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <title> connection  </title>
        <link rel="stylesheet" type="text/css" href="design/default.css">
    </head>
    <body>

        <header>

            <h1>connexion</h1>
        </header>
        <div class="container">
            <p id="info">Bievenue sur mon site, si vous n'etes pas inscrit, inscrivez-vous.
                Sinon, <a href="index.php">Inscriez-vous</a></p>

                <?php
           if(isset($_GET['error'])){
               echo'<p id="error">Nous ne pouvons pas vous authentifier.</p>';
           }
           else if(isset($_GET['success'])){
               echo'<p id="success">Vous êtes maintenant connecté.</p>';
           }
       ?>

                    
        <div id="form"> 
            <form method="POST" action="connection.php">
                <table>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" placeholder="Ex : example@google.com" required></td>
                    </tr>
                    <tr>
                        <td>Mot de passe</td>
                        <td><input type="password" name="password" placeholder="Ex : ********" required ></td>
                    </tr>
                </table>
                <p><label><input type="checkbox" name="connect" checked>Connexion automatique</label></p>
                <div id="button">
                    <button type='submit'>Connexion</button>
                </div>
            </form>
         </div>
    <!-- </div>  -->

        </div>
    </body>
</html>