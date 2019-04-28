<?php


class Client
{
    private $ID;
    private $Nom;
    private $Prenom;
    private $CIN;
	private $Tel;
    private $mail;
    private $PWD;


	public function __construct(){
$this->db = new Config();
$this->db =$this ->db->connect();	}
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->ID;
    }

    /**
     * @param mixed $id
     */
    public function setId($ID)
    {
        $this->ID= $ID;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * @param mixed $name
     */
    public function setNom($Nom)
    {
        $this->Nom = $Nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->Prenom;
    }

    /**
     * @param mixed $date
     */
    public function setPrenom($prenom)
    {
        $this->Prenom = $prenom;
    }
    public function getCin()
    {
        return $this->CIN;
    }

    /**
     * @param mixed $date
     */
    public function setCin($CIN)
    {
        $this->CIN = $CIN;
    }
    public function getTel()
    {
        return $this->Tel;
    }

    /**
     * @param mixed $date
     */
    public function setTel($Tel)
    {
        $this->Tel = $Tel;
    }
     public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $date
     */
    public function setMail($Mail)
    {
        $this->mail = $Mail;
    }
    /**
     * @return mixed
     */
	   public function getPwd()
    {
        return $this->PWD;
    }

    /**
     * @param mixed $date
     */
    public function setPwd($PWD)
    {
        $this->PWD = $PWD;
    }
	


    
    //fonction pour inserer des données
    }
?>