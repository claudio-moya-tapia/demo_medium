<?php
/* @var $this RangoPerdidaController */
/* @var $model RangoPerdida */

$this->breadcrumbs=array(
	'Perdidas'=>array('admin'),
	$model->titulo=>array('view','id'=>$model->rango_perdida_id),
	'Actualizar',
);
?>

<h1>Actualizar Perdida #<?php echo $model->titulo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>