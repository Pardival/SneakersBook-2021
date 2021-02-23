<?php
    require_once('config.php');
    header("Access-Control-Allow-Origin: *");

    /* Si un ws est demandé */
    if (isset($_GET['action']) && !empty($_GET['action'])) {
        /* On stock le ws */
        $action = htmlspecialchars($_GET['action']);

        /* On cherche a appelé le ws */
        switch ($action) {
            case 'getSneakersCards':
                /* On vérifie les paramètres */ 
                $research = 
                    isset($_GET['research']) && !empty($_GET['research']) ? htmlspecialchars($_GET['research']) : '';

                echo $action($bdd, $research);
                break;
        }
    }


    /*================================================ REQUÊTE WS ======================================================*/

    /**
     * WS qui récupère les données des SneakersCards
     * @param $bdd connexion à la base de donnée
     * @param $research permets de filtrer avec "LIKE"
     * @return résultat de la requête
     */
    function getSneakersCards($bdd, $research) {
        /* Contient la requête */
        $query = 'SELECT id_sneakers, id_modele, nom AS name , libelle AS modele, 
                         YEAR(date_sortie) AS release_date , url_couverture AS urlImg
                    FROM sneakers
                   INNER JOIN modele
                      ON id_modele = fk_modele
                   WHERE nom LIKE :libelle';

        /* requête préparé */
        $stmt = $bdd->prepare($query);
        $stmt->execute(array(
            'libelle' => '%' . $research . '%'
        ));
        $response = $stmt->fetchAll();

        /* Retourne la résponse au format json*/
        $json = json_encode($response);
        return $json;
    }

    /**
     * WS qui récupère les données des SneakersCards
     * @param $bdd connexion à la base de donnée
     * @return résultat de la requête
     */
    function getCompanyForSneakersCards($bdd) {
        /* Contient la requête */
        $query = 'SELECT * 
                    FROM sneakers_marque';

        /* requête préparé */
        $stmt = $bdd->prepare($query);
        $stmt->execute();
        $response = $stmt->fetchAll();

        /* Retourne la résponse au format json*/
        $json = json_encode($response);
        return $json;
    }
?>