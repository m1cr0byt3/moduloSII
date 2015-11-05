<!-- FRAMEWORK SEMANTIC IU Y LIBRERIAS JQUERY -->
<link rel="stylesheet" href="<?=base_url()?>assets/css/semantic.min.css"/>
<script src="<?=base_url()?>assets/javascript/jquery.min.js"></script>
<script src="<?=base_url()?>assets/javascript/semantic.min.js"></script>
<a href="<?=base_url()?>index.php/sesion/cerrar_sesion">Salir</a>
<a href="<?=base_url()?>index.php/sesion/index">Inicio</a>
<!-- FUNCION JQUERY PARA CAMBIAR LA PESTANA -->
<script>
    $(document).ready(function(){
        $('.tabular.menu .item').tab({history:false});
    });
</script>
<script>
    $('.blue.a')
        .transition('horizontal flip', '500ms')
    ;
</script>

<!-- LINKS DE LAS PESTANAS -->
<div class="ui top attached tabular menu">
    <a class="active blue item" data-tab="first"><h1 class="ui black pointing below ignored label">General</h1></a>
    <a class="blue item" data-tab="second"><h1 class="ui black pointing below ignored label">Actividades</h1></a>
    <a class="blue item" data-tab="third"><h1 class="ui black pointing below ignored label">Ejemplos</h1></a>
    <a class="green item" data-tab="cuatro"><h1 class="ui black pointing below ignored label">Preguntas Frecuentes</h1></a>
</div>


