<?php

require '../config/database.php';

$sql1 = "SELECT pagina FROM busqueda WHERE ID=1";

$pag = $conn->query($sql1);
$row_pag = $pag->fetch_assoc();
$pagina = intval($row_pag['pagina']);

$pagina = $pagina + 1;

$sql = "UPDATE busqueda SET pagina='$pagina' WHERE ID=1";

if ($conn->query($sql)) {
}

header('Location: api.php');