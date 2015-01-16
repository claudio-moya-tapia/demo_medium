<?php
/* @var $this TipoUsuarioHistoricoController */
/* @var $model TipoUsuarioHistorico */

$this->breadcrumbs=array(
	'Tipo Usuario Historicos'=>array('index'),
	$model->tipo_usuario_historico_id,
);

$this->menu=array(
	array('label'=>'List TipoUsuarioHistorico', 'url'=>array('index')),
	array('label'=>'Create TipoUsuarioHistorico', 'url'=>array('create')),
	array('label'=>'Update TipoUsuarioHistorico', 'url'=>array('update', 'id'=>$model->tipo_usuario_historico_id)),
	array('label'=>'Delete TipoUsuarioHistorico', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tipo_usuario_historico_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoUsuarioHistorico', 'url'=>array('admin')),
);
?>

<h1>View TipoUsuarioHistorico #<?php echo $model->tipo_usuario_historico_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tipo_usuario_historico_id',
		'fecha_creacion',
		'tipo_usuario_id',
		'usuario_id',
	),
)); ?>
