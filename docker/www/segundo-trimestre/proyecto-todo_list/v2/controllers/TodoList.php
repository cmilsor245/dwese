<?
  session_start();

  require_once 'models/Task.php';
  require_once 'models/User.php';
  require_once 'views/View.php';

  class TodoList {
    private $task, $user;

    public function __construct() {
      $this -> task = new Task();
      $this -> user = new User();
    }

    public function checkLogin() {
      if (!isset($_SESSION['logged_in'])) {
        $_SESSION['logged_in'] = false;
      }
    
      if (!$_SESSION['logged_in']) {
        View::render('login/form');
      } else {
        $task = new Task();
        $data['todo_list'] = $task -> getAllTasksForUser($_SESSION['user_id']);
        View::render('task/all', $data);
      }
    }

    public function login() {
      $user = strtolower($_REQUEST['login-username']);
      $password = $_REQUEST['login-password'];

      $user_id = $this -> user -> getId($user);

      if ($user_id) {
        $hashed_password = hash('sha256', $password);

        $result = $this -> user -> validate($user, $hashed_password);

        if ($result) {
          $_SESSION['user_id'] = $user_id[0] -> id;
          $_SESSION['logged_in'] = true;
          $this -> showTodoList();
        } else {
          View::render('login/error');
        }
      } else {
        View::render('login/error');
      }
    }

    public function showMainSignupPage() {
      View::render('signup/form');
    }

    public function signup() {
      $user = strtolower($_REQUEST['signup-username']);
      $password = $_REQUEST['signup-password'];
      $password2 = $_REQUEST['signup-password2'];

      $hashed_password = hash('sha256', $password);
      $hashed_password2 = hash('sha256', $password2);

      if ($hashed_password != $hashed_password2) {
        View::render('signup/error');
        return;
      }

      $result = $this -> user -> insert($user, $hashed_password);

      if ($result) {
        $user_id = $this -> user -> getId($user);
        $_SESSION['user_id'] = $user_id[0] -> id;
        $_SESSION['logged_in'] = true;
        $this -> showTodoList();
      } else {
        View::render('signup/error');
      }
    }

    public function showTodoList() {
      if (!isset($_SESSION['logged_in'])) {
        $data['todo_list'] = $this -> task -> getAllTasksForUser($_SESSION['user_id']);
        if (count($data['todo_list']) > 0) {
          View::render('task/all', $data);
        } else {
          View::render('task/no-tasks');
        }
      } else {
        $this -> checkLogin();
      }
    }

    public function insertTaskForm() {
      if ($_SESSION['logged_in']) {
        $data['user_id'] = $_SESSION['user_id'];
        View::render('task/form', $data);
      } else {
        $this -> checkLogin();
      }
    }

    public function insertTask() {
      if ($_SESSION['logged_in']) {
        $title = $_REQUEST['title'];
        $description = $_REQUEST['description'];
        $user_id = $_SESSION['user_id'];

        $this -> task -> insert($title, $description, $user_id);

        header('Location: index.php');

        $data['todo_list'] = $this -> task -> getAllTasksForUser($user_id);
        View::render('task/all', $data);
      } else {
        $this -> checkLogin();
      }
    }

    public function deleteTask() {
      if ($_SESSION['logged_in']) {
        $task_id = $_REQUEST['task_id'];
        $user_id = $_SESSION['user_id'];
        $task_user_id = $this -> task -> getUserId($task_id);

        if (!empty($task_user_id)) {
          $task_user_id = $task_user_id[0] -> usuario;

          if ($user_id == $task_user_id) {
            $this -> task -> delete($task_id);

            $data['todo_list'] = $this -> task -> getAllTasksForUser($user_id);
            View::render('task/all', $data);
          } else {
            View::render('task/error');
          }
        } else {
          View::render('task/error');
        }
      } else {
        $this -> checkLogin();
      }
    }

    public function modifyTaskForm() {
      if ($_SESSION['logged_in']) {
        $task_id = $_REQUEST['task_id'];
        $task_user_id = $this -> task -> getUserId($task_id);

        if (!empty($task_user_id)) {
          $task_user_id = $task_user_id[0] -> usuario;

          if ($_SESSION['user_id'] == $task_user_id) {
            $data['task'] = $this -> task -> get($task_id)[0];
            View::render('task/form', $data);
          } else {
            View::render('task/error');
          }
        } else {
          View::render('task/error');
        }
      } else {
        $this -> checkLogin();
      }
    }

    public function modifyTask() {
      if ($_SESSION['logged_in']) {
        $task_id = $_REQUEST['task_id'];
        $user_id = $_SESSION['user_id'];
        $task_user_id = $this -> task -> getUserId($task_id);

        if (!empty($task_user_id)) {
          $task_user_id = $task_user_id[0] -> usuario;

          if ($user_id == $task_user_id) {
            $title = $_REQUEST['title'];
            $description = $_REQUEST['description'];

            $this -> task -> update($task_id, $title, $description);

            header('Location: index.php');

            $data['todo_list'] = $this -> task -> getAllTasksForUser($user_id);
            View::render('task/all', $data);
          } else {
            View::render('task/error');
          }
        } else {
          View::render('task/error');
        }
      } else {
        $this -> checkLogin();
      }
    }

    public function searchTask() {
      $search_term = $_REQUEST['search_term'];

      if ($search_term !== '') {
        $data['todo_list'] = $this -> task -> search($search_term, $_SESSION['user_id']);
        View::render('task/all', $data);
      } else {
        $data['todo_list'] = []; // empty array to avoid error and display no tasks
        View::render('task/all', $data);
      }
    }

    public function logout() {
      $_SESSION['logged_in'] = false;
      $_SESSION['user_id'] = null;

      header('Location: index.php');

      $this -> checkLogin();
    }
  }
