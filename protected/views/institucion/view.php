<?php
/* @var $this InstitucionController */
/* @var $model Institucion */

$this->breadcrumbs=array(
	'Institucions'=>array('index'),
	$model->institucion_id,
);

$this->menu=array(
	array('label'=>'List Institucion', 'url'=>array('index')),
	array('label'=>'Create Institucion', 'url'=>array('create')),
	array('label'=>'Update Institucion', 'url'=>array('update', 'id'=>$model->institucion_id)),
	array('label'=>'Delete Institucion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->institucion_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Institucion', 'url'=>array('admin')),
);
?>

<h1>View Institucion #<?php echo $model->institucion_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'institucion_id',
		'tipo_institucion_id',
		'nombre',
		'institucion_vertical_id',
	),
)); ?>
