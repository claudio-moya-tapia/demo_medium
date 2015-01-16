<?php
/* @var $this EstadoCivilController */
/* @var $model EstadoCivil */

$this->breadcrumbs=array(
	'Estado Civils'=>array('index'),
	$model->estado_civil_id,
);

$this->menu=array(
	array('label'=>'List EstadoCivil', 'url'=>array('index')),
	array('label'=>'Create EstadoCivil', 'url'=>array('create')),
	array('label'=>'Update EstadoCivil', 'url'=>array('update', 'id'=>$model->estado_civil_id)),
	array('label'=>'Delete EstadoCivil', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->estado_civil_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EstadoCivil', 'url'=>array('admin')),
);
?>

<h1>View EstadoCivil #<?php echo $model->estado_civil_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'estado_civil_id',
		'nombre',
	),
)); ?>
