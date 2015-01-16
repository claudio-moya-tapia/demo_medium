<?php
/* @var $this TipoEstadoUsuarioHistoricoController */
/* @var $model TipoEstadoUsuarioHistorico */

$this->breadcrumbs=array(
	'Tipo Estado Usuario Historicos'=>array('index'),
	$model->tipo_estado_usuario_historico_id=>array('view','id'=>$model->tipo_estado_usuario_historico_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoEstadoUsuarioHistorico', 'url'=>array('index')),
	array('label'=>'Create TipoEstadoUsuarioHistorico', 'url'=>array('create')),
	array('label'=>'View TipoEstadoUsuarioHistorico', 'url'=>array('view', 'id'=>$model->tipo_estado_usuario_historico_id)),
	array('label'=>'Manage TipoEstadoUsuarioHistorico', 'url'=>array('admin')),
);
?>

<h1>Update TipoEstadoUsuarioHistorico <?php echo $model->tipo_estado_usuario_historico_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>