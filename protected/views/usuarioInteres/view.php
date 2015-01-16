<?php
/* @var $this UsuarioInteresController */
/* @var $model UsuarioInteres */

$this->breadcrumbs=array(
	'Persona Interes'=>array('index'),
	$model->usuario_interes_id,
);

$this->menu=array(
	array('label'=>'List UsuarioInteres', 'url'=>array('index')),
	array('label'=>'Create UsuarioInteres', 'url'=>array('create')),
	array('label'=>'Update UsuarioInteres', 'url'=>array('update', 'id'=>$model->usuario_interes_id)),
	array('label'=>'Delete UsuarioInteres', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->usuario_interes_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsuarioInteres', 'url'=>array('admin')),
);
?>

<h1>View UsuarioInteres #<?php echo $model->usuario_interes_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'usuario_interes_id',
		'usuario_id',
		'interes_id',
	),
)); ?>
