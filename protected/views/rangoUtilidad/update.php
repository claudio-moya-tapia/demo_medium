<?php
/* @var $this RangoUtilidadController */
/* @var $model RangoUtilidad */

$this->breadcrumbs=array(
	'Utilidades'=>array('admin'),
	$model->titulo=>array('view','id'=>$model->rango_utilidad_id),
	'Actualizar',
);
?>

<h1>Actualizar Utilidad <?php echo $model->titulo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>