<?php
/* @var $this InteresController */
/* @var $model Interes */

$this->breadcrumbs=array(
	'Interes'=>array('index'),
	$model->interes_id=>array('view','id'=>$model->interes_id),
	'Update',
);


?>

<h1>Actualizar Interes <?php echo $model->nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>