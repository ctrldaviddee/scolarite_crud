<?php
    require_once ("connexion.php");

    class operations extends DbConnection{

        protected $table = 'etudiant';

        public function ajouter($donnees){

            if(!empty($donnees)){

                $colonnes = $valeurs = array();

                foreach($donnees as $champ => $valeur){

                    $colonnes[] = $champ;

                    $valeurs[] = ":{$champ}";
                }
            }
                // $sql = "INSERT INTO {$this->table} (nom, prenom, filiere) VALUES (:nom, :prenom, :filiere);";

            $sql = "INSERT INTO {$this->table} (" . implode(',', $colonnes) . ") VALUES (" . implode(',', $valeurs) . ");";

            $stmt = $this->con->prepare($sql);

            try {
                $this->con->beginTransaction();

                    $stmt->execute($donnees);

                $this->con->commit();

            } catch (PDOException $e) {
                
                $this->con->rollBack();

                // die($e->getMessage());

                // header("Location: ../vues/errorpage.php");

            }

        }

        public function Afficher_la_table(){

            try {
                
            $sql = "SELECT * FROM {$this->table};";

            $stmt = $this->con->prepare($sql);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            } else {

                $result = [];
            }
        
            return $result;
            } catch (PDOException $e) {
                
                die($e->getMessage());
            }



        }

        public function suppression($id_ligne){

            $sql = "DELETE FROM {$this->table} WHERE id = :id;";

            $stmt = $this->con->prepare($sql);

            $stmt->bindParam(':id', $id_ligne, PDO::PARAM_INT);

            try{

                $stmt->execute();

                return true;

            }catch(PDOException $e){

                echo $e->getMessage();

                return false;

            }

        }

        public function ligne_a_modifier($id){

            $sql = "SELECT * FROM ".$this->table." WHERE id = :id ;";

            $stmt = $this->con->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {

                $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
        
                $resultat = [];
            }
        
            return $resultat;

        }

        public function mettre_a_jour($id, $donnees){

            if (!empty($donnees)) {
                $champs = array();
                foreach ($donnees as $champ => $valeur) {
                    $champs[] = "{$champ} = :{$champ}";
                }
            }

            $sql = "UPDATE {$this->table} SET " . implode(', ', $champs) . " WHERE id = :id;";

            $donnees['id'] = $id;

            $stmt = $this->con->prepare($sql);

            try {
                $this->con->beginTransaction();

                $stmt->execute($donnees);

                $this->con->commit();

                return true;
                
            } catch (PDOException $e) {
                $this->con->rollBack();

                return false;
            }

        }

    }

?>



