<?php
/* @var $this InteresController */
/* @var $model Interes */

$this->breadcrumbs=array(
	'Interes'=>array('index'),
	$model->interes_id,
);

?>

<h1>Ver Interes <?php echo $model->nombre; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nombre',
	),
)); ?>
