<?php

class Response{


 function __construct($request,$layout,$view,$params){
	  $path=dirname(__DIR__)."/src/Views/".$view;
	  $path_layout=dirname(__DIR__)."/src/Views/".$layout;
		// die($path);
		if(is_array($params)){
			foreach($params as $index=>$para){
			${$index}=$para;
			}			
		}

		if(file_exists($path)){
		 ob_start();
		 require_once($path);
		 $main_content = ob_get_contents();
		ob_end_clean();
		 //echo "<pre>";
		 // print($content_view);
		 // $main_content="ici contenue";
		 if(file_exists($path_layout)){
			include_once($path_layout);	
			// print($test);
		 }
		 else{
			die("Pas de layout"); 
		 }
		} else{
			die("Pas de vue");
		}
	  
	  
 }	

}
?>