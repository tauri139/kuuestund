<?php
  $file_name = "data.txt";
  $entries_from_file = file_get_contents($file_name);

  //massiic olemasolevate purkidega
  $entries = json_decode($entries_from_file);

  if(isset($_GET["id"]) && isset($_GET["title"]) && isset($_GET["ingredients"]) && !empty($_GET["id"]) && !empty($_GET["title"]) && !empty($_GET["ingredients"])){
    //salvestan juurde
    $object = new StdClass();
    $object->id = $_GET["id"];
    $object->title = $_GET["title"];
    $object->ingredients = $_GET["ingredients"];

    //lisan massiivi juurde
    array_push($entries, $object);

    //teen stringiks
    $json = json_encode($entries);

    file_put_contents($file_name, $json);
  }

  echo(json_encode($entries));

?>
