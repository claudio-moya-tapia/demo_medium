<?php
/* @var $this UsuarioSocioController */
/* @var $model UsuarioSocio */

$this->breadcrumbs=array(
	'Usuario Socios'=>array('index'),
	$model->socio_id,
);

$this->menu=array(
	array('label'=>'List UsuarioSocio', 'url'=>array('index')),
	array('label'=>'Create UsuarioSocio', 'url'=>array('create')),
	array('label'=>'Update UsuarioSocio', 'url'=>array('update', 'id'=>$model->socio_id)),
	array('label'=>'Delete UsuarioSocio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->socio_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsuarioSocio', 'url'=>array('admin')),
);
?>

<h1>View UsuarioSocio #<?php echo $model->socio_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'socio_id',
		'usuario_id',
		'cargo_id',
		'nivel_educacional_id',
		'porcentaje_propiedad',
		'empresa_id',
	),
)); ?>
