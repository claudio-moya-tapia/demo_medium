<?php
/* @var $this SexoController */
/* @var $model Sexo */

$this->breadcrumbs=array(
	'Sexos'=>array('index'),
	$model->sexo_id,
);

$this->menu=array(
	array('label'=>'List Sexo', 'url'=>array('index')),
	array('label'=>'Create Sexo', 'url'=>array('create')),
	array('label'=>'Update Sexo', 'url'=>array('update', 'id'=>$model->sexo_id)),
	array('label'=>'Delete Sexo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sexo_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sexo', 'url'=>array('admin')),
);
?>

<h1>View Sexo #<?php echo $model->sexo_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sexo_id',
		'nombre',
	),
)); ?>
