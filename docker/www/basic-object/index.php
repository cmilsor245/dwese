<?
  require_once "Person.php";

  $person = new Person("christian", "millán soria", 22);

  $person -> greet();

  echo "<br />" . $person;
?>