<!-- PRIMERA PESTANA INFORMACION GENERAL-->
<div class="ui bottom attached  active tab segment" data-tab="first">
    <div class="ui raised very padded text container segment">
        <h2 class="ui header">Informaci&oacute;n General</h2>
            <h3>Nombre: <span><?php echo $nombreAlumno;?></span> </h3>
            <h3> Matr&iacute;cula: <span><?php echo $matricula;?></span></h3>
            <h3> Carrera: <span><?php echo $carrera;?></span></h3>
            <h3> Semestre: <span><?php echo $semestre;?></span></h3>
            <h3> Cr&eacute;ditos liberados:<?php foreach ($consulta_estatus as $row) { ?>
                    <?php if($row[0]>=5) {?>
                        <p class="ui teal tag label" ><?php echo 'HAZ REALIZADO COMPLETAMENTE TUS ACTIVIDADES'; ?></p>
                    <?php } else {?>
                        <?php echo $row[0]; ?>
                    <?php }?>
                <?php if($row[0]!=0) {?>
                    <h3>Actividades Realizadas:</h3>
                    <?php foreach ($nombre_actividad as $row2) { ?>
                        <p class="ui teal tag label" ><?php echo $row2['nombre_actividad']; ?></p>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </h3>
        <?php if(!($row[0]>=5)) {?>
           <?php echo '<div class="ui red message"><div class="header">
                   TIEMPO RESTANTE PARA REALIZAR EL TR&Aacute;MITE DURANTE EL SEMESTRE:
                </div>
            </div>'?>
        <?php }?>
        <?php if($semestre<6){ ?>
            <?php echo'
              <div class="ui yellow message">
                <div class="header">RECUERDA QUE: <BR>TE QUEDAN SOLO '.(6-$semestre).'
                SEMESTRES PARA LIBERAR LAS ACTIVIDADES COMPLEMENTARIAS.<br>
                POR SI NO LO HAS REALIZADO.</div>
                <p>NOTIFICACION IMPORTANTE</p>
              </div>'?>
        <?php } else { ?>
            <?php echo'<div class="ui negative message">
              <i class="notched circle loading icon"></i>
              <div class="content">
                <div class="header">NECESITAS PRESENTARTE EN SERVICIOS ESCOLARES PARA LIBERAR
            ACTIVIDADES COMPLEMENTARIAS.</div>
                <p>NOTIFICACION IMPORTANTE</p>
              </div>
            </div>'?>
        <?php } ?>
    </div>
</div>

<!-- SEGUNDA PESTANA ACTIVIDADES-->
<div class="ui bottom attached tab segment" data-tab="second">
    <?php foreach ($actividades as $row) { ?>
    <div class="ui items">
        <div class="item">
            <div class="image">
                <p class="ui header" class="extra">Edificio <p class="ui red ribbon label" > <?php echo $row['edificio']; ?></p></p>
                <p class="ui header" class="extra">Contacto<p class="ui red ribbon label"  ><?php echo $row['contacto']; ?></p></p>
                <p class="ui header"class="extra">Horario<p class="ui red ribbon label" ><?php echo $row['horario']; ?></p></p>
                <p class="ui header"class="extra">Disponible</p>
                <?php
                date_default_timezone_set("America/Chihuahua");
                if(date("H:i:s")>'21:00'){
                    echo'<p>Cerrado<img class="ui long leaf image transition visible" src="'.base_url().'assets/imagenes/offiline.ico"></p>';
                }else{
                    echo'<p>Abierto<img class="ui long leaf image transition visible"  src="'.base_url().'assets/imagenes/online.ico"></p>';
                }
                ?>
                 </div>

            <div class="content">
                <strong class="ui teal tag label">Actividad <?php echo $row['nombre_actividad']; ?></strong>
                <br>
                <div class="meta">
                    <p class="ui header">Descripci&oacute;n : <?php echo $row['descripcion']; ?></p>
                    <p class="ui header">Cr&eacute;ditos : <?php echo $row['creditos']; ?></p>
                    <p class="ui header">Horas : <?php echo $row['horas']; ?></p>
                    <p class="ui header">Evidencia : <?php echo $row['evidencia']; ?></p>
                    <p class="ui header">Departamento : <?php echo $row['departamento']; ?></p>
                    <p class="ui header" class="extra">Ubicaci&oacute;n :</p> <img class="ui long leaf image transition visible" height="300px" width="300px" src="<?=base_url()?>assets/imagenes/<?php echo $row['ubicacion']; ?>">
                </div>
                <div class="description">
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<!-- TERCERA PESTANA EJEMPLOS-->
<div class="ui bottom attached tab segment" data-tab="third">
<script>
    $('.long.leaf.image')
        // if a direction if specified it will be obeyed
        .transition('horizontal flip in')
        .transition('vertical flip in')
    ;
</script>
    <?php foreach ($actividades as $row) { ?>
        <div class="ui items">
            <div class="item">
                <div class="content">
                    <a class="ui teal tag label">Actividad <?php echo $row['nombre_actividad']; ?></a>
                    <br>
                    <div class="meta">
                        <button class="ui button">DESCARGAR</button>
                        <h3>Imagen : <a href="<?=base_url()?>assets/imagenes/<?php echo $row['imagen']; ?>"><img class="ui long leaf image transition visible" src="<?=base_url()?>assets/imagenes/<?php echo $row['imagen']; ?>"></a></h3>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</div>

<!-- CUARTA PESTANA PREGUNTAS FRECUENTES-->
<div class="ui bottom attached tab segment" data-tab="cuatro">
    <div class="ui items">
        <div class="item">
            <div class="content">
                <a class="ui header" href="#que">&iquest;Qu&eacute; son las actividades Complementarias?</a>
                <a class="header" href="#como">&iquest;C&oacute;mo se acreditan las Actividades Complementarias?</a>
                <a class="header" href="#procedimiento">&iquest;Cu&aacute;l es el Procedimiento para llevar a cabo las actividades complementarias?</a>
                <a class="header" href="#liga">Pregunta 4</a>
                <a class="header" href="#liga">Pregunta 4</a>
            </div>
        </div>
    </div>
    <div class="ui raised very padded text container segment">
        <h2 id="que" class="ui header">&iquest;Qu&eacute; son las actividades Complementarias?</h2>
        <p class="ui header">Son aquellas que realiza el estudiante en beneficio de su formaci&oacute;n integral con el
            objetivo de fortalecer sus competencias profesionales.
            Las actividades complementarias pueden ser: Tutor&iacute;as, actividades extraescolares,
            proyectos de investigaci&oacute;n, participaci&oacute;n en eventos acad&eacute;micos, productividad
            laboral, emprendedurismo, fomento a la lectura, construcci&oacute;n de prototipos y
            desarrollo tecnol&oacute;gico, conservaci&oacute;n al medio ambiente y participaci&oacute;n en ediciones
            o aquellas que defina el Comit&eacute; Acad&eacute;mico del IT de Chihuahua II.</p>

        <h2 id="como" class="ui header">&iquest;C&oacute;mo se acreditan las Actividades Complementarias?</h2>
        <p class="ui header">El valor de las actividades complementarias establecidas en los planes de estudios
            basados en competencias es de 5 cr&eacute;ditos, considerando que cada cr&eacute;dito equivale
            a 20 horas y su cumplimiento debe ser dentro de los seis primeros semestres.
            Cada una de las actividades complementarias autorizadas por el plantel tiene un
            valor de 1 o 2 cr&eacute;ditos, por lo que para acumular 5 cr&eacute;ditos, deber&aacute;n cumplirse por lo
            menos 3 actividades complementarias.
            Para asegurar la formaci&oacute;n integral de los estudiantes no se permite solicitar m&aacute;s de
            una vez un mismo tipo de actividad complementaria.
            Los estudiantes elegir&aacute;n las actividades complementarias que deseen acreditar,
            pudiendo ser diferentes cada semestre, de acuerdo a las que el IT de
            Chihuahua II ofrezca.

            El Jefe de Departamento correspondiente designar&aacute; a un profesor responsable de
            evaluar y de confirmar que el estudiante adquiera las competencias necesarias de la
            actividad complementaria.
            Para que se considere una actividad acreditada es necesario que se cubra el
            100% de las evidencias y el Departamento responsable de la actividad expida la
            constancia de acreditaci&oacute;n, quien entregar&aacute; original al Departamento de
            Servicios Escolares.
            Servicios Escolares ser&aacute; el responsable de llevar el control de las actividades
            complementarias en el expediente del estudiante.
            Se asentar&aacute; como actividad complementaria acreditada (ACA), no se asignar&aacute;
            calificaci&oacute;n num&eacute;rica.</p>

        <h2 id="procedimiento" class="ui header">&iquest;Cu&aacute;l es el Procedimiento para llevar a cabo las actividades complementarias?</h2>
        <p class="ui header">
            1. En el mismo apartado del que se baj&oacute; este documento existe una liga para bajar
            e imprimir la solicitud correspondiente.<br>
            2. Imprimir tres tantos de la solicitud y entregar una en la Divisi&oacute;n de Estudios
            Profesionales para su registro, ah&iacute; sellar&aacute;n de recibido las copias de la
            solicitud.<br>
            3. Concluido el periodo de solicitudes (dos semanas) acudir al Departamento
            responsable de la actividad para la asignaci&oacute;n de un profesor. Ah&iacute; entregar&aacute; la
            segunda copia de la solicitud.<br>
            4. Presentarse con el profesor asignado en el lugar, fecha y hora se&ntildealada para
            desarrollar la actividad complementaria.<br>
            5. Al finalizar la actividad complementaria, presentar las evidencias necesarias al
            profesor responsable. Una vez que &eacute;l o ella consideren la actividad como
            acreditada, entregar&aacute; la lista de acreditaci&oacute;n al Jefe de Departamento
            correspondiente.<br>
            6. El Jefe del Departamento correspondiente elaborar&aacute; la Constancia de
            Acreditaci&oacute;n de la actividad, la cual llevar&aacute; la firma del jefe de departamento,
            la firma del profesor responsable y el sello.<br>
            7. El Jefe del Departamento entregar&aacute;, al estudiante, una copia de la constancia
            y el original al Departamento de Servicios Escolares.<br>
        </p>
         </div>
</div>