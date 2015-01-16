<?php
/* @var $this UsuarioInteresController */
/* @var $model UsuarioInteres */

$this->breadcrumbs=array(
	'Usuario Interes'=>array('index'),
	$model->usuario_interes_id=>array('view','id'=>$model->usuario_interes_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsuarioInteres', 'url'=>array('index')),
	array('label'=>'Create UsuarioInteres', 'url'=>array('create')),
	array('label'=>'View UsuarioInteres', 'url'=>array('view', 'id'=>$model->usuario_interes_id)),
	array('label'=>'Manage UsuarioInteres', 'url'=>array('admin')),
);
?>

<h1>Update UsuarioInteres <?php echo $model->usuario_interes_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>