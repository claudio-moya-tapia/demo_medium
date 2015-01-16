<?php
/* @var $this UsuarioCharlaController */
/* @var $model UsuarioCharla */

$this->breadcrumbs=array(
	'Usuario Charlas'=>array('index'),
	$model->usuario_charla_id=>array('view','id'=>$model->usuario_charla_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsuarioCharla', 'url'=>array('index')),
	array('label'=>'Create UsuarioCharla', 'url'=>array('create')),
	array('label'=>'View UsuarioCharla', 'url'=>array('view', 'id'=>$model->usuario_charla_id)),
	array('label'=>'Manage UsuarioCharla', 'url'=>array('admin')),
);
?>

<h1>Update UsuarioCharla <?php echo $model->usuario_charla_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>