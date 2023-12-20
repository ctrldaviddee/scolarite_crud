<?php
    // header("Refresh: 0; url=vues/crud.php");
    //header("Location: vues/crud.php");
    //exit;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHP Crud MVC</title>
</head>
<body>
    <h2 class="text-center py-3 bg-secondary text-white">PHP CRUD (MVC)</h2>

    <div class="container-md">

        <div class="row">

            <div class="col-9">
                
            <div id="resultat" class="text-center bg-dark h2 text-white"></div>

                <div class="input-group mb-3">

                    <span class="input-group-text bg-dark" id="search_addon">
                        
                        <i class="fa-solid fa-magnifying-glass fa-beat-fade text-white fa-lg"></i>

                    </span>

                    <input type="search" class="form-control" placeholder="Rechercher" aria-label="Rechercher" aria-describedby="search_addon">

                </div>

            </div>

            <div class="col-3">

                    <button type="button" class="btn btn-lg btn-dark" data-bs-toggle="modal" data-bs-target="#ModFom" title="Ajouter"
                    id="ajouter">
                        Ajouter
                    </button>

            </div>

        </div>

        <?php include_once "vues/formulaire.php"; ?>
        <?php include_once "vues/table.php"; ?>

    </div>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js//bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/my_script.js"></script>
</body>
</html>