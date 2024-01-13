<?
  function generateDBConnection() {
      $host = "db";
      $user = "root";
      $pass = "test";
      $db_name = "tareas";

      $connection = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);

      return $connection;
  }

  function checkCredentials($connection, $username, $password) {
    $sql_query = "SELECT * FROM usuarios WHERE usuario = :username AND password = :password";
    $stmt = $connection -> prepare($sql_query);
    $stmt -> bindParam(":username", $username);
    $stmt -> bindParam(":password", $password);

    $stmt -> execute();

    $result = $stmt -> fetch();

    if ($result) {
      obtainUserId($connection, $username, $password);

      $_SESSION["logged_in"] = true;

      header("Location: ../views/content.view.php");
    } else {
      displayIncorrectLoginCredentialsErrorPage();
    }
  }

  function obtainUserId($connection, $username, $password) {
    $sql_query = "SELECT id FROM usuarios WHERE usuario = :username AND password = :password";
    $stmt = $connection -> prepare($sql_query);
    $stmt -> bindParam(":username", $username);
    $stmt -> bindParam(":password", $password);

    $stmt -> execute();

    $result_username_id = $stmt -> fetch();

    $_SESSION["user_id"] = $result_username_id["id"];
  }

  function displayEmptyLoginInputErrorPage() {
    echo "
      <!DOCTYPE html>
      <html lang = \"en\">
        <head>
          <meta charset = \"utf-8\" />
          <meta name = \"viewport\" content = \"width = device-width, initial-scale = 1.0\" />
          <title>TODO LIST</title>
          <link rel = \"stylesheet\" href = \"../css/general.css\" />
          <link rel = \"stylesheet\" href = \"../css/method-error.css\" />
        </head>
        <body>
          <div class = \"navbar\">
            <div class = \"empty-navbar-div\"></div>

            <h1 class = \"page-title\">todo list</h1>

            <div class = \"empty-navbar-div\"></div>
          </div>

          <h2 class = \"page-subtitle\">ambos campos son obligatorios</h2>

          <div class = \"comeback-options\">
            <a href = \"../views/login.html\"><button>intentarlo de nuevo</button></a>
            <a href = \"../views/signup.html\"><button>registrarse</button></a>
            <a href = \"../views/index.html\"><button>cancelar</button></a>
          </div>
        </body>
      </html>
    ";
  }

  function displayLongUsernameErrorPage() {
    echo "
      <!DOCTYPE html>
      <html lang = \"en\">
        <head>
          <meta charset = \"utf-8\" />
          <meta name = \"viewport\" content = \"width = device-width, initial-scale = 1.0\" />
          <title>TODO LIST</title>
          <link rel = \"stylesheet\" href = \"../css/general.css\" />
          <link rel = \"stylesheet\" href = \"../css/method-error.css\" />
        </head>
        <body>
          <div class = \"navbar\">
            <div class = \"empty-navbar-div\"></div>

            <h1 class = \"page-title\">todo list</h1>

            <div class = \"empty-navbar-div\"></div>
          </div>

          <h2 class = \"page-subtitle\">el nombre de usuario no puede tener más de 50 caracteres</h2>

          <div class = \"comeback-options\">
            <a href = \"../views/signup.html\"><button>intentarlo de nuevo</button></a>
            <a href = \"../views/login.html\"><button>iniciar sesión</button></a>
            <a href = \"../views/index.html\"><button>cancelar</button></a>
          </div>
        </body>
      </html>
    ";
  }

  function displayLongPasswordErrorPage() {
    echo "
      <!DOCTYPE html>
      <html lang = \"en\">
        <head>
          <meta charset = \"utf-8\" />
          <meta name = \"viewport\" content = \"width = device-width, initial-scale = 1.0\" />
          <title>TODO LIST</title>
          <link rel = \"stylesheet\" href = \"../css/general.css\" />
          <link rel = \"stylesheet\" href = \"../css/method-error.css\" />
        </head>
        <body>
          <div class = \"navbar\">
            <div class = \"empty-navbar-div\"></div>

            <h1 class = \"page-title\">todo list</h1>

            <div class = \"empty-navbar-div\"></div>
          </div>

          <h2 class = \"page-subtitle\">la contraseña no puede tener más de 200 caracteres</h2>

          <div class = \"comeback-options\">
            <a href = \"../views/signup.html\"><button>intentarlo de nuevo</button></a>
            <a href = \"../views/login.html\"><button>iniciar sesión</button></a>
            <a href = \"../views/index.html\"><button>cancelar</button></a>
          </div>
        </body>
      </html>
    ";
  }

  function displayIncorrectLoginCredentialsErrorPage() {
    echo "
      <!DOCTYPE html>
      <html lang = \"en\">
        <head>
          <meta charset = \"utf-8\" />
          <meta name = \"viewport\" content = \"width = device-width, initial-scale = 1.0\" />
          <title>TODO LIST</title>
          <link rel = \"stylesheet\" href = \"../css/general.css\" />
          <link rel = \"stylesheet\" href = \"../css/method-error.css\" />
        </head>
        <body>
          <div class = \"navbar\">
            <div class = \"empty-navbar-div\"></div>

            <h1 class = \"page-title\">todo list</h1>

            <div class = \"empty-navbar-div\"></div>
          </div>

          <h2 class = \"page-subtitle\">credenciales incorrectas</h2>

          <div class = \"comeback-options\">
            <a href = \"../views/login.html\"><button>intentarlo de nuevo</button></a>
            <a href = \"../views/signup.html\"><button>registrarse</button></a>
            <a href = \"../views/index.html\"><button>cancelar</button></a>
          </div>
        </body>
      </html>
    ";
  }

  function obtainUserName($user_id) {
    $connection = generateDBConnection();

    $sql_query = "SELECT usuario FROM usuarios WHERE id = :user_id";
    $stmt = $connection -> prepare($sql_query);
    $stmt -> bindParam(":user_id", $user_id);
    $stmt -> execute();
    $result = $stmt -> fetch();

    return $result["usuario"];
  }

  function displayPersonalTodoList($user_id) {
    $result = checkPersonalTodoList($user_id);

    if (!$result) {
      echo "
        <div id = \"empty-personal-todo-list\">
          <p id = \"empty-personal-todo-list-text\">no existen tareas vinculadas a este usuario</p>
          <div id = \"empty-personal-todo-list-options\">
            <a href = \"create-new-todo.html\"><button id = \"create-new-todo-button\">agregar una nueva tarea</button></a>
            <a href = \"../php/sign-out.php\"><button id = \"change-user-button\">cambiar de usuario</button></a>
          </div>
        </div>
      ";
    } else {
      echo "
        <div id = \"todo-list-wrapper\">
          <h3 id = \"todo-list-wrapper-title\">tus tareas pendientes son las siguientes:</h3>
      ";

      foreach ($result as $todo) {
        echo "
          <div class = \"todo-item\">
            <h4 class = \"todo-item-title\">{$todo["titulo"]}</h4>
            <div class = \"todo-item-description\">{$todo["descripcion"]}</div>
            <div class = \"todo-item-options\">
              <a href = \"todo-details.view.php?todo_id={$todo["id"]}\"><img src = \"../icons/eye.svg\" alt = \"details icon\" title = \"VER DETALLES DE LA TAREA\" /></a>
              <a href = \"edit-todo.view.php?todo_id={$todo["id"]}\"><img src = \"../icons/edit.svg\" alt = \"edit icon\" title = \"EDITAR TAREA\" /></a>
              <a href = \"../php/remove-todo.php?todo_id={$todo["id"]}\"><img src = \"../icons/trash.svg\" alt = \"delete icon\" title = \"ELIMINAR TAREA\" /></a>
            </div>
          </div>
        ";
      }

      echo "</div>";
    }
  }

  

  function checkPersonalTodoList($user_id) {
    $connection = generateDBConnection();

    $sql_query = "SELECT tarea.* FROM tarea INNER JOIN usuarios_tarea ON tarea.id = usuarios_tarea.tarea WHERE usuarios_tarea.usuario = :user_id";
    $stmt = $connection -> prepare($sql_query);
    $stmt -> bindParam(":user_id", $user_id);
    $stmt -> execute();
    $result = $stmt -> fetchAll();

    if (count($result) === 0) {
      return false;
    } else {
      return $result;
    }
  }

  function displayNoSessionErrorPage() {
    echo "
      <h2 class = \"page-subtitle\">¿qué haces aquí? ¡inicia sesión antes!</h2>

      <div class = \"comeback-options\">
        <a href = \"../index.php\"><button>página de inicio</button></a>
      </div>
    ";
  }

  function displayNoTodoIdErrorPage() {
    echo "
      <h2 class = \"page-subtitle\">no se ha recibido el identificador de la tarea</h2>

      <div class = \"comeback-options\">
        <a href = \"../index.php\"><button>volver</button></a>
      </div>
    ";
  }

  function displayEmptyNewTodoInputErrorPage() {
    echo "
      <!DOCTYPE html>
      <html lang = \"en\">
        <head>
          <meta charset = \"utf-8\" />
          <meta name = \"viewport\" content = \"width = device-width, initial-scale = 1.0\" />
          <title>TODO LIST</title>
          <link rel = \"stylesheet\" href = \"../css/general.css\" />
          <link rel = \"stylesheet\" href = \"../css/method-error.css\" />
        </head>
        <body>
          <div class = \"navbar\">
            <div class = \"empty-navbar-div\"></div>

            <h1 class = \"page-title\">todo list</h1>

            <div class = \"navbar-side\">
              <a href = \"../php/sign-out.php\"><img src = \"../icons/sign-out.svg\" alt = \"sign out icon\" /></a>
              <a href = \"../php/sign-out.php\"><span class = \"navbar-side-text\">cerrar sesión</span></a>
            </div>
          </div>

          <h2 class = \"page-subtitle\">las nuevas tareas deben tener al menos un título</h2>

          <div class = \"comeback-options\">
            <a href = \"../views/create-new-todo.html\"><button>intentarlo de nuevo</button></a>
            <a href = \"../views/content.view.php\"><button>cancelar</button></a>
          </div>
        </body>
      </html>
    ";
  }

  function displayLongTitleErrorPage() {
    echo "
      <!DOCTYPE html>
      <html lang = \"en\">
        <head>
          <meta charset = \"utf-8\" />
          <meta name = \"viewport\" content = \"width = device-width, initial-scale = 1.0\" />
          <title>TODO LIST</title>
          <link rel = \"stylesheet\" href = \"../css/general.css\" />
          <link rel = \"stylesheet\" href = \"../css/method-error.css\" />
        </head>
        <body>
          <div class = \"navbar\">
            <div class = \"empty-navbar-div\"></div>

            <h1 class = \"page-title\">todo list</h1>

            <div class = \"navbar-side\">
              <a href = \"../php/sign-out.php\"><img src = \"../icons/sign-out.svg\" alt = \"sign out icon\" /></a>
              <a href = \"../php/sign-out.php\"><span class = \"navbar-side-text\">cerrar sesión</span></a>
            </div>
          </div>

          <h2 class = \"page-subtitle\">el título de la tarea no puede superar los 20 caracteres</h2>

          <div class = \"comeback-options\">
            <a href = \"../views/create-new-todo.html\"><button>intentarlo de nuevo</button></a>
            <a href = \"../views/content.view.php\"><button>cancelar</button></a>
          </div>
        </body>
      </html>
    ";
  }

  function displayLongDescriptionErrorPage() {
    echo "
      <!DOCTYPE html>
      <html lang = \"en\">
        <head>
          <meta charset = \"utf-8\" />
          <meta name = \"viewport\" content = \"width = device-width, initial-scale = 1.0\" />
          <title>TODO LIST</title>
          <link rel = \"stylesheet\" href = \"../css/general.css\" />
          <link rel = \"stylesheet\" href = \"../css/method-error.css\" />
        </head>
        <body>
          <div class = \"navbar\">
            <div class = \"empty-navbar-div\"></div>

            <h1 class = \"page-title\">todo list</h1>

            <div class = \"navbar-side\">
              <a href = \"../php/sign-out.php\"><img src = \"../icons/sign-out.svg\" alt = \"sign out icon\" /></a>
              <a href = \"../php/sign-out.php\"><span class = \"navbar-side-text\">cerrar sesión</span></a>
            </div>
          </div>

          <h2 class = \"page-subtitle\">la descripción de la tarea no puede superar los 200 caracteres</h2>

          <div class = \"comeback-options\">
            <a href = \"../views/create-new-todo.html\"><button>intentarlo de nuevo</button></a>
            <a href = \"../views/content.view.php\"><button>cancelar</button></a>
          </div>
        </body>
      </html>
    ";
  }

  function displayIncorrectNewTodoInputErrorPage() {
    echo "
      <!DOCTYPE html>
      <html lang = \"en\">
        <head>
          <meta charset = \"utf-8\" />
          <meta name = \"viewport\" content = \"width = device-width, initial-scale = 1.0\" />
          <title>TODO LIST</title>
          <link rel = \"stylesheet\" href = \"../css/general.css\" />
          <link rel = \"stylesheet\" href = \"../css/method-error.css\" />
        </head>
        <body>
          <div class = \"navbar\">
            <div class = \"empty-navbar-div\"></div>

            <h1 class = \"page-title\">todo list</h1>

            <div class = \"navbar-side\">
              <a href = \"../php/sign-out.php\"><img src = \"../icons/sign-out.svg\" alt = \"sign out icon\" /></a>
              <a href = \"../php/sign-out.php\"><span class = \"navbar-side-text\">cerrar sesión</span></a>
            </div>
          </div>

          <h2 class = \"page-subtitle\">ha ocurrido un error al crear una nueva tarea</h2>

          <div class = \"comeback-options\">
            <a href = \"../views/create-new-todo.html\"><button>intentarlo de nuevo</button></a>
            <a href = \"../views/content.view.php\"><button>cancelar</button></a>
          </div>
        </body>
      </html>
    ";
  }

  function createNewTodo($title, $description, $user_id) {
    $connection = generateDBConnection();

    $sql_query = "INSERT INTO tarea (titulo, descripcion) VALUES (:title, :description)";
    $stmt = $connection -> prepare($sql_query);
    $stmt -> bindParam(":title", $title);
    $stmt -> bindParam(":description", $description);
    $stmt -> execute();

    createLinkedTableRecord($user_id, $connection -> lastInsertId());

    header("Location: ../views/content.view.php");
  }

  function createLinkedTableRecord($user_id, $todo_id) {
    $connection = generateDBConnection();

    $sql_query = "INSERT INTO usuarios_tarea (tarea, usuario) VALUES (:todo_id, :user_id)";
    $stmt = $connection -> prepare($sql_query);
    $stmt -> bindParam(":todo_id", $todo_id);
    $stmt -> bindParam(":user_id", $user_id);
    $stmt -> execute();
  }

  function obtainTodoDetails($todo_id) {
    $connection = generateDBConnection();

    $sql_query = "SELECT * FROM tarea WHERE id = :todo_id";
    $stmt = $connection -> prepare($sql_query);
    $stmt -> bindParam(":todo_id", $todo_id);
    $stmt -> execute();

    $result = $stmt -> fetch();

    return $result;
  }

  function displayEmptySignUpInputErrorPage() {
    echo "
      <!DOCTYPE html>
      <html lang = \"en\">
        <head>
          <meta charset = \"utf-8\" />
          <meta name = \"viewport\" content = \"width = device-width, initial-scale = 1.0\" />
          <title>TODO LIST</title>
          <link rel = \"stylesheet\" href = \"../css/general.css\" />
          <link rel = \"stylesheet\" href = \"../css/method-error.css\" />
        </head>
        <body>
          <div class = \"navbar\">
            <div class = \"empty-navbar-div\"></div>

            <h1 class = \"page-title\">todo list</h1>

            <div class = \"empty-navbar-div\"></div>
          </div>

          <h2 class = \"page-subtitle\">todos los campos son obligatorios</h2>

          <div class = \"comeback-options\">
            <a href = \"../views/signup.html\"><button>intentarlo de nuevo</button></a>
            <a href = \"../views/login.html\"><button>iniciar sesión</button></a>
            <a href = \"../views/index.html\"><button>cancelar</button></a>
          </div>
        </body>
      </html>
    ";
  }

  function displayPasswordsDontMatchErrorPage() {
    echo "
      <!DOCTYPE html>
      <html lang = \"en\">
        <head>
          <meta charset = \"utf-8\" />
          <meta name = \"viewport\" content = \"width = device-width, initial-scale = 1.0\" />
          <title>TODO LIST</title>
          <link rel = \"stylesheet\" href = \"../css/general.css\" />
          <link rel = \"stylesheet\" href = \"../css/method-error.css\" />
        </head>
        <body>
          <div class = \"navbar\">
            <div class = \"empty-navbar-div\"></div>

            <h1 class = \"page-title\">todo list</h1>

            <div class = \"empty-navbar-div\"></div>
          </div>

          <h2 class = \"page-subtitle\">las contraseñas no coinciden</h2>

          <div class = \"comeback-options\">
            <a href = \"../views/signup.html\"><button>intentarlo de nuevo</button></a>
            <a href = \"../views/login.html\"><button>iniciar sesión</button></a>
            <a href = \"../views/index.html\"><button>cancelar</button></a>
          </div>
        </body>
      </html>
    ";
  }

  function displayIncorrectSignUpCredentialsErrorPage() {
    echo "
      <!DOCTYPE html>
      <html lang = \"en\">
        <head>
          <meta charset = \"utf-8\" />
          <meta name = \"viewport\" content = \"width = device-width, initial-scale = 1.0\" />
          <title>TODO LIST</title>
          <link rel = \"stylesheet\" href = \"../css/general.css\" />
          <link rel = \"stylesheet\" href = \"../css/method-error.css\" />
        </head>
        <body>
          <div class = \"navbar\">
            <div class = \"empty-navbar-div\"></div>

            <h1 class = \"page-title\">todo list</h1>

            <div class = \"empty-navbar-div\"></div>
          </div>

          <h2 class = \"page-subtitle\">ha ocurrido un error al registrar el usuario</h2>

          <div class = \"comeback-options\">
            <a href = \"../views/signup.html\"><button>intentarlo de nuevo</button></a>
            <a href = \"../views/login.html\"><button>iniciar sesión</button></a>
            <a href = \"../views/index.html\"><button>cancelar</button></a>
          </div>
        </body>
      </html>
    ";
  }

  function signUp($connection, $username, $password) {
    if (!checkExistingUsername($connection, $username)) {
      $sql_query = "INSERT INTO usuarios (usuario, password) VALUES (:username, :password)";
      $stmt = $connection -> prepare($sql_query);
      $stmt -> bindParam(":username", $username);
      $stmt -> bindParam(":password", $password);
      $stmt -> execute();

      obtainUserId($connection, $username, $password);

      $_SESSION["logged_in"] = true;

      header("Location: ../index.php");
    } else {
      displayUsernameAlreadyExistsErrorPage();
    }
  }

  function checkExistingUsername($connection, $username) {
    $sql_query = "SELECT * FROM usuarios WHERE usuario = :username";
    $stmt = $connection -> prepare($sql_query);
    $stmt -> bindParam(":username", $username);
    $stmt -> execute();

    $result = $stmt -> fetch();

    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  function displayUsernameAlreadyExistsErrorPage() {
    echo "
      <!DOCTYPE html>
      <html lang = \"en\">
        <head>
          <meta charset = \"utf-8\" />
          <meta name = \"viewport\" content = \"width = device-width, initial-scale = 1.0\" />
          <title>TODO LIST</title>
          <link rel = \"stylesheet\" href = \"../css/general.css\" />
          <link rel = \"stylesheet\" href = \"../css/method-error.css\" />
        </head>
        <body>
          <div class = \"navbar\">
            <div class = \"empty-navbar-div\"></div>

            <h1 class = \"page-title\">todo list</h1>

            <div class = \"empty-navbar-div\"></div>
          </div>

          <h2 class = \"page-subtitle\">usuario ya existente</h2>

          <div class = \"comeback-options\">
            <a href = \"../views/signup.html\"><button>intentarlo de nuevo</button></a>
            <a href = \"../views/login.html\"><button>iniciar sesión</button></a>
            <a href = \"../views/index.html\"><button>cancelar</button></a>
          </div>
        </body>
      </html>
    ";
  }

  function checkTodoPermission($user_id, $trying_to_access_todo_id) {
    $connection = generateDBConnection();

    $sql_query = "SELECT * FROM usuarios_tarea WHERE usuario = :user_id AND tarea = :trying_to_access_todo_id";
    $stmt = $connection -> prepare($sql_query);
    $stmt -> bindParam(":user_id", $user_id);
    $stmt -> bindParam(":trying_to_access_todo_id", $trying_to_access_todo_id);
    $stmt -> execute();

    $result = $stmt -> fetch();

    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  function checkTodoPermissionDeniedErrorType($todo_id) {
    $connection = generateDBConnection();

    $sql_query = "SELECT * FROM tarea WHERE id = :todo_id";
    $stmt = $connection -> prepare($sql_query);
    $stmt -> bindParam(":todo_id", $todo_id);
    $stmt -> execute();

    $result = $stmt -> fetch();

    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  function displayTodoPermissionDeniedErrorPage() {
    $message = "<h2 class = \"page-subtitle\">acceso denegado</h2>";

    // ! código para controlar el tipo de error al entrar a una tarea diferente - no implementado - si se va a utilizar es necesario añadir el parámetro "$error_type"
    /* if ($error_type === "permission denied") {
      $message = "
        <h2 class = \"page-subtitle\">no tienes permiso para acceder a esta tarea</h2>
      ";
    } else if ($error_type === "todo not found") {
      $message = "
        <h2 class = \"page-subtitle\">la tarea a la que intentas acceder no existe</h2>
      ";
    } */

    echo "
      $message

      <div class = \"comeback-options\">
        <a href = \"content.view.php\"><button class = \"comeback-button\">volver</button></a>
        <a href = \"../php/sign-out.php\"><button class = \"comeback-button\">cambiar de usuario</button></a>
      </div>
    ";
  }

  function displayRemovingTodoPermissionDeniedErrorPage() {
    echo "
      <!DOCTYPE html>
      <html lang = \"en\">
        <head>
          <meta charset = \"utf-8\" />
          <meta name = \"viewport\" content = \"width = device-width, initial-scale = 1.0\" />
          <title>TODO LIST</title>
          <link rel = \"stylesheet\" href = \"../css/general.css\" />
          <link rel = \"stylesheet\" href = \"../css/method-error.css\" />
        </head>
        <body>
          <div class = \"navbar\">
            <div class = \"empty-navbar-div\"></div>

            <h1 class = \"page-title\">todo list</h1>

            <div class = \"navbar-side\">
              <a href = \"../php/sign-out.php\"><img src = \"../icons/sign-out.svg\" alt = \"sign out icon\" /></a>
              <a href = \"../php/sign-out.php\"><span class = \"navbar-side-text\">cerrar sesión</span></a>
            </div>
          </div>

          <h2 class = \"page-subtitle\">acceso denegado</h2>

          <div class = \"comeback-options\">
            <a href = \"../views/content.view.php\"><button class = \"comeback-button\">volver</button></a>
            <a href = \"sign-out.php\"><button class = \"comeback-button\">cambiar de usuario</button></a>
          </div>
        </body>
      </html>
    ";
  }

  function displayTodoDetails($id_result) {
    echo "
      <h2 class = \"page-subtitle\">título de la tarea: " . $id_result["titulo"] . "</h2>

      <div class = \"todo-details-wrapper\">
        <h2 class = \"page-subtitle\">descripción:</h2>

        <p class = \"todo-details-text\">
    ";

    if ($id_result["descripcion"] === "") {
      echo "<span class = \"no-description-text\">no existe una descripción para esta tarea</span>";
    } else {
      echo $id_result["descripcion"];
    }

    echo "
        </p>
      </div>

      <div class = \"comeback-options\">
        <a href = \"content.view.php\"><button class = \"comeback-button\">volver</button></a>
      </div>
    ";
  }

  function removeTodo($todo_id) {
    $connection = generateDBConnection();

    removeTodoFromLinkedTable($connection, $todo_id);

    $sql_query = "DELETE FROM tarea WHERE id = :todo_id";
    $stmt = $connection -> prepare($sql_query);
    $stmt -> bindParam(":todo_id", $todo_id);
    $stmt -> execute();

    header("Location: ../views/content.view.php");
  }

  function removeTodoFromLinkedTable($connection, $todo_id) {
    $sql_query = "DELETE FROM usuarios_tarea WHERE tarea = :todo_id";
    $stmt = $connection -> prepare($sql_query);
    $stmt -> bindParam(":todo_id", $todo_id);
    $stmt -> execute();
  }

  function displayEditTodoForm($todo_details) {
    echo "
      <h2 class = \"page-subtitle\">modificación de la tarea</h2>

      <div id = \"edit-container\">
        <form method = \"post\" action = \"../php/edit-todo.php\">
          <label for = \"todo-title\">título de la tarea</label>
          <input type = \"text\" name = \"todo-title\" id = \"todo-title\" value = \"" . $todo_details["titulo"] . "\" autofocus autocomplete = \"off\" onfocus = \"this.select()\" />

          <label for = \"todo-description\">descripción de la tarea</label>
          <textarea name = \"todo-description\" id = \"todo-description\" autocomplete = \"off\" onfocus = \"this.select()\">" . $todo_details["descripcion"] . "</textarea>

          <input type = \"hidden\" name = \"todo-id\" value = \"" . $todo_details["id"] . "\" required autocomplete = \"off\" onfocus = \"this.select()\" />

          <input type = \"submit\" value = \"guardar cambios\" />
        </form>

        <div class = \"other-options\">
          <a href = \"content.view.php\"><button>cancelar</button></a>
        </div>
      </div>
    ";
  }

  function updateTodo($todo_id, $todo_title, $todo_description) {
    $connection = generateDBConnection();

    $sql_query = "UPDATE tarea SET titulo = :todo_title, descripcion = :todo_description WHERE id = :todo_id";
    $stmt = $connection -> prepare($sql_query);
    $stmt -> bindParam(":todo_title", $todo_title);
    $stmt -> bindParam(":todo_description", $todo_description);
    $stmt -> bindParam(":todo_id", $todo_id);
    $stmt -> execute();

    header("Location: ../index.php");
  }
?>