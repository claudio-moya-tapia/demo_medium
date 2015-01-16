<?php
/* @var $this ActualController */
/* @var $model Actual */

$this->breadcrumbs=array(
	'Actuals'=>array('index'),
	$model->actual_id=>array('view','id'=>$model->actual_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Actual', 'url'=>array('index')),
	array('label'=>'Create Actual', 'url'=>array('create')),
	array('label'=>'View Actual', 'url'=>array('view', 'id'=>$model->actual_id)),
	array('label'=>'Manage Actual', 'url'=>array('admin')),
);
?>

<h1>Update Actual <?php echo $model->actual_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>