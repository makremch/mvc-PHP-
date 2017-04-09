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

$pathModel=dirname(__DIR__)."/Models/User.php";
// die($path);
if(file_exists($pathModel)){
    require_once($pathModel);
    //die("Pas de reponse");
}

Class UsersControllers
{

    private $request;

    //private $response;

    function __construct($request)
    {

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
    function login($params)
    {
        ini_set('display_errors',"1");
        $layout = "layouts/layoutlogin.php";
        $view = "users/login.php";

        if ($_POST) {
            $paramsLogin=array(
                'email'=>$_POST['email'],
                'password'=>$_POST['password']

            );
            $connect = new Connexion();
            $promo = new User($connect->getInstance());
            $result = $promo->login($paramsLogin);
            if($result){
                //session_start();
                $_SESSION['user']=$result[0];
                header('Location: /test/promotions/afficherAll');
            }

        }
        return (new Response($this->request, $layout, $view, @$paramsS));
    }

}

?>