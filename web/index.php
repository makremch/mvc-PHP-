<?php
require dirname(__DIR__) . '/vendor/autoload.php';
/*
$routes=array(
    'contactus'=>array('controller'=>'contacts','action'=>'contacter_nous')

);
*/
class Request{
	private $host;
	private $webroot=null;
	private $controller=null;
	private $action=null;
	private $method;
	private $request_uri;
	private $port;
	private $ip;
	private $server_name;
	private $document_root;
	private $script_filename;
	private $params;

	function __construct(){
		$this->method=$_SERVER["REQUEST_METHOD"];
		$this->request_uri=$_SERVER["REQUEST_URI"];
		$this->port=$_SERVER["SERVER_PORT"];
		$this->server_name=$_SERVER["SERVER_NAME"];
		$this->ip=$_SERVER["SERVER_ADDR"];
		$this->document_root=$_SERVER["DOCUMENT_ROOT"];
		$this->script_filename=$_SERVER["SCRIPT_FILENAME"];
		$this->dispatsher();
		
	}
	public function dispatsher(){	
	  $new_script_file=str_replace($this->document_root,"",$this->script_filename); 
	  $new_script_file=str_replace("web/index.php","",$new_script_file);
      $this->webroot=str_replace('//','/',$new_script_file);
	  //
      //$new_script_file=str_replace("/","",$new_script_file);
	  $clean_url=str_replace($new_script_file,"",$this->request_uri);
	  //die($clean_url);
	  $params=explode("/",$clean_url);

	  foreach($params as $index=>$para){ 
		  if(empty($para)){
			  
		  }else{
			  if($this->controller==null){
					$this->controller=$para;
			  }else if($this->action==null){
					$this->action=$para;
			  }else{
			      if(!empty($para)){
			        $par=explode(':',$para);
                   $con_par=count($par);
                   if($con_par==2){
                       $this->params['named'][$par[0]]=$par[1];

                     }else{
                       $this->params['indexed'][]=$para;
                   }
			      }


			  }
		  }
	  }		  
	}

    /**
     * @return null
     */
    public function getWebroot()
    {
        return $this->webroot;
    }

	
	public function getMethod(){
		return $this->method;
	}
	public function isGet(){
		$response=false;
		if($this->method=="GET"){
			return 	true;
		}
	}
	public function isPost(){
		$response=false;
		if($this->method=="POST"){
			return true;
		}
	}	
	public function getController(){
		return $this->controller;
	}
	public function getAction(){
		return $this->action;
	}
    public function getParams(){
		return $this->params;
	}	
	
}
ini_set('display_errors',"1");
$req=new Request();
// echo "<pre>";
$controller=$req->getController();
$path=dirname(__DIR__)."/src/Controllers/".ucfirst($controller)."Controllers.php";
// die($path);
if(file_exists($path)){
 require_once($path);
	$appcontr=ucfirst($controller)."Controllers";
	$appcontroller=new $appcontr($req);
}else{
	die($controller."Controller not exist");
}



