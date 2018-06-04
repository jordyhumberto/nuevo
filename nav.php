<header id="header">
	<div class="fecha_hoy">
		<?php
			echo date("F j, Y, g:i a");
		?>
	</div>
	<div class="banner">
        <a href="../../index.php">
            <img class="l_upein" src="../../img/logo_upein.png" alt="Logo_upein">
        </a>
		<div class="p_p">
			<p class="p_upein">
                <a href="../../index.php" style="text-decoration:none;color:white;">
                    UNIVERSIDAD PERUANA DE</br>INVESTIGACIÓN Y NEGOCIOS
                </a>
            </p>	
		</div>
	</div>
</header>
<nav>
	<ul>
		<li><a href="#">Mantenimientos</a>
			<ul>
				<li><a href="#">General</a>
                    <ul>
                        <li><a href="../../mantenimiento/general/m_g_alumno.php">Alumno</a></li>
                        <li><a href="../../mantenimiento/general/m_g_colegio.php">Colegio</a></li>
                        <li><a href="../../mantenimiento/general/m_g_semestre.php">Semestre</a></li>
                        <li><a href="../../mantenimiento/general/m_g_detalle.php">Det_Sem</a></li>
                        <li><a href="../../mantenimiento/general/m_g_tipo.php">Tipo de Pago</a></li>
                    </ul>
                </li>
                <li><a href="#">Academico</a>
                    <ul>
                        <li><a href="../../mantenimiento/academico/m_a_ciclo.php">Ciclos</a></li>
                        <li><a href="../../mantenimiento/academico/m_a_curso.php">Cursos</a></li>
                        <li><a href="../../mantenimiento/academico/m_a_tipo_aula.php">Tipo de aula</a></li>
                        <li><a href="../../mantenimiento/academico/m_a_aula.php">Aula</a></li>
                        <li><a href="../../mantenimiento/academico/m_a_docente.php">Docentes</a></li>
                        <li><a href="#">Cursos-Docentes</a></li>
                    </ul>
                </li>
                <li><a href="#">Administrativo</a>
                    <ul>
                        <li><a href="#">Becas</a></li>
                        <li><a href="../../mantenimiento/administrativo/m_ad_facultad.php">Facultad</a></li>
                        <li><a href="../../mantenimiento/administrativo/m_ad_carrera.php">Carrera</a></li>
                        <li><a href="#">categoria</a></li>
                        <li><a href="../../mantenimiento/administrativo/m_ad_modalidad_ingreso.php">Modo de Ingreso</a></li>
                        <li><a href="#">Proceso Admision</a></li>
                        <li><a href="#">Asignar Beca</a></li>
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
                        <li><a href="#">Matricula</a></li>
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
                        <li><a href="#">Curso-Operativo</a></li>
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
			<li><a href="#">Consultas</a>
				<ul>
                    <li><a href="#">Alumnos</a></li>
					<li><a href="#">Pago Alumnos</a></li>
					<li><a href="#">Pagos por Fecha</a></li>
					<li><a href="#">Matricula Alumno</a></li>
					<li><a href="#">Ver Pagos</a></li>
					<li><a href="#">Notas por Alumno</a></li>
					<li><a href="#">Pagos por Tipo</a></li>
				</ul>					
			</li>
			<li><a href="#">Reportes</a>
				<ul>
					<li><a href="#">Pagos por Proceso</a></li>
					<li><a href="#">Historico de Pagos</a></li>
					<li><a href="#">Notas por cuso ope.</a></li>
					<li><a href="#">Notas Registradas.</a></li>
					<li><a href="#">Horario Alumnos.</a></li>
					<li><a href="#">Horario Docente.</a></li>
					<li><a href="#">Horario Aula.</a></li>
				</ul>
			</li>
		<li><a href="#">Salir</a></li>
	</ul>	
</nav>