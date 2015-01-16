<?php
/* @var $this TipoDocenteController */
/* @var $model TipoDocente */

$this->breadcrumbs=array(
	'Tipo Docentes'=>array('index'),
	$model->tipo_docente_id,
);

$this->menu=array(
	array('label'=>'List TipoDocente', 'url'=>array('index')),
	array('label'=>'Create TipoDocente', 'url'=>array('create')),
	array('label'=>'Update TipoDocente', 'url'=>array('update', 'id'=>$model->tipo_docente_id)),
	array('label'=>'Delete TipoDocente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tipo_docente_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoDocente', 'url'=>array('admin')),
);
?>

<h1>View TipoDocente #<?php echo $model->tipo_docente_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tipo_docente_id',
		'titulo',
	),
)); ?>
