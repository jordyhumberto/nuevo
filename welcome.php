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
    <!-- <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ultra" rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Shrikhand" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Black+Ops+One|Great+Vibes|Press+Start+2P|Shrikhand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Homemade+Apple" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css?family=Homemade+Apple|Yesteryear" rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Cabin+Sketch" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">
    <style>
        .slider{
            display: flex;
            /* flex-direction:row; */
            justify-content: center;
            align-items: center;
        }
        h1 {
            color: #DBCEC8;
            /* font-family: 'Raleway', sans-serif; */
            /* font-family: 'Shrikhand', cursive; */
           /*  font-family: 'Shrikhand', cursive;
            font-family: 'Great Vibes', cursive; */
            font-family: 'Shrikhand', cursive;
            font-family: 'Great Vibes', cursive;
            font-family: 'Press Start 2P', cursive;
            font-family: 'Black Ops One', cursive;
            /* font-family: 'Homemade Apple', cursive; */
            /* font-family: 'Homemade Apple', cursive;
            font-family: 'Yesteryear', cursive; */
            /* font-family: 'Cabin Sketch', cursive; */
            font-size: 9VW;
            font-weight: 600;
            text-transform: uppercase;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            /* background: #ED5F21; */
            background:url("img/fondo.jpg");
            background-size:100% 100%;
            height:100%;
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
		<header id="header">
			<div class="banner">
				<img class="l_upein" src="img/logo_upein.png" alt="Logo_upein">
				<div class="p_p">
				    <p class="p_upein">UNIVERSIDAD PERUANA DE</br>INVESTIGACIÓN Y NEGOCIOS</p>	
				</div>
			</div>
		</header>
		<nav>
			<ul>
				<li><a href="#">Mantenimientos</a>
					<ul>
						<li><a href="#">General</a>
                            <ul>
                                <li><a href="mantenimiento/general/m_g_alumno.php">Alumno</a></li>
                                <li><a href="mantenimiento/general/m_g_colegio.php">Colegio</a></li>
                                <li><a href="mantenimiento/general/m_g_semestre.php">Semestre</a></li>
                                <li><a href="mantenimiento/general/m_g_detalle.php">Det_Sem</a></li>
                                <li><a href="mantenimiento/general/m_g_tipo.php">Tipo de Pago</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Academico</a>
                            <ul>
                                <li><a href="mantenimiento/academico/m_a_ciclo.php">Ciclos</a></li>
                                <li><a href="mantenimiento/academico/m_a_curso.php">Cursos</a></li>
                                <li><a href="mantenimiento/academico/m_a_tipo_aula.php">Tipo de aula</a></li>
                                <li><a href="mantenimiento/academico/m_a_aula.php">Aula</a></li>
                                <li><a href="mantenimiento/academico/m_a_docente.php">Docentes</a></li>
                                <li><a href="mantenimiento/academico/m_a_curso_docente.php">Cursos-Docentes</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Administrativo</a>
                            <ul>
                                <li><a href="mantenimiento/administrativo/m_ad_beca.php">Becas</a></li>
                                <li><a href="mantenimiento/administrativo/m_ad_facultad.php">Facultad</a></li>
                                <li><a href="mantenimiento/administrativo/m_ad_carrera.php">Carrera</a></li>
                                <li><a href="#">categoria</a></li>
                                <li><a href="mantenimiento/administrativo/m_ad_modalidad_ingreso.php">Modo de Ingreso</a></li>
                                <li><a href="mantenimiento/administrativo/m_ad_proceso.php">Proceso Admision</a></li>
                                <li><a href="mantenimiento/administrativo/m_ad_becaa.php">Asignar Beca</a></li>
                                <li><a href="#">Usuarios</a></li>
                                <li><a href="#">Movimientos Usuario</a></li>
                                <li><a href="#">Documento D' Impresión</a></li>
                            </ul>
                        </li>
					</ul>
				</li>
				<li><a href="#">Procesos</a>
					<ul>
                        <li><a href="#">Matricula</a>
                            <ul>
                                <li><a href="proceso/matricula/p_m_matricula.php">Matricula</a></li>
                                <li><a href="#">Anular-Matricula</a></li>
                            </ul>
                        </li>
                        <li ><a href="#">Descuentos</a>
                            <ul>
                                <li><a href="#">Descuentos</a></li>
                                <li><a href="#">Anular-Descuentos</a></li>
                            </ul>
                        </li>
                        <li ><a href="#">Pagos</a>
                            <ul>
                                <li><a href="#">Pagos</a></li>
                                <li><a href="#">Adelantos</a></li>
                                <li><a href="#">Anular-Pagos</a></li>
                            </ul>
                        </li>
                        <li ><a href="#">Academico</a>
                            <ul>
                                <li><a href="proceso/academico/p_a_cursoo.php">Curso-Operativo</a></li>
                                <li><a href="#">Horario-Clases</a></li>
                                <li><a href="#">Cursos-Alumno</a></li>
                                <li><a href="#">Registro-Notas</a></li>
                                <li><a href="#">Registro-Notas-Admin</a></li>
                            </ul>
                        </li>
						<li ><a href="#">Consultas Notas</a></li>
                        <li ><a href="#">Impresión</a>
                            <ul>
                                <li><a href="">Conf. de Impresión</a></li>
                                <li><a href="">Impresión</a></li>
                            </ul>
                        </li>
					</ul>
				</li>
                <!--concentrarme en estos dos-->
				<li><a href="#">Consultas</a>
					<ul>
                        <li><a href="consultas/alumnos/c_a_alumnos.php">Alumnos</a></li>
						<li><a href="consultas/pagoalumnos/c_pgs_pagoalumnos.php">CompromisoPagos Alumnos</a></li>
						<li><a href="consultas/pagofecha/c_pf_pagofecha.php">Pagos por Fecha</a></li>
						<li><a href="consultas/matricula/c_m_matricula.php">Matricula Alumno</a></li>
                        <li><a href="consultas/pagoalumno/c_pg_pagoalumno.php">Pago Alumnos</a></li>
						<li><a href="consultas/verpago/c_v_verpago.php">Ver Pagos</a></li>
						<li><a href="consultas/notasalumno/c_n_notasalumno.php">Notas por Alumno</a></li>
						<li><a href="#">Pagos por Tipo</a></li>
					</ul>					
				</li>
				<li><a href="#">Reportes</a>
					<ul>
						<li><a href="#">Pagos por Proceso</a></li>
						<li><a href="#">Historico de Pagos</a></li>
						<li><a href="#">Notas por cuso ope.</a></li>
						<li><a href="#">Notas Registradas.</a></li>
						<li><a href="#">Horario Alumnos.</a></li><!--no sirve-->
						<li><a href="#">Horario Docente.</a></li><!--no sirve-->
						<li><a href="#">Horario Aula.</a></li><!--no sirve-->
					</ul>
				</li>
				<li><a href="logout.php">Salir</a></li>
			</ul>	
        </nav>
        <div id="slider">
          <!--  <img  id="bienvenido" src="img/bienvenido.jpg" alt="bienvenido"> -->
                <?php include "hola.html";?>
        </div>
        <footer>
			<div class="arriba"><a href="#header">arriba</a></div>
			<div class="p_footer">
				<p>UNIVERSIDAD PERUANA DE INVESTIGACIÓN Y NEGOCIOS</p>
				<p>Av. Salaverry 1810, Jesús María, Lima - Perú, Telf.:470 1687 / 265 5412 / 956 392 143</p>
			</div>
		</footer>
	</div>
</body>
</html>