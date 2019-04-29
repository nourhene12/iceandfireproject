<?php
class evenement
{   private $id;
    private $nom;
    private $prix;
  function __construct($nom,$prix){
        $this->nom=$nom;
        $this->prix=$prix;
     
    }
    /**
     * @return mixed
     */
    public function getid()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setid($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getnom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $name
     */
    public function setnom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getprix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $date
     */
    public function setprix($prix)
    {
        $this->prix = $prix;
    }
    }
    ?>
    
   

 