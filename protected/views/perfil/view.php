<?php
/* @var $this PerfilController */
/* @var $model Perfil */

$this->breadcrumbs=array(
	'Perfils'=>array('index'),
	$model->perfil_id,
);

$this->menu=array(
	array('label'=>'List Perfil', 'url'=>array('index')),
	array('label'=>'Create Perfil', 'url'=>array('create')),
	array('label'=>'Update Perfil', 'url'=>array('update', 'id'=>$model->perfil_id)),
	array('label'=>'Delete Perfil', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->perfil_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Perfil', 'url'=>array('admin')),
);
?>

<h1>View Perfil #<?php echo $model->perfil_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'perfil_id',
		'nombre',
	),
)); ?>
