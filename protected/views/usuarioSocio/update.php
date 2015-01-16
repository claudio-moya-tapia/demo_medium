<?php
/* @var $this UsuarioSocioController */
/* @var $model UsuarioSocio */

$this->breadcrumbs=array(
	'Usuario Socios'=>array('index'),
	$model->socio_id=>array('view','id'=>$model->socio_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsuarioSocio', 'url'=>array('index')),
	array('label'=>'Create UsuarioSocio', 'url'=>array('create')),
	array('label'=>'View UsuarioSocio', 'url'=>array('view', 'id'=>$model->socio_id)),
	array('label'=>'Manage UsuarioSocio', 'url'=>array('admin')),
);
?>

<h1>Update UsuarioSocio <?php echo $model->socio_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>