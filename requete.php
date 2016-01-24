<?php
      $tableau = [];
      $access = $_POST["access"];
      $id = $_POST["id"];

      try{
      $connexion=new PDO('mysql:host=localhost; dbname=RECLYCLING; charset=utf8','root', 'passe');
      }
      catch( Exeption $e ){
      die ('Erreur : '.$e->getMessage());
      }
      if($access === "1"){
        $requeteDelete = "DELETE FROM `commande` WHERE id=$id";
        $resultatsDelete = $connexion->query($requeteDelete);
        $resultatsDelete->closeCursor();
      }

      $requete = "SELECT * FROM commande";
      $resultat = $connexion->query($requete);
      while( $iteration = $resultat->fetch() ){
      		 array_push($tableau,$iteration);
      	}

        echo json_encode($tableau);
 ?>
