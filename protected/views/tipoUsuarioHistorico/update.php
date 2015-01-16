<?php
/* @var $this TipoUsuarioHistoricoController */
/* @var $model TipoUsuarioHistorico */

$this->breadcrumbs=array(
	'Tipo Usuario Historicos'=>array('index'),
	$model->tipo_usuario_historico_id=>array('view','id'=>$model->tipo_usuario_historico_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoUsuarioHistorico', 'url'=>array('index')),
	array('label'=>'Create TipoUsuarioHistorico', 'url'=>array('create')),
	array('label'=>'View TipoUsuarioHistorico', 'url'=>array('view', 'id'=>$model->tipo_usuario_historico_id)),
	array('label'=>'Manage TipoUsuarioHistorico', 'url'=>array('admin')),
);
?>

<h1>Update TipoUsuarioHistorico <?php echo $model->tipo_usuario_historico_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>