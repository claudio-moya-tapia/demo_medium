<?php
/* @var $this ActualController */
/* @var $model Actual */

$this->breadcrumbs=array(
	'Actuals'=>array('index'),
	$model->actual_id,
);

$this->menu=array(
	array('label'=>'List Actual', 'url'=>array('index')),
	array('label'=>'Create Actual', 'url'=>array('create')),
	array('label'=>'Update Actual', 'url'=>array('update', 'id'=>$model->actual_id)),
	array('label'=>'Delete Actual', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->actual_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Actual', 'url'=>array('admin')),
);
?>

<h1>View Actual #<?php echo $model->actual_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'actual_id',
		'titulo',
	),
)); ?>
