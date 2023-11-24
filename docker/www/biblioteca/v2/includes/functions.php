<?
  function checkTableData($connection, $table) {
    $statement = $connection -> prepare("SELECT * FROM $table");
    $statement -> execute();
    $result = $statement -> get_result();

    return $result;
  }
?>