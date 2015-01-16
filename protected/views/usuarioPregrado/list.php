<?php
/* @var $this UsuarioPregradoController */
/* @var $usuario Usuario */
/* @var $UsuarioProfesion UsuarioPregrado */

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
foreach ($aryUsuarioPregrado as $UsuarioPregrado) {
    
    $this->widget('zii.widgets.CDetailView', array(        
        'data' => $UsuarioPregrado,
        'attributes' => array(              
            array(
                'label' => 'Usuario',
                'value' => $UsuarioPregrado->usuario->nombre . ' ' . $UsuarioPregrado->usuario->apellido_paterno
            ),      
            array(
                'label' => 'Institución',
                'value' => $UsuarioPregrado->institucion->nombre
            ),   
            array(
                'label' => 'Carrera',
                'value' => $UsuarioPregrado->carrera->nombre
            ), 
            array(
                'label' => 'Fecha Egreso',
                'value' => $this->stringFormat->applyFecha($UsuarioPregrado->fecha_egreso)
            ),
            array(
                'label' => 'Fecha Titulación',
                'value' => $this->stringFormat->applyFecha($UsuarioPregrado->fecha_titulacion)
            ),
        ),
    ));
    
    echo CHtml::link(CHtml::encode('Actualizar Usuario Pregrado'), array('update', 'id'=>$UsuarioPregrado->usuario_pregrado_id),array('class'=>'boton-2'));
    echo '<hr>';
    
}
?>
    
    <div class="botones">
        <div class="btn-izq">
            <?php echo CHtml::link(CHtml::encode('Crear'), array('create', 'id'=>$usuario->usuario_id)); ?>
        </div>        
    </div>

</div>