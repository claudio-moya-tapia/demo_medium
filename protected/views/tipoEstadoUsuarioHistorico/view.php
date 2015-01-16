<?php
/* @var $this TipoEstadoUsuarioHistoricoController */
/* @var $model TipoEstadoUsuarioHistorico */

$this->breadcrumbs=array(
	'Tipo Estado Usuario Historicos'=>array('index'),
	$model->tipo_estado_usuario_historico_id,
);

$this->menu=array(
	array('label'=>'List TipoEstadoUsuarioHistorico', 'url'=>array('index')),
	array('label'=>'Create TipoEstadoUsuarioHistorico', 'url'=>array('create')),
	array('label'=>'Update TipoEstadoUsuarioHistorico', 'url'=>array('update', 'id'=>$model->tipo_estado_usuario_historico_id)),
	array('label'=>'Delete TipoEstadoUsuarioHistorico', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tipo_estado_usuario_historico_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoEstadoUsuarioHistorico', 'url'=>array('admin')),
);
?>

<h1>View TipoEstadoUsuarioHistorico #<?php echo $model->tipo_estado_usuario_historico_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tipo_estado_usuario_historico_id',
		'fecha_creacion',
		'tipo_usuario_id',
		'uduario_id',
	),
)); ?>
