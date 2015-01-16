<?php
/* @var $this RangoUtilidadController */
/* @var $model RangoUtilidad */

$this->breadcrumbs=array(
	'Utilidades'=>array('admin'),
	$model->titulo,
);

?>

<h1>Detalle Utilidad #<?php echo $model->titulo; ?></h1>

<div class="form">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(		
		'titulo',
	),
)); ?>
     <div class="botones">
        <div class="btn-izq">
            <?php echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id' => $model->rango_utilidad_id)); ?>
        </div>        
    </div>
</div>