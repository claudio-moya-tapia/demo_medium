<?php
/* @var $this CharlaController */
/* @var $model Charla */

$this->breadcrumbs=array(
	'Charlas'=>array('index'),
	$model->charla_id,
);

$this->menu=array(
	array('label'=>'List Charla', 'url'=>array('index')),
	array('label'=>'Create Charla', 'url'=>array('create')),
	array('label'=>'Update Charla', 'url'=>array('update', 'id'=>$model->charla_id)),
	array('label'=>'Delete Charla', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->charla_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Charla', 'url'=>array('admin')),
);
?>

<h1>View Charla #<?php echo $model->charla_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'charla_id',
		'fecha_creacion',
		'fecha_inicio',
		'fecha_termino',
		'titulo',
	),
)); ?>
