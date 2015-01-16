<?php
/* @var $this TipoAreaEspecialidadController */
/* @var $model TipoAreaEspecialidad */

$this->breadcrumbs=array(
	'Tipo Area Especialidads'=>array('index'),
	$model->tipo_area_especialidad_id,
);

$this->menu=array(
	array('label'=>'List TipoAreaEspecialidad', 'url'=>array('index')),
	array('label'=>'Create TipoAreaEspecialidad', 'url'=>array('create')),
	array('label'=>'Update TipoAreaEspecialidad', 'url'=>array('update', 'id'=>$model->tipo_area_especialidad_id)),
	array('label'=>'Delete TipoAreaEspecialidad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tipo_area_especialida_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoAreaEspecialidad', 'url'=>array('admin')),
);
?>

<h1>View TipoAreaEspecialidad #<?php echo $model->tipo_area_especialidad_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tipo_area_especialida_id',
		'titulo',
	),
)); ?>
