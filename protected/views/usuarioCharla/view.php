<?php
/* @var $this UsuarioCharlaController */
/* @var $model UsuarioCharla */

$this->breadcrumbs=array(
	'Usuario Charlas'=>array('index'),
	$model->usuario_charla_id,
);

$this->menu=array(
	array('label'=>'List UsuarioCharla', 'url'=>array('index')),
	array('label'=>'Create UsuarioCharla', 'url'=>array('create')),
	array('label'=>'Update UsuarioCharla', 'url'=>array('update', 'id'=>$model->usuario_charla_id)),
	array('label'=>'Delete UsuarioCharla', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->usuario_charla_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsuarioCharla', 'url'=>array('admin')),
);
?>

<h1>View UsuarioCharla #<?php echo $model->usuario_charla_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'usuario_charla_id',
		'usuario_id',
		'charla_id',
		'institucion_id',
		'facultad_id',
		'carrera_id',
		'escuela_id',
		'programa_estudio_id',
		'tipo_charla_id',
		'fecha_creacion',
		'asisto',
	),
)); ?>
