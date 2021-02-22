<?php
    require_once('config.php');
    header("Access-Control-Allow-Origin: *");

    if (isset($_GET['action'])) {
        $action = htmlspecialchars($_GET['action']);

        echo $action($bdd);
    }

    /**
     * WS qui récupère les données des SneakersCards
     * @param $bdd connexion à la base de donnée
     * @return résultat de la requête
     */
    function getSneakersCards($bdd) {
        /* Contient la requête */
        $query = 'SELECT id_sneakers, id_modele, nom AS name , libelle AS modele, 
                         YEAR(date_sortie) AS release_date , url_couverture AS urlImg
                    FROM sneakers
                   INNER JOIN modele
                      ON id_modele = fk_modele';

        /* requête préparé */
        $stmt = $bdd->prepare($query);
        $stmt->execute();
        $response = $stmt->fetchAll();

        /* Retourne la résponse au format json*/
        $json = json_encode($response);
        return $json;
    }
?>