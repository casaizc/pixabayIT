<?php

session_start();

require '../config/database.php'; //conexion a base de datos

$sql = "SELECT * FROM `busqueda` WHERE ID=1;"; //Obtengo los parametros de busqueda de la base de datos
$usuarios = $conn ->query($sql);
$row_usuarios = $usuarios->fetch_assoc();

$palabraclave = $row_usuarios['categoria']; //se asignan los parametros a objetos
$lenguaje = 'es';
$pagina = $row_usuarios['pagina'];
$per_page = 10;

$parameters=[
    "key" => '13119377-fc7e10c6305a7de49da6ecb25',
    "q" => $palabraclave,
    "lang" => $lenguaje,
    "page" => $pagina,
    "per_page" => $per_page
];

$url = "https://pixabay.com/api/";
$qs = http_build_query($parameters);//se organiza la peticion a la api
//echo $qs ,'<br>';
$request = "{$url}?{$qs}"; 
//echo $request ,'<br>';

$curl = curl_init();

curl_setopt_array($curl, array(CURLOPT_URL => $request, CURLOPT_RETURNTRANSFER => 1));//se crea la peticion a la api

$response = curl_exec($curl); //se ejecuta la peticion
$resultado = json_decode($response); //se obtiene y decofica la respuesta de la api

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASE DE DATOS DE IMAGENES PIXABAY</title>

    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/all.min.css" rel="stylesheet">
</head>

<body>
<div class="container py-3">

    <h2 class="text-center">IMAGENES PUBLICAS - PIXABAY</h2>
   
    <?php if (isset($_SESSION['msg']) && isset($_SESSION['color'])) { ?>
          <div class="alert alert-<?= $_SESSION['color']; ?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['msg']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php 
        unset($_SESSION['msg']);
        unset($_SESSION['color']);
        }?>

    <div class="row justify-content-center">
    <div class="col-auto">
    <form action="filtrar.php" method="post" enctype="multipart/form-data"> 
    <table class="table table-sm table-striped table-hover mt-4">
        <th>
            <h5 class="text-center"> Filtrar Categorias: </h5>
        </th>
            <th>  
               <select name="categoria" id="categoria" class="form-select" > 
               <option value="">Seleccionar...</option>
               <option value="ciencia">Ciencia</option>
               <option value="educacion">Educación</option>
               <option value="personas">Personas</option>
               <option value="sentimientos">Sentimientos</option>
               <option value="construccion">Construcción</option>
               </select>
            </th>
            <th>
              <button type='submit' class="btn btn-outline-dark">
              <i class="fa-solid fa-filter"></i>  Filtrar</a></th>
              </form>
              
        <form action="filtrar2.php" method="post" enctype="multipart/form-data">
              <th> <h5 class="text-center"> Palabra Clave: </h5></th>
             <th> <input type="text" name="nombre" id="nombre" class="form-control"></th>
             <th>
              <button type="submit" class="btn btn-outline-dark" >
              <i class="fa-solid fa-magnifying-glass-plus"></i>  Buscar </a></th>
             </form>
             </div>
    </div>
    <table class="table table-sm table-striped table-hover mt-4">
        <thead class="table-dark"><tr>
        <th> <h5 class="text-center">Vista Previa</h5> </th>
        <th> <h5 class="text-center">Descripción</h5>  </th>
        </tr>
        </thead>
        <tbody>
<?php
foreach($resultado->hits as $key => $value){ //se organiza en una tabla las imagenes y parametros obtenidos
    echo '<tr> <td>';
    echo '<div class="row justify-content-center"><div class="col-auto"><img src="',$value->previewURL, '">','</td>';
    echo '<td> <p><strong>', 'Tags: ','</strong>', $value->tags, '<br><strong>',' Vistas: ','</strong>',$value->views,'<strong><br>','  Likes: ','</strong>', $value->likes, '<br><strong>','Descargar: ','</strong><a href="',$value->previewURL, '">', $value->previewURL,'</a>','</p>','</td>';
    
    //echo ;
    echo '</div></div></tr>';
}?>
   </tbody>
   </table>
    </table>  
    <div class="row justify-content-center">
    <div class="col-auto">
    <table>
        <tr><p>
            <td>
            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
            <form action="anterior.php" method="post" enctype="multipart/form-data">
  <button type="submit" class="btn btn-outline-dark"><i class="fa-solid fa-arrow-left"></i> Back </button>
            </form>
            <form action="siguiente.php" method="post" enctype="multipart/form-data">
  <button type="submit" class="btn btn-outline-dark"> Next <i class="fa-solid fa-arrow-right"></i></button>
            </form><strong>
</div>

            </td>
            <tr><h6 class="text-center" > Pagina: </strong><?=$pagina?></h6></tr>
        </tr>
    </table>
    </div>
    <footer>
  <p>&copy; 2022 Línea de Código</p>
  <ul>
    <li><a href="https://pixabay.com/es/">Pixabay</a></li>
  </ul>
</footer>
</body>
</html>