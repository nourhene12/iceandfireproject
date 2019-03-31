<?php
error_reporting(E_ALL & ~E_NOTICE);
define('MAX_STARS', 5);
define('DB_HOST', 'localhost');
define('DB_NAME', 'iceandfiredb');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

class Rating {
  private $pdo = null;
  private $stmt = null;

  function __destruct () {
  // __destruct() : close connection when done

    if ($this->stmt !== null) {
      $this->stmt = null;
    }
    if ($this->pdo !== null) {
      $this->pdo = null;
    }
  }

  function __construct () {
  // __construct() : connect to the database
  // PARAM : DB_HOST, DB_CHARSET, DB_NAME, DB_USER, DB_PASSWORD

    try {
      $this->pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD, [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false
        ]
      );
      return true;
    } catch (Exception $ex) {
      $this->CB->verbose(0, "DB", $ex->getMessage(), "", 1);
    }
  }

  function save ($user, $id, $stars){
  // save() : save the rating
  // PARAM $user - user ID
  //       $id   - article or product id being rated
  //       $stars - The number odf stars

    $sql = "REPLACE INTO `star_rating` (`temoignage_id`, `user_id`, `rating`) VALUES (?, ?, ?)";
    $cond = [$user, $id, $stars];

    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
    } catch (Exception $ex) {
      // die($ex->getMessage());
      return false;
    }

    return true;
  }
  
  function avg ($id){
  // avg() : get the average rating for the selected article or product
  // PARAM $id - article or product id

    $sql = "SELECT AVG(`rating`) `avg` FROM `star_rating` WHERE `temoignage_id`=?";
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute([$id]);
    $average = $this->stmt->fetchAll();
    return $average[0]['avg'];
  }
}
?>