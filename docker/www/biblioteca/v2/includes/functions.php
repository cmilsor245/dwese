<?
  function getEveryRow($connection, $table) {
    $select_rows_query = "SELECT * FROM $table";
    $stmt_select_rows = $connection -> prepare($select_rows_query);
    $stmt_select_rows -> execute();
    $result_selected_rows = $stmt_select_rows -> get_result();

    return $result_selected_rows;
  }

  function getEveryRowLinkTable($connection, $book_id) {
    $select_linked_authors_query = "SELECT author.name, author.last_name FROM book_author JOIN author ON book_author.author_id = author.author_id WHERE book_author.book_id = ?";
    $stmt_select_linked_authors = $connection -> prepare($select_linked_authors_query);
    $stmt_select_linked_authors -> bind_param("i", $book_id);
    $stmt_select_linked_authors -> execute();
    $result_linked_authors = $stmt_select_linked_authors -> get_result();

    return $result_linked_authors;
  }

  function getAuthorList($connection) {
    $select_authors_list_query = "SELECT * FROM author";
    $stmt_select_authors_list = $connection -> prepare($select_authors_list_query);
    $stmt_select_authors_list -> execute();
    $authors_list = $stmt_select_authors_list -> get_result();

    return $authors_list;
  }

  function insertNewAuthor($connection, $new_author_name, $new_author_last_name) {
    $insert_author_query = "INSERT INTO author (name, last_name) VALUES (?, ?)";
    $stmt_insert_author = $connection -> prepare($insert_author_query);
    $stmt_insert_author -> bind_param("ss", $new_author_name, $new_author_last_name);
    $stmt_insert_author -> execute();

    return $stmt_insert_author;
  }

  function getBookList($connection) {
    $select_book_list_query = "SELECT * FROM book";
    $stmt_select_book_list = $connection -> prepare($select_book_list_query);
    $stmt_select_book_list -> execute();
    $book_list = $stmt_select_book_list -> get_result();

    return $book_list;
  }
?>