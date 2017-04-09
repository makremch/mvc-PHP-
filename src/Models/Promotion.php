<?php



class Promotion
{
    private $IdPromotion;
    private $NomPromotion;
    private $Reduction;
    private $connectObj;



    /**
     * @return mixed
     */
    public function getReduction()
    {
        return $this->Reduction;
    }

    /**
     * @return mixed
     */
    public function getIdPromotion()
    {
        return $this->IdPromotion;
    }

    /**
     * @return mixed
     */
    public function getNomPromotion()
    {
        return $this->NomPromotion;
    }

    /**
     * @param mixed $IdPromotion
     */
    public function setIdPromotion($IdPromotion)
    {
        $this->IdPromotion = $IdPromotion;
    }

    /**
     * @param mixed $NomPromotion
     */
    public function setNomPromotion($NomPromotion)
    {
        $this->NomPromotion = $NomPromotion;
    }

    /**
     * @param mixed $Reduction
     */
    public function setReduction($Reduction)
    {
        $this->Reduction = $Reduction;
    }

    /**
     * Constructeur de Modele promotion
     * @param object connection
     * @param int id promotion
     * return object promotion
     * */
    public function __construct($connect,$id=NULL)
    {
        $this->connectObj=$connect;

    }




    /**
     * Add a song to database
     * TODO put this explanation into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param int $IdPromotion Promotion
     * @param string $Nom Promotion
     * @param string $Reduction on Product
     */
    public function ajout($params)
    {
        $sql="INSERT INTO promotions (IdPromotion, NomPromotion, Reduction) VALUES (NULL ,'".$params['nom']."',".$params['reduction'].")";

        $query = $this->connectObj->prepare($sql);
        $this->connectObj->exec($sql);
    }



    public function AfficherPromotion($id)
    {
        $sql="SELECT * FROM promotions WHERE IdPromotion = ?";
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
        $sql="SELECT * FROM promotions";
        $query=$this->connectObj->prepare($sql);
        if($query->execute())
        {
            $row=$query->fetchAll();
            return $row;

        }
    }



    /**
     * Update a Promotion in database
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $IdPromotion
     * @param string $NomPromotion
     * @param string $Reduction
     * @param int $IdPromotion Id
     */

    public function updatePromotion($id, $params)
    {
        $sql = "UPDATE promotions SET NomPromotion = '".$params['nom']."', Reduction = ".$params['reduction']." WHERE IdPromotion = $id";

        //die($sql);
        $query = $this->connectObj->prepare($sql);
        $parameters = array($params['nom'], (int) $params['reduction'],(int) $id);
        //var_dump($parameters);
        if($query->execute()){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Delete a Promotion in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $IdPromotion Id of Promotion
     */
    public function DeletePromotion($IdPromotion)
    {
        $sql = "DELETE FROM promotions WHERE IdPromotion = '".$IdPromotion."'";
        $query=$this->connectObj->prepare($sql);
        $parameters = array(':IdPromotion' => $IdPromotion);
        if($query->execute($parameters)){
            return true;
        }else{
            return false;
        }
    }

    public function recherche($cle)
    {
        $sql="SELECT * FROM promotions WHERE NomPromotion LIKE '%$cle%'";
        $query=$this->connectObj->prepare($sql);
        //$params = array($id);
        $response=array();
        if($query->execute())
        {
            while($row=$query->fetch()){
                    $response[]=array(
                        'id'=>$row['IdPromotion'],
                        'nom'=>$row['NomPromotion'],
                        'reduction'=>$row['Reduction']

                    );
            }

            return $response;

        }
    }

}

