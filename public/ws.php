<?php
    require_once('config.php');

    if (isset($_GET['action'])) {
        $action = htmlspecialchars($_POST['action']);

        $action($bdd);
    }

    /**
     * WS qui récupère les données des SneakersCards
     * @param $bdd connexion à la base de donnée
     * @return résultat de la requête
     */
    function getSneakersCards($bdd) {
        /* Contient la requête */
        $query = 'SELECT id_sneakers, nom, YEAR(date_sortie), url_couverture
                    FROM sneakers';

        /* requête préparé */
        $stmt = $bdd->prepare($query);
        $stmt->execute();
        $response = $stmt->fetchAll();

        /* Retourne la résponse au format json*/
        $json = json_encode($response);
        return $json;
    }
?>