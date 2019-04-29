
<?php
class blogpost {
    /**
     * PROPDESCRIPTION
     * 
     * @access private
     * @var PROPTYPE
     */
    private $id;

    /**
     * PROPDESCRIPTION
     * 
     * @access private
     * @var PROPTYPE
     */
    private $user_id;

    /**
     * PROPDESCRIPTION
     * 
     * @access private
     * @var PROPTYPE
     */
    private $title;

    /**
     * PROPDESCRIPTION
     * 
     * @access private
     * @var PROPTYPE
     */
    private $description;

    /**
     * PROPDESCRIPTION
     * 
     * @access private
     * @var PROPTYPE
     */
    private $views;

    /**
     * PROPDESCRIPTION
     * 
     * @access private
     * @var PROPTYPE
     */
    private $image;

    /**
     * PROPDESCRIPTION
     * 
     * @access private
     * @var PROPTYPE
     */
    private $preview;

    /**
     * PROPDESCRIPTION
     * 
     * @access private
     * @var PROPTYPE
     */
    private $body;

    /**
     * PROPDESCRIPTION
     * 
     * @access private
     * @var PROPTYPE
     */
    private $published;

    /**
     * PROPDESCRIPTION
     * 
     * @access private
     * @var PROPTYPE
     */
    private $created;

    /**
     * PROPDESCRIPTION
     * 
     * @access private
     * @var PROPTYPE
     */
    private $updated;

function __construct($user_id,$title,$description,$image,$preview,$body,$published){
        $this->user_id=$user_id;
        $this->title=$title;
        $this->description=$description;
        $this->image=$image;
        $this->preview=$preview;
        $this->body=$body;
        $this->published=$published;
       
                echo "<script type='text/javascript'>alert('works');</script>";

    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getId() {
        return $this->id;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @param ARGTYPE $id ARGDESCRIPTION
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getUserId() {
        return $this->user_id;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @param ARGTYPE $userId ARGDESCRIPTION
     */
    public function setUserId($userId) {
        $this->user_id = $userId;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @param ARGTYPE $title ARGDESCRIPTION
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @param ARGTYPE $description ARGDESCRIPTION
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getViews() {
        return $this->views;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @param ARGTYPE $views ARGDESCRIPTION
     */
    public function setViews($views) {
        $this->views = $views;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @param ARGTYPE $image ARGDESCRIPTION
     */
    public function setImage($image) {
        $this->image = $image;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getPreview() {
        return $this->preview;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @param ARGTYPE $preview ARGDESCRIPTION
     */
    public function setPreview($preview) {
        $this->preview = $preview;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getBody() {
        return $this->body;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @param ARGTYPE $body ARGDESCRIPTION
     */
    public function setBody($body) {
        $this->body = $body;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getPublished() {
        return $this->published;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @param ARGTYPE $published ARGDESCRIPTION
     */
    public function setPublished($published) {
        $this->published = $published;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @param ARGTYPE $created ARGDESCRIPTION
     */
    public function setCreated($created) {
        $this->created = $created;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getUpdated() {
        return $this->updated;
    }

    /**
     * METHODDESCRIPTION
     * 
     * @access public
     * @param ARGTYPE $updated ARGDESCRIPTION
     */
    public function setUpdated($updated) {
        $this->updated = $updated;
    }
}
