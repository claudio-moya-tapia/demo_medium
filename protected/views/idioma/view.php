<?php
/* @var $this IdiomaController */
/* @var $model Idioma */

$this->breadcrumbs=array(
	'Idiomas'=>array('admin'),
	$model->nombre,
);
?>

<h1>Detalle Idioma #<?php echo $model->nombre; ?></h1>

<div class="form">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idioma_id',
		'nombre',
	),
)); ?>
    
     <div class="botones">
        <div class="btn-izq">
            <?php echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id' => $model->idioma_id)); ?>
        </div>        
    </div>

</div>