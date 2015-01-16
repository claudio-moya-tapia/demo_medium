<?php
/* @var $this UsuarioComercialController */
/* @var $model UsuarioLaboral */

$this->breadcrumbs=array(
	'Usuario Laborals'=>array('index'),
	$model->usuario_laboral_id,
);

$this->menu=array(
	array('label'=>'List UsuarioLaboral', 'url'=>array('index')),
	array('label'=>'Create UsuarioLaboral', 'url'=>array('create')),
	array('label'=>'Update UsuarioLaboral', 'url'=>array('update', 'id'=>$model->usuario_laboral_id)),
	array('label'=>'Delete UsuarioLaboral', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->usuario_laboral_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsuarioLaboral', 'url'=>array('admin')),
);
?>

<h1>View UsuarioLaboral #<?php echo $model->usuario_laboral_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'usuario_laboral_id',
		'usuario_id',
		'empresa_id',
		'industria_id',
		'area_experiencia_id',
		'cargo_id',
		'fecha_ingreso',
		'fecha_egreso',
		'actual_id',
	),
)); ?>
