<?PHP
class Reservation
{   private $id;
    private $nom;
    private $prenon;
    private $date;
    private $description;
    private $email;
    private $time;
    private $phone;

    function __construct($nom,$prenom,$date,$description,$email,$time,$phone){
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->date=$date;
        $this->description=$description;
        $this->email=$email;
        $this->time=$time;
        $this->phone=$phone;
}
   
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
    public function getnom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $id
     */
    public function setnom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getprenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $name
     */
    public function setprenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $date
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $date
     */
    public function setTime($time)
    {
        $this->time = $time;
    }
     public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $date
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    /**
     * @return mixed
     */
    public function getdescriptionreservation()
    {
        return $this->description;
    }

    /**
     * @param mixed $message
     */
    public function setdescriptionreservation($description)
    {
        $this->description = $description;
    }
    //fonction pour inserer des données
]
   ?>