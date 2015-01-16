<?php
/* @var $this UsuarioInteresController */
/* @var $usuario Usuario */
/* @var $UsuarioInteres UsuarioInteres */

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

if(count($aryUsuarioInteres) == 0){
    echo 'No posee Intereses.';
}

foreach ($aryUsuarioInteres as $UsuarioInteres) {
    
    $this->widget('zii.widgets.CDetailView', array(        
        'data' => $aryUsuarioInteres,
        'attributes' => array(
            array(
                'label' => 'Interes',
                'value' => $UsuarioInteres->interes->nombre 
            ),
        ),
    ));
        
    echo '<hr>';
}
?>
    <div class="botones">
        <div class="btn-izq">
            <?php echo CHtml::link(CHtml::encode('Actualizar'), array('manage', 'id'=>$usuario->usuario_id)); ?>
        </div>        
    </div>

</div>