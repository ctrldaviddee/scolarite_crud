<?php

    require_once('../modeles/operations.php');

    $obj = new operations();

    extract($_POST);

    if (isset($_POST['action']) && $_POST['action'] == 'enregistrer') {
        $nom = isset($_POST['nom']) ? $_POST['nom'] : "";
        $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : "";
        $filiere = isset($_POST['filiere']) ? $_POST['filiere'] : "";
        $scolarite = isset($_POST['scolarite']) ? $_POST['scolarite'] : "";
        
        $id = !empty($_POST['id']) ? $_POST['id'] : "";

        $donnees = array(
            'nom' => $nom,
            'prenom' => $prenom,
            'filiere' => $filiere,
            'scolarite'=> $scolarite,
        );

        if($id){
            if ($obj->mettre_a_jour($id, $donnees)) {
                $msg = array('update' => true);
            } else {
                $msg = array('update' => false);
            }
        }else{
            
            $obj->ajouter($donnees);

            $msg = array('insert' => true);
        }

        echo json_encode($msg);

        exit();

    }




    if(isset($_POST['action']) && $_POST['action'] == 'Afficher_la_table'){

        $donnees = $obj->Afficher_la_table();

        echo json_encode($donnees);

        exit();
    }

    if(isset($_GET['action']) && $_GET['action'] == 'supprimer'){

        $id = !empty($_GET['id']) ? $_GET['id'] : "";
        
        if($obj->suppression($id)){

            $msg = array('del' => true);

        }else{

            $msg = array('del' => false);

        }

        echo json_encode($msg);

        exit();

    }

    if(isset($_GET['action']) && $_GET['action'] == 'modifier'){

        $id = isset($_GET['id']) ? $_GET['id'] : "";

        $ligne = $obj->ligne_a_modifier($id);

        echo json_encode($ligne);

        exit();

    }