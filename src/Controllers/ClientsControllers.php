<?php 
$path=dirname(__DIR__)."/../lib/Response.php";
// die($path);
if(file_exists($path)){
 require_once($path);
 //die("Pas de reponse");
} 
Class ClientsControllers {
	
	private $request;
	//private $response;
	
	function __construct($request){
		if(empty($this->request)){
			$this->request=$request;
		}
		$action=$request->getAction();
		// die($action);
		$this->$action($request->getParams());
	}
	
	function ajout($params){
	    //Faire appel au moteur de template :
		$layout="default.php";
		// Faire appel a la page view
		$view="ajoutClient.php";
		//Faire appel a l'URI pour la requette HTTP
		$paramsS=array("titre_page"=>"ajout client","test"=>"test layout");
		
		// var_dump($params);
		return (new Response($this->request,$layout,$view,@$paramsS));
		
	}
	
}


?>