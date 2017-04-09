<?php



class User
{
    private $id;
    private $email;
    private $password;
    private $telephone;
    private $connectObj;

    function __construct($connect)
    {
           $this->connectObj=$connect;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function  getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function setEmail($email)
    {
        return $this->email=$email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function setPassword($password)
    {
        return $this->password=$password;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @return mixed
     */
    public function setTelephone($telephone)
    {
        return $this->telephone=$telephone;
    }


    public function login($params)
    {
        $sql="SELECT * FROM users WHERE email= '".$params['email']."' and password='".$params['password']."'";


        $query=$this->connectObj->prepare($sql);
        $paramslogin = array($params['email'],$params['password']);
        $response=array();
        if($query->execute()){
            while($row=$query->fetch()){
                echo $row['email'];
                $response[]=array(
                    'id'=>$row['id'],
                    'email'=>$row['email'],
                    'password'=>$row['password'],
                    'telephone'=>$row['telephone']

                );
            }
            if(!empty($response)){
                return $response;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }

}