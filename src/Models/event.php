<?php

/**
 * Created by PhpStorm.
 * User: makrem
 * Date: 31/03/2017
 * Time: 2:19 PM
 */
class event
{
    private $IdEvent;
    private $NomEvent;
    private $Description;
    private $video;
    private $DateEvent;
    public $connectObj;


    public function __construct($connect,$id=NULL)
    {
        $this->connectObj=$connect;
    }

    /**
     * @return mixed
     */
    public function getConnectObj()
    {
        return $this->connectObj;
    }

    /**
     * @param mixed $connectObj
     */
    public function setConnectObj($connectObj)
    {
        $this->connectObj = $connectObj;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param mixed $Description
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
    }

    /**
     * @return mixed
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @param mixed $video
     */
    public function setVideo($video)
    {
        $this->video = $video;
    }

    /**
     * @return string
     */
    public function getDateEvent()
    {
        return $this->DateEvent;
    }


    /**
     * @return string
     */
    public function getIdEvent()
    {
        return $this->IdEvent;
    }

    /**
     * @return string
     */
    public function getNomEvent()
    {
        return $this->NomEvent;
    }

    /**
     * @param string $DateEvent
     */
    public function setDateEvent($DateEvent)
    {
        $this->DateEvent = $DateEvent;
    }


    /**
     * @param string $IdEvent
     */
    public function setIdEvent($IdEvent)
    {
        $this->IdEvent = $IdEvent;
    }

    /**
     * @param string $NomEvent
     */
    public function setNomEvent($NomEvent)
    {
        $this->NomEvent = $NomEvent;
    }

    public function ajout($params)
    {
        $sql="INSERT INTO event (IdEvent, NomEvent, DateEvent, Description, video) VALUES (NULL ,'".$params['nom']."',".$params['date'].",'".$params['description']."','".$params['video']."')";
        $query = $this->connectObj->prepare($sql);
        //$params = array( $params['nom'], $params['reduction']);
        $this->connectObj->exec($sql);
    }

    public function AfficherEvent($id)
    {
        $sql="SELECT * FROM event WHERE IdEvent = ?";
        $query=$this->connectObj->prepare($sql);
        $params = array($id);
        if($query->execute($params))
        {
            $row=$query->fetchAll();
            return $row;

        }
    }

    public function afficherAll()
    {
        $sql="SELECT * FROM event";
        $query=$this->connectObj->prepare($sql);
        if($query->execute())
        {
            $row=$query->fetchAll();
            return $row;

        }
    }

    public function updateEvent($IdEvent, $params)
    {
        $sql = "UPDATE event SET NomEvent = '".$params['nom']."', DateEvent = '".$params['DateEvent']."'
         , Description ='".$params['description']."', video = '".$params['video']."' WHERE IdEvent = $IdEvent";
        //die($sql);
        $query = $this->connectObj->prepare($sql);
        if($query->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function DeleteEvent($IdEvent)
    {
        $sql = "DELETE FROM event WHERE IdEvent = '".$IdEvent."'";
        $query=$this->connectObj->prepare($sql);
        $parameters = array(':IdEvent' => $IdEvent);
        if($query->execute($parameters)){
            return true;
        }else{
            return false;
        }
    }

    public function recherche($cle)
    {
        $sql="SELECT * FROM event WHERE NomEvent LIKE '%$cle%'";
        $query=$this->connectObj->prepare($sql);
        //$params = array($id);
        $response=array();
        if($query->execute())
        {
            while($row=$query->fetch()){
                $response[]=array(
                    'id'=>$row['IdEvent'],
                    'nom'=>$row['NomEvent'],
                    'date'=>$row['DateEvent'],
                    'description'=>$row['Description'],
                    'video'=>$row['video']
                );
            }
            return $response;

        }
    }

}