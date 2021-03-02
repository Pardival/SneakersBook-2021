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
        $query = 'SELECT S.id_sneakers, M.id_modele, M.id_marque AS id_marque,  
                         MA.nom as companyName, S.nom AS name , M.libelle AS modele, 
                         YEAR(S.date_sortie) AS release_date , S.url_couverture AS urlImg
                    FROM sneakers S
                   INNER JOIN modele M
                      ON M.id_modele = S.fk_modele
                   INNER JOIN marque MA
                      ON MA.id_marque = M.id_marque
                   WHERE S.nom LIKE :libelle';

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