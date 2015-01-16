<?php
/* @var $this TipoEstadoLaboralDocenteController */
/* @var $model TipoEstadoLaboralDocente */

$this->breadcrumbs=array(
	'Tipo Estado Laboral Docentes'=>array('index'),
	$model->tipo_estado_laboral_docente_id,
);

$this->menu=array(
	array('label'=>'List TipoEstadoLaboralDocente', 'url'=>array('index')),
	array('label'=>'Create TipoEstadoLaboralDocente', 'url'=>array('create')),
	array('label'=>'Update TipoEstadoLaboralDocente', 'url'=>array('update', 'id'=>$model->tipo_estado_laboral_docente_id)),
	array('label'=>'Delete TipoEstadoLaboralDocente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tipo_estado_laboral_docente_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoEstadoLaboralDocente', 'url'=>array('admin')),
);
?>

<h1>View TipoEstadoLaboralDocente #<?php echo $model->tipo_estado_laboral_docente_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tipo_estado_laboral_docente_id',
		'titulo',
	),
)); ?>
