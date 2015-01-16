<?php
/* @var $this CarreraController */
/* @var $model Carrera */

$this->breadcrumbs=array(
	'Carreras'=>array('index'),
	$model->carrera_id,
);

$this->menu=array(
	array('label'=>'List Carrera', 'url'=>array('index')),
	array('label'=>'Create Carrera', 'url'=>array('create')),
	array('label'=>'Update Carrera', 'url'=>array('update', 'id'=>$model->carrera_id)),
	array('label'=>'Delete Carrera', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->carrera_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Carrera', 'url'=>array('admin')),
);
?>

<h1>View Carrera #<?php echo $model->carrera_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'carrera_id',
		'nombre',
		'carrera_vertical_id',
	),
)); ?>
