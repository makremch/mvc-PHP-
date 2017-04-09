<?php

$path=dirname(__DIR__)."/../lib/Response.php";
// die($path);
if(file_exists($path)){
    require_once($path);
    //die("Pas de reponse");
}


$pathCnx=dirname(__DIR__)."/../lib/Connexion.php";
// die($path);
if(file_exists($pathCnx)){
    require_once($pathCnx);
    //die("Pas de reponse");
}

$pathModel=dirname(__DIR__)."/Models/Promotion.php";
// die($path);
if(file_exists($pathModel)){
    require_once($pathModel);
    //die("Pas de reponse");
}

$pathParent=dirname(__DIR__)."/Controllers/AdminController.php";
// die($path);
if(file_exists($pathParent)){
    require_once($pathParent);
    //die("Pas de reponse");
}

Class PromotionsControllers extends AdminController
{

    private $request;

    //private $response;

    function __construct($request)
    {

            parent::checkAccess();

            if (empty($this->request)) {
                $this->request = $request;
            }
            $action = $request->getAction();
            //die($action);
            $this->$action($request->getParams());

    }


    /**
     * @param $params
     * @return Response
     */
    function ajout($params)
    {
        $layout = "default.php";
        $view = "ajoutPromotion.php";
        $paramsS = array("titre_page" => "ajout client", "test" => "test layout");

        if ($_POST) {
            //instanciation du modele promotion avec parametre objet connexion bd
            $connect = new Connexion();
            $promo = new Promotion($connect->getInstance(), NULL);
            //Remplissage tab qui contiendra les valeurs de la page html qui seront par la suite uploade ds la bd
            $params = array(
                "nom" => $_POST['nom_promotion'],
                "reduction" => $_POST['reduction_promotion'],
            );

            //Enregistrer dans la table promotion :
            $promo->ajout($params);
        }
        return (new Response($this->request, $layout, $view, @$paramsS));
    }

    function afficher($params)
    {
        // Charger le moteur de template template :
        $layout = "default.php";
        $view = "promotions/afficherPromotion.php";

        $connect = new Connexion();
        $promo = new Promotion($connect->getInstance(), NULL);

        $resultat_de_modele = $promo->AfficherPromotion($params['named']['id']);
        $paramsS = array("promotions" => $resultat_de_modele);

        return (new Response($this->request, $layout, $view, @$paramsS));
    }

    function afficherAll($params)
    {

        $layout = "default.php";
        $view = "afficherAll.php";

        $connect = new Connexion();
        $promo = new Promotion($connect->getInstance(), NULL);
        $resultat_de_modele = $promo->AfficherAll();
        $paramsS = array("promotions" => $resultat_de_modele);
        //var_dump($resultat_de_modele);
        return (new Response($this->request, $layout, $view, @$paramsS));

    }

    function afficherAjax($params)
    {
        // Charger le moteur de template template :
        //die('here ajax');
        $connect = new Connexion();
        $promo = new Promotion($connect->getInstance(), NULL);

        $resultat_de_modele = $promo->AfficherPromotion($params['named']['id']);
        $result = array(
            'idPromotion' => $resultat_de_modele[0]['IdPromotion'],
            'nom' => $resultat_de_modele[0]['NomPromotion'],
            'reduction' => $resultat_de_modele[0]['Reduction']

        );

        echo json_encode($result);
        die;
    }
    /**
     * @param $params
     * @return Response
     */

    // $params est une variable qui contient l'id dans url
    function editAjax($params)
    {
        ini_set('display_errors', '1');

        if ($_POST) {
            //instanciation du modele promotion avec parametre objet connexion bd
            $connect = new Connexion();
            $promo = new Promotion($connect->getInstance(), NULL);
            //Remplissage tab qui contiendra les valeurs de la page html qui seront par la suite uploade ds la bd
            $paramsData = array(
                "nom" => $_POST['nomPromotion'],
                "reduction" => $_POST['Reduction'],
            );
            //die("ppp");
            //Enregistrer dans la table promotion :
            $result_save = $promo->updatePromotion($params['named']['id'], $paramsData);
            if ($result_save) {
                die('ok');
            } else {
                die('lee');
            }
        }
        //return (new Response($this->request,$layout,$view,@$paramsS));
    }

    function deleteAjax($params)
    {
        $connect = new connexion();

        $promo = new Promotion($connect->getInstance(),NULL);

        $id = $params["named"]["id"];
        if ($promo->deletePromotion($id))
            die ("ok");
        else
            die ("ko");
    }
    function rechercheAjax($params)
    {
        $cle=$_POST['cle'];
        //$cle='mak';

        $connect = new Connexion();
        $promo = new Promotion($connect->getInstance(), NULL);
        $result = $promo->recherche($cle);
        //var_dump($resultat_de_modele);

        echo json_encode($result);
        die;
    }

}

?>