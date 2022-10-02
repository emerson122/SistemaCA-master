<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <script src="https://kit.fontawesome.com/9c0f7b9fd7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Vistas/css/estilos.css">
   
   
 
 
</head>
<body>

<?php if(isset($_SESSION["email"])){
if (isset($_GET["ruta"])) {
if ($_GET["ruta"] == "jefatura"||
    $_GET["ruta"] == "secretaria"||
    $_GET["ruta"] == "docentes"||
    $_GET["ruta"] == "preguntas"||
    $_GET["ruta"] == "questions" ||
    $_GET["ruta"] == "login"||
    $_GET["ruta"] == "log" ||
    $_GET["ruta"] == "ARegistrar"    
    ) {
    include "./Vistas/paginas/".$_GET["ruta"].".php";
    
}

}

}else{
    include "./Vistas/paginas/ARegistrar.php";}?>

</body>
</html>