<?php

require '../config/database.php';

if(isset($_POST['nombre'])){
  $categoria= $conn->real_escape_string($_POST['nombre']);
} else {
        $categoria = $conn->real_escape_string($_POST['categoria']);
}
$sql = "UPDATE busqueda SET categoria='$categoria',pagina=1 WHERE ID=1";

if ($conn->query($sql)) {
}

header('Location: api.php');