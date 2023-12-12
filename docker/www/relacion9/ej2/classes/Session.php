<?
  class Session {
    public $attribute;
    public $value;

    public function __construct($attribute, $value) {
      $this -> setAttribute($attribute, $value);
    }

    public function setAttribute($attribute, $value) {
      session_start();
      if (!isset($_SESSION)) {
        $_SESSION = array();
      }
      $_SESSION[$attribute] = $value;
    }

    public function getAttribute($attribute) {
      if (isset($_SESSION[$attribute])) {
        return $_SESSION[$attribute];
      } else {
        return null;
      }
    }

    public function deleteAttribute($attribute) {
      if (isset($_SESSION[$attribute])) {
        unset($_SESSION[$attribute]);
      }
    }

    public function destroySession() {
      session_destroy();
    }
  }
?>