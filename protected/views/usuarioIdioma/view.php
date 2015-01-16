<?php
/* @var $this UsuarioIdiomaController */
/* @var $model UsuarioIdioma */

$this->breadcrumbs = array(
    'Personas' => array('usuario/admin'),
    'Persona' => array('usuario/view','id' => $usuario->usuario_id),
    'Persona Idioma' => array('usuarioIdioma/list','id' => $usuario->usuario_id),
    $usuario->rut,
);

$this->renderPartial('//usuario/_tabs', array(
    'model' => $usuario
));
?>

<div class="form">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(            
           array(
                'label' => 'Idioma',
                'value' => $model->idioma->nombre
            ),
            
            array(
                'label' => 'Nivel del idioma',
                'value' => $model->idiomanivel->nombre
            ),
           
	),
)); ?>

    <div class="botones">
        <div class="btn-izq">
            <?php echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id'=>$model->usuario_idioma_id)); ?>
        </div>        
    </div>
</div>