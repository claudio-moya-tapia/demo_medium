<?php
/* @var $this TipoEstadoPostgradoController */
/* @var $model TipoEstadoPostgrado */

$this->breadcrumbs=array(
	'Tipo Estado Postgrados'=>array('index'),
	$model->tipo_estado_postgrado_id,
);

$this->menu=array(
	array('label'=>'List TipoEstadoPostgrado', 'url'=>array('index')),
	array('label'=>'Create TipoEstadoPostgrado', 'url'=>array('create')),
	array('label'=>'Update TipoEstadoPostgrado', 'url'=>array('update', 'id'=>$model->tipo_estado_postgrado_id)),
	array('label'=>'Delete TipoEstadoPostgrado', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tipo_estado_postgrado_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoEstadoPostgrado', 'url'=>array('admin')),
);
?>

<h1>View TipoEstadoPostgrado #<?php echo $model->tipo_estado_postgrado_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tipo_estado_postgrado_id',
		'titulo',
	),
)); ?>
