<?
  class View {
    public static function render($view_name, $data = null) {
      $views_without_nav = ['login/form', 'login/error', 'signup/form', 'signup/error'];
      require_once 'views/header.php';
      if (!in_array($view_name, $views_without_nav)) {
        require_once 'views/nav.php';
      }
      require_once "views/$view_name.php";
      require_once 'views/footer.php';
    }
  }