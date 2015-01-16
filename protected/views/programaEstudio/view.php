<?php
/* @var $this ProgramaEstudioController */
/* @var $model ProgramaEstudio */

$this->breadcrumbs=array(
	'Programa Estudios'=>array('index'),
	$model->programa_estudio_id,
);

$this->menu=array(
	array('label'=>'List ProgramaEstudio', 'url'=>array('index')),
	array('label'=>'Create ProgramaEstudio', 'url'=>array('create')),
	array('label'=>'Update ProgramaEstudio', 'url'=>array('update', 'id'=>$model->programa_estudio_id)),
	array('label'=>'Delete ProgramaEstudio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->programa_estudio_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProgramaEstudio', 'url'=>array('admin')),
);
?>

<h1>View ProgramaEstudio #<?php echo $model->programa_estudio_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'programa_estudio_id',
		'titulo',
	),
)); ?>
