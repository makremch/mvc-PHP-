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

$pathModel=dirname(__DIR__)."/Models/event.php";
// die($path);
if(file_exists($pathModel)){
    require_once($pathModel);
    //die("Pas de reponse");
}

Class EventControllers {

    private $request;
    //private $response;

    function __construct($request){
        if(empty($this->request)){
            $this->request=$request;
        }
        $action=$request->getAction();
        $this->$action($request->getParams());
    }

    /**
     * @param $params
     * @return Response
     */

    function afficherAllEvent()
    {
        $layout = "default.php";
        $view = "afficherAllEvent.php";

        $connect = new Connexion();
        $ev = new event($connect->getInstance(), NULL);
        $resultat_de_modele = $ev->afficherAll();
        //die("eee");
        $paramsS = array("event" => $resultat_de_modele);
        //var_dump($resultat_de_modele);
        //die("ee");
        //die("$this->request");
        return (new Response($this->request,$layout,$view,@$paramsS));

    }



    function ajout($params)
    {
        $layout="default.php";
        $view="ajoutEvent.php";

        $paramsS=array("titre_page"=>"ajout client","test"=>"test layout");

        if ($_POST) {
            //instanciation du modele promotion avec parametre objet connexion bd
            $connect=new Connexion();
            $evennement = new event($connect->getInstance(), NULL);
            //Remplissage tab qui contiendra les valeurs de la page html qui seront par la suite uploade ds la bd
            $params = array(
                "nom" => $_POST['nom_event'],
                "date" => $_POST['Date_event'],
                "description" => $_POST['Description'],
                "video" => $_POST['Video'],
            );
            //Enregistrer dans la table event :
            $evennement->ajout($params);
        }
        return (new Response($this->request,$layout,$view,@$paramsS));
    }


    function AfficherEvent($params)
    {

        $layout="default.php";
        $view="afficherEvent.php";

        $connect=new Connexion();
        $ev=new event($connect->getInstance(),NULL);
        //die("eeee");
        $resultat_de_modele= $ev->AfficherEvent($params['named']['id']);
        //die("ll");
        $paramsS=array("event"=>$resultat_de_modele);
        //die("llee");
        return (new Response($this->request,$layout,$view,@$paramsS));
    }

    function afficherAjax($params)
    {
        $connect = new Connexion();
        $ev = new event($connect->getInstance(), NULL);
        $resultat_de_modele = $ev->AfficherEvent($params['named']['id']);
        $result = array(
            'IdEvent' => $resultat_de_modele[0]['IdEvent'],
            'NomEvent' => $resultat_de_modele[0]['NomEvent'],
            'DateEvent' => $resultat_de_modele[0]['DateEvent'],
            'Description' => $resultat_de_modele[0]['Description'],
            'video' => $resultat_de_modele[0]['video'],

        );

        echo json_encode($result);
        die;
    }

    //Params tous les donnee de l'url
    //params[named][id] :
    function editAjax($params)
    {
        ini_set('display_errors', '1');
        if ($_POST) {
            //instanciation du modele promotion avec parametre objet connexion bd
            $connect = new Connexion();
            $ev = new event($connect->getInstance(), NULL);
            $paramsData = array(
                "nom" => $_POST['NomEvent'],
                "DateEvent" => $_POST['DateEvent'],
                "description" => $_POST['Description'],
                "video" => $_POST['video'],
            );

            //Enregistrer dans la table promotion :
            $result_save = $ev->UpdateEvent($params['named']['id'], $paramsData);
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
        $ev = new event($connect->getInstance(),NULL);
        $id = $params["named"]["id"];
        if ($ev->deleteEvent($id))
            die ("ok");
        else
            die ("ko");
    }


    function rechercheAjax($params)
    {
        $cle=$_POST['cle'];
        $connect = new Connexion();
        $ev = new event($connect->getInstance(), NULL);
        $result = $ev->recherche($cle);
        echo json_encode($result);
        die;
    }


}


?>