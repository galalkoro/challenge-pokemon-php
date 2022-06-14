<?php
$dataBase = "https://pokeapi.co/api/v2/pokemon/";

for ($id = 1; $id < 6; $id++) { 
   $data = file_get_contents($dataBase.$id.'/');
   $pokemon = json_decode($data);
   echo $pokemon->name,"<br>";

}
?>