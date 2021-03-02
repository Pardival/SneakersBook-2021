<?php 
  $stoxkXUrlDunk  = "https://stockx.com/api/browse?productCategory=sneakers&currency=EUR&_search=Nike%20Dunk%20Low&dataType=product";
  $stockXUrlJordan1 = "https://stockx.com/api/browse?productCategory=sneakers&currency=EUR&_search=Air%20Jordan%201%20High&dataType=product";
  $db_host = "localhost";
  $db_user = "root";
  $db_pass = "";
  $db_name = "sneakers_book";
  
  $db = new PDO('mysql:host='. $db_host .';dbname='. $db_name .';charset=utf8', $db_user, $db_pass, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);

    

    class StockXAPI {

      private  $response;    // Contiendra le json retourné par la requête
      private $db;

      /**
       * Appel la requête http afin de récupérer une réponse sous format json
       * @param httpsStockXRequest conteint l'url d'appel 
       */
      function __construct($httpsStockXRequest, $db) {
        /* Utilisation de CUrl pour récupérer la réponse */
        $defaults = array(
          CURLOPT_URL => $httpsStockXRequest,
          CURLOPT_RETURNTRANSFER => TRUE,
          CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36',
          CURLOPT_SSL_VERIFYPEER => FALSE
        );

        $curl = curl_init();
        curl_setopt_array($curl, $defaults);

        $this->response = curl_exec($curl);
        curl_close($curl);

        $this->db= $db;
      }

      public  function  insertDataFromResponse() {

        $objectResponse = $this->getObjectResponse();

        $succes = 0;
        for ($i = 0; $i < sizeof($objectResponse->Products); $i++) {
          /* Données qui peuvent être hors la bd sneakers */
          $brand = $objectResponse->Products[$i]->brand;
          $modele = $objectResponse->Products[$i]->shoe;

          /* Information concernant que la sneakers */
          $name = $objectResponse->Products[$i]->name;
          $title = $objectResponse->Products[$i]->title;
          $styleId = $objectResponse->Products[$i]->styleId;
          $releaseDate = $objectResponse->Products[$i]->releaseDate;
          $year = $objectResponse->Products[$i]->year;
          $retailPrice = $objectResponse->Products[$i]->retailPrice;
          $smallImageUrl = $objectResponse->Products[$i]->media->smallImageUrl;

          // Vérifier si la marque n'est pas dans la bd ---------------------------------------
          // Si ce n'est pas le cas ajouter la marque dans la bd
          $sql = "SELECT COUNT(*) AS nb
                    FROM marque
                   WHERE nom = :nom ";

          $stmnt = $this->db->prepare($sql);
          $stmnt->execute(array(
            ':nom' => $brand
          ));

          /* Vérification de l'existence de la marque dans la bd */
          $result = $stmnt->fetch();
          if ($result["nb"] == "0") {
            /* On insert la marque dans la bd */
            $sql = "INSERT INTO marque (nom)
                    VALUES (:nom)";

            $stmnt = $this->db->prepare($sql);
            $stmnt->execute(array(
              ':nom' => $brand
            ));

            echo "ok marque";
          } 

          // Vérifier si le modèle n'est pas dans la bd  ---------------------------------------
          // Si ce n'est pas le cas, l'ajouter dans la bd
          $sql = "SELECT COUNT(*) AS nb
                    FROM modele
                   WHERE libelle = :modele ";

          $stmnt = $this->db->prepare($sql);
          $stmnt->execute(array(
            ':modele' => $modele
          ));

          /* Vérification de l'existence de la catégorie dans la bd */
          $result = $stmnt->fetch();
          if ($result["nb"] == "0") {
            /* On récupère l'id de la marque */
            $sql = "SELECT id_marque
                      FROM marque
                    WHERE nom = :nom ";

            $stmnt = $this->db->prepare($sql);
            $stmnt->execute(array(
              ':nom' => $brand
            ));
            /* résultat de la requête précédente */
            $result = $stmnt->fetch();


            /* On insert la catégorie dans la bd */
            $sql = "INSERT INTO modele (libelle, id_marque)
                    VALUES (:modele, :brandID)";

            $stmnt = $this->db->prepare($sql);
            $stmnt->execute(array(
              ':modele' => $modele,
              ':brandID' => $result['id_marque']
            ));
          }

          // Vérifier si la sneakers n'est pas dans la bd ---------------------------------------
          // Si ce n'est pas le cas, l'ajouter dans la bd
          $sql = "SELECT COUNT(*) AS nb
                    FROM sneakers
                   WHERE nom = :title ";

          $stmnt = $this->db->prepare($sql);
          $stmnt->execute(array(
            ':title' => $title
          ));

          /* Vérification de l'existence de la sneakers dans la bd */
          $result = $stmnt->fetch();
          if ($result["nb"] == "0") {
            /* On récupère l'id de la marque */
            $sql = "SELECT id_modele
                      FROM modele
                    WHERE libelle = :modele ";

            $stmnt = $this->db->prepare($sql);
            $stmnt->execute(array(
              ':modele' => $modele
            ));
            /* résultat de la requête précédente */
            $result = $stmnt->fetch();

            /* On insert la sneakers dans la bd */
            $sql = "INSERT INTO sneakers (nom, date_sortie, url_couverture, code, prix_retail, fk_modele)
                    VALUES (:title, :releaseDate, :smallImageUrl, :styleId, :retailPrice, :id_modele)";
                    
            $stmnt = $this->db->prepare($sql);
            $stmnt->execute(array(
              ":title" => $title,
              ":releaseDate" => $releaseDate,
              ":smallImageUrl" => $smallImageUrl,
              ":styleId" => $styleId,
              ":retailPrice" => $retailPrice,
              ":id_modele" => $result['id_modele']
            ));
            $succes += 1;     // Insertion réussi
          }
        }
        echo "Nombre d'insertion réussi : " . $succes . " sur ". sizeof($objectResponse->Products);
      }

      /** 
       * @return la reponse sous format json
       */
      public function getJsonResponse() {
        return $this->response;
      }

      /** 
       * @return la reponse sous format objet
       */
      public function getObjectResponse() {
        return json_decode($this->response);
      }

      /** 
       * Affiche la réponse
       */
      // public function dump() {
      //   var_dump($response->Products[0]->brand);
      // }
    }

    $api = new StockXAPI($stockXUrlJordan1, $db);

    echo $api->insertDataFromResponse();

 ?>