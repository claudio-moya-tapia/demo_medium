<?php
/* @var $this CursoController */
/* @var $model Curso */

$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	$model->curso_id,
);

$this->menu=array(
	array('label'=>'List Curso', 'url'=>array('index')),
	array('label'=>'Create Curso', 'url'=>array('create')),
	array('label'=>'Update Curso', 'url'=>array('update', 'id'=>$model->curso_id)),
	array('label'=>'Delete Curso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->curso_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Curso', 'url'=>array('admin')),
);
?>

<h1>View Curso #<?php echo $model->curso_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'curso_id',
		'titulo',
		'es_optativo_id',
		'area_academica_id',
		'usuario_docente_id',
	),
)); ?>
