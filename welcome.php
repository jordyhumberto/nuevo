<?php
session_start(); //Inicia una nueva sesión o reanuda la existente
require 'conexion.php'; //Agregamos el script de Conexión
if(!isset($_SESSION["id_usuario"])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="universidad, peruana, investigación, investigacion, negocios, upein, UPEIN">
  	<meta name="description" content="UPEIN! - Universidad Peruana de Invesitgacion y Negocios da la bienvenida a sus nuevos estudiantes">
	<title>SistemaUpein</title>
    <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.css" rel="stylesheet">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Black+Ops+One|Great+Vibes|Press+Start+2P|Shrikhand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Homemade+Apple" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono" rel="stylesheet">
    <style>
        .slider{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        h1 {
            color: #DBCEC8;
            font-family: 'Shrikhand', cursive;
            font-family: 'Great Vibes', cursive;
            font-family: 'Press Start 2P', cursive;
            font-family: 'Black Ops One', cursive;
            font-size: 9VW;
            font-weight: 600;
            text-transform: uppercase;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            background:url("img/fondo.jpg");
            background-size:100% 100%;
            height:100%;
            margin:0;
        }
        h1 span {
            display: inline-block;
            opacity: 0;
            transform: translateY(20px) rotate(90deg);
            transform-origin: left;
            animation: in 0.5s forwards;
        }
        h1 span:nth-child(1) {
            animation-delay: 0.01s;
        }
        h1 span:nth-child(2) {
            animation-delay: 0.03s;
        }
        h1 span:nth-child(3) {
            animation-delay: 0.07s;
        }
        h1 span:nth-child(4) {
            animation-delay: 0.1s;
        }
        h1 span:nth-child(5) {
            animation-delay: 0.18s;
        }
        h1 span:nth-child(6) {
            animation-delay: 0.24s;
        }
        h1 span:nth-child(7) {
            animation-delay: 0.31s;
        }
        h1 span:nth-child(8) {
            animation-delay: 0.45s;
        }
        h1 span:nth-child(9) {
            animation-delay: 0.54s;
        }
        h1 span:nth-child(10) {
            animation-delay: 0.67s;
        }
        @keyframes in {
            0% {
                opacity: 0;
                transform: translateY(50px) rotate(90deg);
            }
            100% {
                opacity: 1;
                transform: translateY(0) rotate(0);
            }
        }
    </style>
</head>
<body>
    <div class="contenedor">
		<?php include "banner.html";?>
        <div class="cuerpo" style="display:flex;">
            <div class="lado1">
                <?php require "navu.html";?>
            </div>
            <div class="lado2">
                <div id="slider">
                    <?php include "hola.html";?>
                </div>
                
            </div>
        </div>
        <?php include "footer.html";?>
	</div>
</body>
</html>