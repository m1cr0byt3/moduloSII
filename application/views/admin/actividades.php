<!-- FRAMEWORK SEMANTIC IU Y LIBRERIAS JQUERY -->
<link rel="stylesheet" href="<?=base_url()?>assets/css/semantic.min.css"/>
<script src="<?=base_url()?>assets/javascript/jquery.min.js"></script>
<script src="<?=base_url()?>assets/javascript/semantic.min.js"></script>
<a href="<?=base_url()?>index.php/sesion/cerrar_sesion">Salir</a>
<a href="<?=base_url()?>index.php/sesion/admin">Inicio</a>
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
    <a class="active blue item" data-tab="first"><h2>Actualizar Actividad</h2></a>
    <a class="blue item" data-tab="second"><h2>Actividades</h2></a>
</div>


<!-- PRIMERA PESTANA INFORMACION GENERAL-->
<div class="ui bottom attached  active tab segment" data-tab="first">
    <div class="ui raised very padded text container segment">
        <div class="ui form">
            <div class="field">
                <label>Alumnos:</label>
                <select class="ui search dropdown">
                    <?php foreach ($usuarios as $row) { ?>
                        <option value=""><?php echo $row['no_control']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
</div>

<!-- SEGUNDA PESTANA ACTIVIDADES-->

<div class="ui bottom attached tab segment" data-tab="second">
    COSAS
</div>