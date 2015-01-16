<?php
/* @var $this UsuarioPostgradoController */
/* @var $usuario Usuario */
/* @var $UsuarioPostgrado UsuarioPostgrado */

$this->breadcrumbs = array(
    'Personas' => array('usuario/admin'),
    'Persona' => array('usuario/view','id' => $usuario->usuario_id),
    $usuario->rut,
);

$this->renderPartial('//usuario/_tabs', array(
    'model' => $usuario
));
?>

<div class="form">
<?php
foreach ($aryUsuarioPostgrado as $UsuarioPostgrado) {

    $this->widget('zii.widgets.CDetailView', array(        
        'data' => $UsuarioPostgrado,
        'attributes' => array(              
            array(
                'label' => 'Usuario',
                'value' => $UsuarioPostgrado->usuario->nombre . ' ' . $UsuarioPostgrado->usuario->apellido_paterno
            ),
            array(
                'label' => 'Programa Estudio',
                'value' => $UsuarioPostgrado->programa_estudio->titulo
            ),
            array(
                'label' => 'Tipo Estado PostGrado',
                'value' => $UsuarioPostgrado->tipo_estado_postgrado->titulo
            ),
            array(
                'label' => 'Tipo Situacion PostGrado',
                'value' => $UsuarioPostgrado->tipo_situacion_postgrado->titulo
            ),
            array(
                'label' => 'Fecha Matricula',
               'value' => $this->stringFormat->applyFecha($UsuarioPostgrado->fecha_matricula)
            ),
            array(
                'label' => 'Fecha Version',
               'value' => $this->stringFormat->applyFecha($UsuarioPostgrado->fecha_version)
            ),

        ),
    ));
    
    echo CHtml::link(CHtml::encode('Actualizar Usuario PostGrado'), array('update', 'id'=>$UsuarioPostgrado->usuario_postgrado_id),array('class'=>'boton-2'));
    echo '<hr>';
    
}
?>
    
    <div class="botones">
        <div class="btn-izq">
            <?php echo CHtml::link(CHtml::encode('Crear'), array('create', 'id'=>$usuario->usuario_id)); ?>
        </div>        
    </div>

</div>