<?php
/* @var $this IdentidadController */
/* @var $model Identidad */

$this->breadcrumbs=array(
	'Identidads'=>array('index'),
	$model->identidad_id,
);

$this->menu=array(
	array('label'=>'List Identidad', 'url'=>array('index')),
	array('label'=>'Create Identidad', 'url'=>array('create')),
	array('label'=>'Update Identidad', 'url'=>array('update', 'id'=>$model->identidad_id)),
	array('label'=>'Delete Identidad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->identidad_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Identidad', 'url'=>array('admin')),
);
?>

<h1>View Identidad #<?php echo $model->identidad_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'identidad_id',
		'titulo',
	),
)); ?>
