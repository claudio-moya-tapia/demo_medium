<?php
/* @var $this TipoSituacionPostgradoController */
/* @var $model TipoSituacionPostgrado */

$this->breadcrumbs=array(
	'Tipo Situacion Postgrados'=>array('index'),
	$model->tipo_situacion_postgrado_id,
);

$this->menu=array(
	array('label'=>'List TipoSituacionPostgrado', 'url'=>array('index')),
	array('label'=>'Create TipoSituacionPostgrado', 'url'=>array('create')),
	array('label'=>'Update TipoSituacionPostgrado', 'url'=>array('update', 'id'=>$model->tipo_situacion_postgrado_id)),
	array('label'=>'Delete TipoSituacionPostgrado', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tipo_situacion_postgrado_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoSituacionPostgrado', 'url'=>array('admin')),
);
?>

<h1>View TipoSituacionPostgrado #<?php echo $model->tipo_situacion_postgrado_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tipo_situacion_postgrado_id',
		'titulo',
	),
)); ?>
