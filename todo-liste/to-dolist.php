<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>My To-Do List</title>
       
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        rel="stylesheet">
        <link rel="stylesheet" href="default.css">

        
    </head>
    <body>
        <style>
            a{
                
                text-transform: uppercase;
                color: red;
                font-size: large;
            }
        </style>
        <div class="container">
            <div class="addTask">
                <input type="text" placeholder="Ajouter une tâche">
                <button>Ajouter</button>
                
            </div>

            <a href="index.php">Dèconnexion</a>


           

           
                <ol class="notCompleted"> 
                    <h3>Ecran des listes</h3>
                    

                </ol>

                <ol class="Completed"> 
                    <h3> Ecran des tâche Finies</h3>
                   

                </ol>
            </div>


        
        
        <script src="script.js"></script>
    </body>
</html>


